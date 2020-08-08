<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Đăng nhập - Đăng ký'
?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= Url::home()?>">Home</a></li>
                <li class="active">Login Or Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's Login Register Area -->
<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- Login Form s-->
                <form action="<?= Url::toRoute('/sign/index') ?>" method="post">
                    <?php $form = ActiveForm::begin(); ?>
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <?php if(Yii::$app->session->hasFlash('loginOK')) {?>
                        <div class="alert alert-success text-center">Đăng nhập thành công</div>
                        <?php }
                        if(Yii::$app->session->hasFlash('loginFail')) { ?>
                        <div class="alert alert-danger text-center">Đăng nhập thất bại</div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-12 mb--20">
                                <?= $form->field($model, 'password')->textInput()?>
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="forgotton-password_info">
                                    <a href="#"> Forgotten pasward?</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="kenne-login_btn">Login</button>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end();?>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="<?= Url::toRoute('/sign/register') ?>" method="post">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-12">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6">
                            <?= $form->field($model, 'password')->textInput() ?>
                            </div>
                            <div class="col-md-6">
                            <?= $form->field($model, 'confirm_password')->textInput() ?>
                            </div>
                            <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <div class="col-12">
                                <?php if(Yii::$app->session->hasFlash('toastr-' . $model->toastr_key . '-view')) {?>
                                    <div class="alert alert-success text-center">Đăng ký thành công</div>
                                <?php }
                                if(Yii::$app->session->hasFlash('toastr-' . $model->toastr_key . '-form')) { ?>
                                    <div class="alert alert-danger text-center">Đăng ký thất bại</div>
                                <?php } ?>
                                <button class="kenne-register_btn">Register</button>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Login Register Area  End Here -->
