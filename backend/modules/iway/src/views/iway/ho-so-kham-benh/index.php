<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/9/2020
 * Time: 15:28
 */
?>

<ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab-line-1" data-toggle="tab" href="#tab-1" role="tab"
           aria-controls="tab-1" aria-selected="true"><i class="icon-layers mr-2"></i>Y lệnh</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-line-2" data-toggle="tab" href="#tab-2" role="tab"
           aria-controls="tab-2" aria-selected="false"><i class="icon-camera mr-2"></i>Hình ảnh</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-line-3" data-toggle="tab" href="#tab-3" role="tab"
           aria-controls="tab-3" aria-selected="false"><i class="icon-control-play mr-2"></i>Video</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-line-4" data-toggle="tab" href="#tab-4" role="tab"
           aria-controls="tab-4" aria-selected="false"><i class="icon-film mr-2"></i>File X-Quang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-line-5" data-toggle="tab" href="#tab-5" role="tab"
           aria-controls="tab-5" aria-selected="false"><i class="icon-film mr-2"></i>File STL</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active show" id="tab-1" role="tabpanel" aria-labelledby="tab-line-1">
        <?= $this->render('_y-lenh'); ?>
    </div>
    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-line-2">
        <?= $this->render('_hinh-anh'); ?>
    </div>
    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-line-3">
        <?= $this->render('_video'); ?>
    </div>
    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-line-4">
        <?= $this->render('_file-x-quang'); ?>
    </div>
    <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-line-5">
        <?= $this->render('_file-stl'); ?>
    </div>
</div>

