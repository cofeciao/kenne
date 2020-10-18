<?php
$this->title = 'Đăng nhập';

use yii\widgets\ActiveForm;

/* @var $model \frontend\models\LoginForm */

?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
</div>
<?php if(Yii::$app->session->hasFlash('success')){?>
    <div class="alert alert-success text-center"><b>Đăng ký thành công</b></div>
<?php } ?>
<!-- Kenne's Breadcrumb Area End Here -->
<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-8">
                <!-- Login Form s-->
                <?php $form = ActiveForm::begin([
                    'id'=>'login-form',
                    'enableClientScript' => false,
                    'enableAjaxValidation' => true,
                    'options' => ['enctype' => 'multipart/form-data']
                ]) ?>

                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <?= $form->field($model,'username')->textInput()
                                    ->input('username',['placeholder'=>'Enter Username Address'])
                                    ->label('Username*');
                                ?>
                            </div>
                            <div class="col-12 mb--20">
                                <?= $form->field($model,'password')->textInput()
                                    ->input('password',['placeholder'=>'Password'])
                                    ->label('Password*');
                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="forgotton-password_info">
                                    <a href="#"> Forgotten pasword?</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="kenne-login_btn">Login</button>
                            </div>
                        </div>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
<!--<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                // Login Form
                <form action="<?/*= Url::toRoute('/sign/index') */?>" method="post">
                    <?php /*$form = ActiveForm::begin(); */?>
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <?php /*if(Yii::$app->session->hasFlash('loginOK')) {*/?>
                            <div class="alert alert-success text-center">Đăng nhập thành công</div>
                        <?php /*}
                        if(Yii::$app->session->hasFlash('loginFail')) { */?>
                            <div class="alert alert-danger text-center">Đăng nhập thất bại</div>
                        <?php /*} */?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <?/*= $form->field($model, 'email')->textInput(['maxlength' => true]) */?>
                            </div>
                            <div class="col-12 mb--20">
                                <?/*= $form->field($model, 'password')->textInput()*/?>
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
                    <?php /*ActiveForm::end();*/?>
                </form>
            </div>
        </div>
    </div>
</div>-->