<?php

namespace modava\product\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\product\components\MyUpload;
use modava\product\models\table\ProductTable;
use modava\product\ProductModule;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;


class Product extends ProductTable
{
    public $toastr_key = 'product';
    public $iptImages;

    public function behaviors()
    {

        return array_merge(
            parent::behaviors(),
            [
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->title);
                    }
                ],
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['type_id'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['type_id'],
                    ],
                    'value' => function () {
                        if ($this->type_id == null) return 0;
                        return $this->type_id;
                    }
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['category_id'], 'required', 'message' => Yii::t('backend', 'Danh mục sản phẩm chưa chọn')],
            [['type_id'], 'required', 'message' => Yii::t('backend', 'Loại sản phẩm chưa chọn')],
            [['category_id', 'type_id', 'position', 'status', 'product_hot', 'views', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description', 'content', 'ads_pixel', 'ads_session', 'language'], 'string'],
            [['product_tech', 'iptImages'], 'safe'],
            [['product_code'], 'string', 'max' => 25],
            [['title', 'slug', 'image', 'price', 'price_sale', 'so_luong'], 'string', 'max' => 255],
            [['slug'], 'unique', 'targetAttribute' => 'slug'],
            ['image', 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'],
                'maxSize' => 1024 * 1024],
            ['product_code', 'unique', 'targetAttribute' => 'product_code', 'message' => Yii::t('backend', 'Mã sản phẩm đã tồn tại')],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_code' => Yii::t('backend', 'Product Code'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'type_id' => Yii::t('backend', 'Type ID'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'image' => Yii::t('backend', 'Image'),
            'price' => Yii::t('backend', 'Price'),
            'price_sale' => Yii::t('backend', 'Price Sale'),
            'so_luong' => Yii::t('backend', 'Quantity'),
            'description' => Yii::t('backend', 'Description'),
            'content' => Yii::t('backend', 'Content'),
            'product_hot' => Yii::t('backend', 'Product hot'),
            'product_tech' => Yii::t('backend', 'Product tech'),
            'position' => Yii::t('backend', 'Position'),
            'ads_pixel' => Yii::t('backend', 'Ads Pixel'),
            'ads_session' => Yii::t('backend', 'Ads Session'),
            'status' => Yii::t('backend', 'Status'),
            'views' => Yii::t('backend', 'Views'),
            'language' => Yii::t('backend', 'Language'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
        ];
    }

    public function validateImages()
    {
        $iptImages = json_decode($this->iptImages);
        if ($iptImages != null) {
            $this->iptImages = $iptImages;
        }
        if ($this->iptImages == null) {
            $this->addError('iptImages', 'Images null');
            return false;
        } else {
            if (is_string($this->iptImages)) $this->iptImages = [$this->iptImages];
            if (!is_array($this->iptImages)) {
                $this->addError('iptImages', 'Data type failed');
                return false;
            } else {
                foreach ($this->iptImages as $image) {
                    $modelImages = new ProductImage([
                        'product_id' => $this->primaryKey,
                        'image_url' => $image
                    ]);
                    if (!$modelImages->validate()) {
                        var_dump($modelImages->getErrors());
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function saveImages()
    {
        if (is_array($this->iptImages)) {
            foreach ($this->iptImages as $image) {
                $path = Yii::getAlias('@frontend/web/uploads/product/');
                $imageName = null;
                foreach (Yii::$app->params['product'] as $key => $value) {
                    $pathSave = $path . $key;
                    if (!file_exists($pathSave) && !is_dir($pathSave)) {
                        mkdir($pathSave);
                    }
                    $resultName = MyUpload::uploadFromOnline($value['width'], $value['height'], $image, $pathSave . '/', $imageName);
                    if ($imageName == null) {
                        $imageName = $resultName;
                    }
                }
                $modelImage = new ProductImage([
                    'product_id' => $this->primaryKey,
                    'image_url' => $imageName
                ]);
                if (!$modelImage->save()) {
                    var_dump($modelImage->getErrors());
                    return false;
                }
            }
        }
        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->on(yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, function (yii\db\AfterSaveEvent $e) {
            if ($this->position == null)
                $this->position = $this->primaryKey;
            $this->save();
        });
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCreated()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserUpdated()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
