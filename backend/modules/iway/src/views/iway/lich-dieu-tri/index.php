<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/12/2020
 * Time: 09:11
 */
?>
<div class="plan-treatment card-body">
    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#parient1" role="tab" aria-controls="parient1"
               aria-selected="true"><i class="icon-chart mr-2"></i>Tiến độ sản xuất khay</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient2" role="tab" aria-controls="parient2"
               aria-selected="false"><i class="icon-calender mr-2"></i>Lịch thay khay</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient3" role="tab" aria-controls="parient3"
               aria-selected="false"><i class="icon-calender mr-2"></i>Lịch khám lần tiếp theo</a>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContentLine">
        <div class="tab-pane fade show active" id="parient1" role="tabpanel" aria-labelledby="parient1">
            <?= $this->render('_tien-do-san-xuat'); ?>
        </div>
        <div class="tab-pane fade" id="parient2" role="tabpanel" aria-labelledby="parient2">
            <?= $this->render('_lich-thay-khay'); ?>
        </div>
        <div class="tab-pane fade" id="parient3" role="tabpanel" aria-labelledby="parient3">
            <?= $this->render('_lich-kham-tiep-theo'); ?>
        </div>
    </div>


    <div class="modal fade bd-example-modal-remove" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleLargeModalLabel">Xóa lịch thay khay</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="la la-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            Bạn chắc chắn muốn xóa lịch khay tay này?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-sm btn-primary">Xóa lịch khay tay</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleLargeModalLabel">Chỉnh sửa vật tư</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="la la-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Số ngày đeo:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="inputEmail3"
                                           placeholder="Số ngày đeo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Từ ngày:</label>
                                <div class="col-sm-9">
                                    <div class="input-group maxwidth-220">
                                        <input type="text" id="default-date4" class="datepicker-here form-control"
                                               placeholder="dd/mm/yyyy" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Đến ngày:</label>
                                <div class="col-sm-9">
                                    <div class="input-group maxwidth-220">
                                        <input type="text" id="default-date5" class="datepicker-here form-control"
                                               placeholder="dd/mm/yyyy" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-sm btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
