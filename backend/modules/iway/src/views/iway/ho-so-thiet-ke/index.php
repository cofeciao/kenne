<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/12/2020
 * Time: 09:11
 */

?>
<div class="form-group row">
    <label class="col-sm-2">Tên BS thiết kế:</label>
    <div class="col-sm-6">
        <div class="content text-primary">
            Bùi Quang Sáng
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2">Ngày cập nhật:</label>
    <div class="col-sm-6">
        <div class="content text-primary">
            20/02/2020 10:02
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2">Tình trạng:</label>
    <div class="col-sm-6">
        <div class="content">
            Chờ bác sĩ khám xác nhận / Bác sỹ đồng ý / Bác sỹ khám từ chối
        </div>
    </div>
</div>
<div class="plan-treatment">
    <ul class="nav nav-tabs custom-tab-line mb-30" id="design-tk" role="tablist">
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#parient-tk1" role="tab" aria-controls="parient-tk1"
               aria-selected="true"><i class="icon-camera mr-2"></i>Hình ảnh</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" data-toggle="tab" href="#parient-tk2" role="tab" aria-controls="parient-tk2"
               aria-selected="false"><i class="icon-control-play mr-2"></i>Video</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient-tk3" role="tab" aria-controls="parient-tk3"
               aria-selected="false"><i class="icon-doc mr-2"></i>Báo cáo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient-tk4" role="tab" aria-controls="parient-tk4"
               aria-selected="false"><i class="icon-info mr-2"></i>Hướng dẫn vị trí mài kẽ và đặt attachment</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade " id="parient-tk1" role="tabpanel" aria-labelledby="parient-tk1">
            <?= $this->render('_hinh-anh'); ?>
        </div>
        <div class="tab-pane fade active show" id="parient-tk2" role="tabpanel" aria-labelledby="parient-tk2">
            <?= $this->render('_video'); ?>
        </div>
        <div class="tab-pane fade " id="parient-tk3" role="tabpanel" aria-labelledby="parient-tk3">
            <?= $this->render('_bao-cao'); ?>
        </div>
        <div class="tab-pane fade " id="parient-tk4" role="tabpanel" aria-labelledby="parient-tk4">
            <?= $this->render('_huong-dan'); ?>
        </div>
    </div>
</div>