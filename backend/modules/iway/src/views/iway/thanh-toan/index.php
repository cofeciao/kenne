<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/12/2020
 * Time: 09:11
 */
?>
<div class="card mb-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-5 col-md-3">
                <h5 class="card-title mb-0">
                    Danh sách thanh toán
                </h5>
            </div>
            <div class="col-2 col-md-3">
                <div class="input-group">
                    <input type="text" id="default-date6" class="datepicker-here form-control" placeholder="Từ ngày"
                           autocomplete="off" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-2 col-md-3">
                <div class="input-group">
                    <input type="text" id="default-date7" class="datepicker-here form-control" placeholder="Đến ngày"
                           autocomplete="off" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="widgetbar">
                    <button class="btn btn-sm btn-primary md-full search-datatable">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hạng mục thanh toán</th>
                            <th>Vật tư</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Số tiền</th>
                            <th>Chiết khấu</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Thanh toán dịch vụ</td>
                            <td>...</td>
                            <td>100.000 đ</td>
                            <td>10</td>
                            <td>1.000.000 đ</td>
                            <td>10.000 đ</td>
                            <td>990.000 đ</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Thanh toán vật tư</td>
                            <td>Răng thẩm mỹ</td>
                            <td>100.000 đ</td>
                            <td>10</td>
                            <td>1.000.000 đ</td>
                            <td>10.000 đ</td>
                            <td>990.000 đ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
