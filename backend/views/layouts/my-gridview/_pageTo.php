<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 8/24/2020
 * Time: 15:23
 */

if (!isset($currentPage)) {
    $currentPage = 1;
}
?>

<div class="pull-right mr-2">
    <?= \yii\helpers\Html::input('text', 'go-to-page', ($currentPage ?: 1), ['class' => 'go-to-page'])  ?> / <?= floor($totalPage) ?>
</div>
