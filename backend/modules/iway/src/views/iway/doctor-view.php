<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/8/2020
 * Time: 08:58
 */

use kartik\select2\Select2;
use modava\iway\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = 'iWay';
$this->title = Yii::t('backend', 'iWay');
$this->params['breadcrumbs'][] = $this->title;

/* @var $model modava\iway\models\Order */
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card mb-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <?= Select2::widget([
                                'model' => $model,
                                'attribute' => 'order_id',
                                'value' => $model->order_id,
                                'initValueText' => $model->order_id ? Order::findOne($model->order_id)->title : '',
                                'options' => [
                                    'class' => 'load-data-on-change',
                                    'placeholder' => Yii::t('backend', 'Chọn đơn hàng ...'),
                                    'load-data-element' => '#treatment_id',
                                    'load-data-url' => Url::toRoute(['treatment-schedule/get-records-by-order']),
                                    'load-data-key' => 'order_id',
                                    'load-data-data' => json_encode(['option_tag' => 'true']),
                                    'load-data-method' => 'GET',
                                    'load-data-removeemptyoption' => 'true',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 3,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => Url::toRoute(['/iway/order/get-by-key-word']),
                                        'dataType' => 'json',
                                        'delay' => 250,
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(model) { return model.text; }'),
                                    'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                                ],
                            ]); ?>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select class="form-control" id="treatment_id">
                                <option value=""><?=Yii::t('backend', 'Không có liệu trình')?></option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="widgetbar">
                                <button class="btn btn-primary md-full" data-toggle="modal" data-target=".bd-example-modal-add-lt">
                                    <i class="feather icon-plus mr-2"></i>Thêm liệu trình
                                </button>
                                <div class="modal fade bd-example-modal-add-lt" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleLargeModalLabel">Thêm liệu trình</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="la la-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <p class="text-primary font-16">
                                                        Bạn chắc chắn muốn thêm mới một liệu trình mới?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">Thêm liệu trình</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="widgetbar">
                                <button class="btn btn-primary md-full" data-toggle="modal" data-target=".bd-example-modal-save-lt">
                                    <i class="feather icon-plus mr-2"></i>Lưu liệu trình
                                </button>
                                <div class="modal fade bd-example-modal-save-lt" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleLargeModalLabel">Lưu liệu trình</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="la la-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <p class="text-primary font-16">
                                                        Bạn chắc chắn muốn lưu liệu trình này?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">Lưu liệu trình</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills justify-content-center custom-tab-button mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-1-tab-button" data-toggle="pill" href="#pills-1-button"
                               role="tab" aria-controls="pills-1-button" aria-selected="true"><span
                                        class="tab-btn-icon"><i class="icon-book-open"></i></span>Hồ sơ khám
                                bệnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-2-tab-button" data-toggle="pill"
                               href="#pills-2-button" role="tab" aria-controls="pills-2-button"
                               aria-selected="false"><span class="tab-btn-icon"><i
                                            class="icon-book-open"></i></span>Hồ sơ thiết kế</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-3-tab-button" data-toggle="pill" href="#pills-3-button"
                               role="tab" aria-controls="pills-3-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="icon-calender"></i></span>Lịch điều
                                trị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-4-tab-button" data-toggle="pill" href="#pills-4-button"
                               role="tab" aria-controls="pills-4-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="icon-camera"></i></span>Ảnh thay
                                khay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab-button" data-toggle="pill" href="#pills-5-button"
                               role="tab" aria-controls="pills-5-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="icon-credit-card"></i></span>Thanh
                                Toán</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-button">
                        <div class="tab-pane fade active show" id="pills-1-button" role="tabpanel"
                             aria-labelledby="pills-1-tab-button">
                            <div class="card-body">
                                <?= $this->render('ho-so-kham-benh/index') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-2-button" role="tabpanel"
                             aria-labelledby="pills-2-tab-button">
                            <div class="card-body">
                                <?= $this->render('ho-so-thiet-ke/index') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-3-button" role="tabpanel"
                             aria-labelledby="pills-3-tab-button">
                            <div class="card-body">
                                <?= $this->render('lich-dieu-tri/index') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-4-button" role="tabpanel"
                             aria-labelledby="pills-4-tab-button">
                            <div class="card-body">
                                <?= $this->render('anh-thay-khay/index') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-5-button" role="tabpanel"
                             aria-labelledby="pills-5-tab-button">
                            <div class="card-body">
                                <?= $this->render('thanh-toan/index') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-tk news img1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleLargeModalLabel">Hình ảnh file</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="display: flex; align-items: center;">
                                <div class="md-full">
                                    <img src="http://admin.iway.paditech.org/iway/assets/images/gallery/anhrang.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chat-detail chat-popup">
                                <div class="chat-body" style="overflow: hidden; width: auto; height: 510px;">
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Hello! please, let me know the status about project after school.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Khôi</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I have completed 4 stages 5 stages remaining.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Sure, I will prepare for the same.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Great. Thanks</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-bottom">
                                    <div class="chat-messagebar">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message..."
                                                       aria-label="Text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-round btn-primary-rgba" type="button"
                                                            id="button-addonsend"><i class="ti-comment-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-tk1 news img1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleLargeModalLabel">Chi tiết video</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="display: flex; align-items: center;">
                                <div class="md-full">
                                    <video width="100%" height="300" controls="">
                                        <source src="<?= Yii::$app->assetManager->publish('@modava/iway/web/uploads/Sirius Độ Đẹp.mp4')[1] ?>"
                                                type="video/mp4">
                                        Your browser does not support the video tag
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chat-detail chat-popup">
                                <div class="chat-body" style="overflow: hidden; width: auto; height: 510px;">
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Hello! please, let me know the status about project after school.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Khôi</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I have completed 4 stages 5 stages remaining.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Sure, I will prepare for the same.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Great. Thanks</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-bottom">
                                    <div class="chat-messagebar">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message..."
                                                       aria-label="Text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-round btn-primary-rgba" type="button"
                                                            id="button-addonsend"><i class="ti-comment-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-tk2 news img1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleLargeModalLabel">Chi tiết hình ảnh</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="display: flex; align-items: center;">
                                <div class="md-full">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="<?= Yii::$app->assetManager->publish('@modava/iway/web/uploads/logo.png')[1] ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?= Yii::$app->assetManager->publish('@modava/iway/web/uploads/logo.png')[1] ?>" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chat-detail chat-popup">
                                <div class="chat-body" style="overflow: hidden; width: auto; height: 510px;">
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Hello! please, let me know the status about project after school.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Khôi</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I have completed 4 stages 5 stages remaining.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Sure, I will prepare for the same.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="media">
                                            <img class="align-self-center rounded-circle"
                                                 src="http://admin.iway.paditech.org/iway/assets/images/users/girl.svg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="font-14">Bs.Tuấn</h5>
                                            </div>
                                        </div>
                                        <div class="chat-message-text">
                                            <span>Great. Thanks</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-bottom">
                                    <div class="chat-messagebar">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message..."
                                                       aria-label="Text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-round btn-primary-rgba" type="button"
                                                            id="button-addonsend"><i class="ti-comment-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>
