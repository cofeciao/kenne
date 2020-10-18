<?php
$this->title = 'Đăng ký';

use yii\widgets\ActiveForm;

/* @var $model \frontend\models\SignupForm */

?>
<!-- Begin Kenne's Breadcrumb Area -->

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home() ?>">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>
</div>


<!-- Kenne's Breadcrumb Area End Here -->
<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
                <?php $form = ActiveForm::begin(['action' => ['/site/signup'], 'method' => 'post','enableClientScript' => false]) ?>
                <div class="login-form">
                    <h4 class="login-title">Register</h4>
                    <div class="row">
                        <div class="col-md-12 col-12 mb--20">
                            <?= $form->field($model, 'username')->textInput()
                                ->input('text', ['placeholder' => 'Enter your username'])->label('Username*') ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model,'email')->textInput()
                                ->input('email',['placeholder' => 'Email Address'])->label('Email Address*')?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model,'password')->textInput()
                                ->input('password',['placeholder' => 'password'])->label('Password')?>
                        </div>
                        <!--<div class="col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" placeholder="Confirm Password">
                        </div>-->
                        <div class="col-12">
                            <?= \yii\helpers\Html::submitButton('Register',['class' => 'kenne-register_btn', 'name' => 'register-button']) ?>
                        </div>
                        <div class="col-12">

                            <?php if(Yii::$app->session->hasFlash('success')){  ?>
                            <div class="alert alert-success text-center">Đăng ký thành công</div>
                            <?php }  ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
                </form>
            </div>
            <div class="col-lg-2"></div>

        </div>
    </div>
</div>
<!--<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <?php /*$form = ActiveForm::begin(['action' =>['/sign/register'],'method' => 'post']); */ ?>
                <div class="login-form">
                    <h4 class="login-title">Register</h4>
                    <div class="row">
                        <div class="col-md-6 col-12 mb--20">
                            <? /*= $form->field($model, 'username')->textInput(['maxlength' => true]) */ ?>
                        </div>
                        <div class="col-md-12">
                            <? /*= $form->field($model, 'email')->textInput(['maxlength' => true]) */ ?>
                        </div>
                        <div class="col-md-6">
                            <? /*= $form->field($model, 'password_hash')->textInput() */ ?>
                        </div>
                        <div class="col-12">
                            <?php /*if(Yii::$app->session->hasFlash('success')) {*/ ?>
                                <div class="alert alert-success text-center">Đăng ký thành công</div>
                            <?php /*} */ ?>
                            <button class="kenne-register_btn">Register</button>
                        </div>
                    </div>
                </div>
                <?php /*ActiveForm::end(); */ ?>
            </div>
        </div>
    </div>
</div>-->