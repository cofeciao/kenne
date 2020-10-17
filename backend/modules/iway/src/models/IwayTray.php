<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\models\table\IwayTrayTable;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "iway_tray".
 *
 * @property int $id
 * @property string $name Tên
 * @property string $code Mã
 * @property string $note Ghi chú
 * @property int $date_delivery Ngày giao
 * @property int $user_delivery Người nhận
 * @property int $treatment_schedule_id ID liệu trình điều trị
 * @property int $espect_date_begin Ngày bắt đầu đeo tray dự kiến
 * @property int $espect_date_end Ngày kết thúc đeo tray dự kiến
 * @property int $date_begin Ngày bắt đầu đeo tray thực tế
 * @property int $date_end Ngày kết thúc đeo tray thực tế
 * @property int $result Trạng thái đánh giá: 0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt
 * @property int $evaluate Nội dung đánh giá
 * @property int $date_result Thời gian đánh giá
 * @property int $user_result Người đánh giá
 * @property int $status Ép khay, Đóng hộp, Bàn giao phòng khám, Cắt viền khay
 */
class IwayTray extends IwayTrayTable
{
    public $toastr_key = 'iway-tray';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_AFTER_VALIDATE => 'status'
                    ],
                    'value' => function () {
                        if ($this->hasErrors('status')) {
                            if (is_array($this->_old_attributes) && array_key_exists('status', $this->_old_attributes)) {
                                return $this->_old_attributes['status'];
                            } else {
                                return null;
                            }
                        }
                        return $this->status;
                    }
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_AFTER_VALIDATE => 'result'
                    ],
                    'value' => function () {
                        if ($this->hasErrors('result')) {
                            if (is_array($this->_old_attributes) && array_key_exists('result', $this->_old_attributes)) {
                                return $this->_old_attributes['result'];
                            } else {
                                return null;
                            }
                        }
                        return $this->result;
                    }
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['date_result'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['date_result']
                    ],
                    'value' => function () {
                        if (is_array($this->_old_attributes) &&
                            array_key_exists('result', $this->_old_attributes) &&
                            $this->_old_attributes['result'] == self::CHUA_DANH_GIA &&
                            $this->result != self::CHUA_DANH_GIA) {
                            return time();
                        }
                        return null;
                    }
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['user_result'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['user_result']
                    ],
                    'value' => function () {
                        if (is_array($this->_old_attributes) &&
                            array_key_exists('result', $this->_old_attributes) &&
                            $this->_old_attributes['result'] == self::CHUA_DANH_GIA &&
                            $this->result != self::CHUA_DANH_GIA) {
                            return Yii::$app->user->id;
                        }
                        return null;
                    }
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['note', 'evaluate'], 'string'],
            [['date_delivery', 'user_delivery', 'treatment_schedule_id', 'espect_date_begin', 'espect_date_end', 'date_begin', 'date_end', 'result', 'date_result', 'user_result', 'status'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
            [['status'], 'validateStatus'],
            [['result'], 'validateResult'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Tên tray'),
            'code' => Yii::t('backend', 'Code'),
            'note' => Yii::t('backend', 'Ghi chú tray'),
            'date_delivery' => Yii::t('backend', 'Ngày bàn giao'),
            'user_delivery' => Yii::t('backend', 'Người nhận bàn giao'),
            'treatment_schedule_id' => Yii::t('backend', 'Lịch điều trị'),
            'espect_date_begin' => Yii::t('backend', 'Ngày bắt đầu (dự kiến)'),
            'espect_date_end' => Yii::t('backend', 'Ngày kết thúc (dự kiến)'),
            'date_begin' => Yii::t('backend', 'Ngày bắt đầu'),
            'date_end' => Yii::t('backend', 'Ngày kết thúc'),
            'result' => Yii::t('backend', 'Đánh giá'),
            'evaluate' => Yii::t('backend', 'Nội dung đánh giá'),
            'date_result' => Yii::t('backend', 'Thời gian đánh giá'),
            'user_result' => Yii::t('backend', 'Người đánh giá'),
            'status' => Yii::t('backend', 'Trạng thái'),
        ];
    }

    public function validateStatus()
    {
        if (!$this->hasErrors()) {
            $old_status = is_array($this->_old_attributes) && array_key_exists('status', $this->_old_attributes) ? $this->_old_attributes['status'] : null;
            $statuses = $this->getStatusEnabled($old_status);
            if (!array_key_exists($this->status, $statuses)) {
                $this->addError('status', 'Chỉ có thể lưu với những trạng thái: ' . implode(', ', $statuses));
            }
        }
    }

    public function getStatusEnabled($status = null)
    {
        $user = new User();
        $roleName = $user->getRoleName(Yii::$app->user->id);
        if ($roleName !== User::DEV) {
            $statuses = [];
            foreach (self::STATUS as $status_key => $tray_status) {
                /*
                 * Tạo mới => trạng thái chỉ có thể là khởi tạo
                 *** ($status === null && $status_key !== self::PHONG_KHAM_DE_XUAT)
                 * Labo tiếp nhận => không thể tạm ngưng
                 *** ($status >= self::LABO_TIEP_NHAN && $status !== self::TAM_NGUNG && $status_key === self::TAM_NGUNG)
                 * Trạng thái tạm ngưng => có thể chuyển trạng thái về phòng khám đề xuất
                 *** ($status === self::TAM_NGUNG && !in_array($status_key, [self::PHONG_KHAM_DE_XUAT, self::TAM_NGUNG]))
                 * Update => chỉ có thể tiến 1 trạng thái, không thể lùi hoặc nhảy cách
                 *** ($status !== null && $status !== self::TAM_NGUNG && $status_key !== self::TAM_NGUNG && !in_array($status_key, [$status, $status + 1]))
                 * */
                if (($status === null && $status_key !== self::PHONG_KHAM_DE_XUAT) ||
                    ($status >= self::LABO_TIEP_NHAN && $status !== self::TAM_NGUNG && $status_key === self::TAM_NGUNG) ||
                    ($status === self::TAM_NGUNG && !in_array($status_key, [self::PHONG_KHAM_DE_XUAT, self::TAM_NGUNG])) ||
                    ($status !== null && $status !== self::TAM_NGUNG && $status_key !== self::TAM_NGUNG && !in_array($status_key, [$status, $status + 1]))) {
                } else {
                    $statuses[$status_key] = $tray_status;
                }
            }
            return $statuses;
        }
        return self::STATUS;
    }

    public function validateResult()
    {
        if (!$this->hasErrors()) {
            if ($this->status != self::GIAO_KHACH_HANG && $this->result != self::CHUA_DANH_GIA) {
                $this->addError('result', 'Chưa bàn giao khay cho khách hàng, không thể đánh giá');
            } else {
                $old_result = is_array($this->_old_attributes) && array_key_exists('result', $this->_old_attributes) ? $this->_old_attributes['result'] : null;
                $results = $this->getResultEnabled($old_result);
                if (!array_key_exists($this->result, $results)) {
                    $this->addError('result', 'Không có quyền đổi trạng thái đánh giá từ ' . self::RESULT[$old_result] . ' sang ' . self::RESULT[$this->result]);
                }
            }
        }
    }

    public function getResultEnabled($result = null)
    {
        $user = new User();
        $roleName = $user->getRoleName(Yii::$app->user->id);
        if ($roleName !== User::DEV) {
            $results = [];
            foreach (self::RESULT as $result_key => $tray_result) {
                if ($this->status != self::GIAO_KHACH_HANG && $result_key === self::CHUA_DANH_GIA) {
                    $results[$result_key] = $tray_result;
                } else {
                    if ($this->status == self::GIAO_KHACH_HANG && ($result === self::CHUA_DANH_GIA ||
                            ($result !== self::CHUA_DANH_GIA && $result === $result_key))) {
                        $results[$result_key] = $tray_result;
                    }
                }
            }
            return $results;
        }
        return self::RESULT;
    }

    public function updateAttribute($field, $value)
    {
        if (!$this->canSetProperty($field)) return false;
        $this->$field = $value;
        return $this->update(true, $field);
    }
}
