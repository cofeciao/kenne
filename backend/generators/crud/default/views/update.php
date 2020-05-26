<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$modelClass = StringHelper::basename($generator->modelClass);

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use modava\<?= $generator->messageCategory ?>\<?= ucfirst($generator->messageCategory) ?>Module;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= ucfirst($generator->messageCategory) ?>Module::t('<?= $generator->messageCategory ?>', 'Update : {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => <?= ucfirst($generator->messageCategory) ?>Module::t('<?= $generator->messageCategory ?>', '<?= Inflector::pluralize(Inflector::camel2words($modelClass)) ?>'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= ucfirst($generator->messageCategory) ?>Module::t('<?= $generator->messageCategory ?>', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= "<?=" ?> Html::encode($this->title) <?= "?>\n" ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= "<?=" ?> Url::to(['create']); <?= "?>" ?>"
           title="<?= "<?=" ?> <?= ucfirst($generator->messageCategory) ?>Module::t('article', 'Create'); <?= "?>" ?>">
            <i class="fa fa-plus"></i> <?= "<?=" ?> <?= ucfirst($generator->messageCategory) ?>Module::t('article', 'Create'); <?= "?>" ?></a>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= "<?=" ?> $this->render('_form', [
                    'model' => $model,
                ]) <?= "?>\n" ?>

            </section>
        </div>
    </div>
</div>
