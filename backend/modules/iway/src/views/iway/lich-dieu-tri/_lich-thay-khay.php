<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/16/2020
 * Time: 09:06
 */
?>
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
                                                    class="icon-calender"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-sm btn-primary" style="max-width: 150px">Tạo lịch
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
                           data-target=".bd-example-modal-remove"><i class="icon-trash"></i></a>
                        <a href="#" class="text-primary mr-2" data-toggle="modal"
                           data-target=".bd-example-modal-edit"><i class="icon-pencil"></i></a>
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
                           data-target=".bd-example-modal-remove"><i class="icon-trash"></i></a>
                        <a href="#" class="text-primary mr-2" data-toggle="modal"
                           data-target=".bd-example-modal-edit"><i class="icon-pencil"></i></a>
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
                           data-target=".bd-example-modal-remove"><i class="icon-trash"></i></a>
                        <a href="#" class="text-primary mr-2" data-toggle="modal"
                           data-target=".bd-example-modal-edit"><i class="icon-pencil"></i></a>
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
                           data-target=".bd-example-modal-remove"><i class="icon-trash"></i></a>
                        <a href="#" class="text-primary mr-2" data-toggle="modal"
                           data-target=".bd-example-modal-edit"><i class="icon-pencil"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-sm btn-info" style="width: 150px;">Lưu</button>
    </div>
</div>
