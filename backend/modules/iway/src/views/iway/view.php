<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/8/2020
 * Time: 08:58
 */

use yii\helpers\Html;

$this->title = 'iWay';
$this->title = Yii::t('backend', 'iWay');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
    </div>


</div>


