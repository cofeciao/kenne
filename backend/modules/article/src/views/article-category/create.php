<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modava\article\models\ArticleCategory */

$this->title = Yii::t('article', 'Create Article Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
