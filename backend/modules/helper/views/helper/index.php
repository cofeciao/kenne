<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26-Apr-19
 * Time: 4:00 PM
 */

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

$this->title = 'Helper Dev';
?>
<?php Pjax::begin(['id' => 'clinicColor', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'GET']]); ?>
    <section id="dom">
        <div class="row">
            <div class="col-12">
                <?php
                if (Yii::$app->session->hasFlash('alert')) {
                    ?>
                    <div class="alert <?= Yii::$app->session->getFlash('alert')['class']; ?> alert-dismissible"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <?= Yii::$app->session->getFlash('alert')['body']; ?>
                    </div>
                    <?php
                }
                ?>
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="btn-add-campaign clearfix" style="margin-top:0px;position:relative">
                                Help dev
                            </div>
                            <div style="margin-top:5px;border:1px solid #ccc;border-radius:3px">
                                <?php
                                $form = ActiveForm::begin();
                                ?>
                                <div class="row">
                                    <div class="col-12 mt-1 ml-1">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <?= $form->field($model, 'strtotime')->widget(DateTimePicker::class, [
                                                        'clientOptions' => [
                                                            'format' => 'dd-mm-yyyy hh:ii',
                                                            'autoclose' => true,
                                                        ],
                                                        'clientEvents' => [
                                                        ],
                                                        'options' => [
                                                            'class' => 'form-control timestam',
                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                                <div class="col-md-1 col-1">
                                                    <?= Html::button('Submit', ['class' => 'btn btn-sx btn-primary', 'id' => 'timestam']); ?>
                                                </div>
                                                <div class="col-md-3 col-3 result">
                                                    <span class="result"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <?= $form->field($model, 'datetoint')
                                                        ->textInput(['class' => 'form-control int-date'])->label(false); ?>
                                                </div>
                                                <div class="col-md-1 col-1">
                                                    <?= Html::button('Submit', ['class' => 'btn btn-sx btn-primary', 'id' => 'int-date']); ?>
                                                </div>
                                                <div class="col-md-3 col-3 result-date">
                                                    <span class="result-date"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php Pjax::end(); ?>
<?php
$url = \yii\helpers\Url::toRoute('/helper/helper/strtotime');
$urlDate = \yii\helpers\Url::toRoute('/helper/helper/datetoint');
$css = <<< CSS
    button#timestam, #int-date {
        line-height: 0.7;
    }
    .result, .result-date {
        line-height: 35px;
    }
CSS;
$script = <<< JS
    $('body').on('click', '#timestam', function() {
          var str = $('.timestam').val();
          $.ajax({
            url: '$url',
            type:'POST',
            dataType:'json',
            data: {"str": str},
        }).done(function(data) {
            $('.result').html(data.date);
        })
    });
    $('body').on('click', '#int-date', function() {
          var int = $('.int-date').val();
          $.ajax({
            url: '$urlDate',
            type:'POST',
            dataType:'json',
            data: {"int": int},
        }).done(function(data) {
            $('.result-date').html(data.int);
        })
    });
JS;

$this->registerCss($css);
$this->registerJs($script, \yii\web\View::POS_END);
