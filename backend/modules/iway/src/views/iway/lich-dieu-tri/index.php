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
               aria-selected="true"><i class="feather icon-bar-chart mr-2"></i>Tiến độ sản xuất khay</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient2" role="tab" aria-controls="parient2"
               aria-selected="false"><i class="feather icon-calendar mr-2"></i>Lịch thay khay</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parient3" role="tab" aria-controls="parient3"
               aria-selected="false"><i class="la la-calendar-o mr-2"></i>Lịch khám lần tiếp theo</a>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContentLine">
        <div class="tab-pane fade show active" id="parient1" role="tabpanel" aria-labelledby="parient1">
                <div class="card mb-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khay số</th>
                                    <th>Mã khay</th>
                                    <th>Tình trạng bàn giao khay</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Khay số 1</td>
                                    <td>#22324</td>
                                    <td>Ép khay</td>
                                    <td><a href="#">Bàn giao cho bệnh nhân</a></td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Khay só 2</td>
                                    <td>#22324</td>
                                    <td>Đóng hộp</td>
                                    <td><a href="#">Bàn giao PK</a></td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Khay số 3</td>
                                    <td>#22324</td>
                                    <td>Bàn giao phòng khám</td>
                                    <td><a href="#">In 3D Mẫu hàm</a></td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Khay số 4</td>
                                    <td>#22324</td>
                                    <td>Cắt viền khay</td>
                                    <td><a href="#">Ép khay</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-info" style="width: 150px;">Lưu</button>
                    </div>
                </div>

            </div>
        <div class="tab-pane fade" id="parient2" role="tabpanel" aria-labelledby="parient2">
            <div class="card mb-30">
                <div class="card-header">
                    <div class="row mb-20">
                        <div class="col-sm-6">
                            <div class="row">
                                <label class="col-lg-6 col-form-label text-right">Số ngày đeo khay:</label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="" placeholder="10">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <label class="col-sm-6 col-form-label text-right">Số giờ đeo khay/ Ngày:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="" placeholder="20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label class="col-lg-6 col-form-label text-right">Ngày bắt đầu treo tray:</label>
                                <div class="col-lg-6">
                                    <div class="input-group maxwidth-220">
                                        <input type="text" id="default-date2" class="datepicker-here form-control"
                                               placeholder="dd/mm/yyyy" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary" style="max-width: 150px">Tạo lịch
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Khay số</th>
                                <th>Mã khay</th>
                                <th>Số ngày đeo</th>
                                <th>Từ ngày</th>
                                <th>Đến ngày</th>
                                <th width="10%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>Khay số 1</td>
                                <td>#23232</td>
                                <td>3</td>
                                <td>20/02/2020</td>
                                <td>30/02/2020</td>
                                <td>
                                    <a href="#" class="text-danger" data-toggle="modal"
                                       data-target=".bd-example-modal-remove"><i class="feather icon-trash"></i></a>
                                    <a href="#" class="text-primary mr-2" data-toggle="modal"
                                       data-target=".bd-example-modal-edit"><i class="feather icon-edit-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Khay số 2</td>
                                <td>#44343</td>
                                <td>4</td>
                                <td>20/02/2020</td>
                                <td>30/02/2020</td>
                                <td>
                                    <a href="#" class="text-danger" data-toggle="modal"
                                       data-target=".bd-example-modal-remove"><i class="feather icon-trash"></i></a>
                                    <a href="#" class="text-primary mr-2" data-toggle="modal"
                                       data-target=".bd-example-modal-edit"><i class="feather icon-edit-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Khay số 3</td>
                                <td>#23232</td>
                                <td>6</td>
                                <td>20/02/2020</td>
                                <td>30/02/2020</td>
                                <td>
                                    <a href="#" class="text-danger" data-toggle="modal"
                                       data-target=".bd-example-modal-remove"><i class="feather icon-trash"></i></a>
                                    <a href="#" class="text-primary mr-2" data-toggle="modal"
                                       data-target=".bd-example-modal-edit"><i class="feather icon-edit-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Khay số 4</td>
                                <td>#23232</td>
                                <td>7</td>
                                <td>20/02/2020</td>
                                <td>30/02/2020</td>
                                <td>
                                    <a href="#" class="text-danger" data-toggle="modal"
                                       data-target=".bd-example-modal-remove"><i class="feather icon-trash"></i></a>
                                    <a href="#" class="text-primary mr-2" data-toggle="modal"
                                       data-target=".bd-example-modal-edit"><i class="feather icon-edit-2"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-info" style="width: 150px;">Lưu</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="parient3" role="tabpanel" aria-labelledby="parient3">
            <div class="lich-khamtiep">
                <div class="form-group row m-t-30">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Lịch khám lần tiếp theo:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" id="default-date3" class="datepicker-here form-control"
                                   placeholder="dd/mm/yyyy" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i
                                            class="feather icon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-info" style="max-width: 150px">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-remove" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Xóa lịch thay khay</h5>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Xóa lịch khay tay</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Chỉnh sửa vật tư</h5>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
