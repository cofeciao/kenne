<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/14/2020
 * Time: 11:07
 */
?>
<form class="" action="" method="post">
    <div class="mb-10 mt-50 text-center">
        <a href="javascript:void(0)" class="btn btn-sm btn-success">Xuất PDF</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-info">In ảnh</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-primary setHidden">Sửa</a>
    </div>

    <div class="md-full mb-10">
        <h4 class="text-primary">Y lệnh điều trị cho bệnh nhân</h4>
    </div>
    <div class="row">
        <label class="col-sm-12 col-formlabel">+ Tên bệnh nhân</label>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <label class="col-lg-4 col-formlabel text-right">- Họ:</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Họ">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <label class="col-lg-4 col-formlabel text-right">- Tên:</label>
                <div class="col-lg-8">
                    <input type="text" value="test" class="form-control" placeholder="Tên">
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <label class="col-sm-12 col-formlabel">+ Giới tính</label>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-10">
            <div class="custom-control custom-radio pull-left mr-15">
                <input type="radio" id="customRadio1" class="custom-control-input">
                <label class="custom-control-label" for="customRadio1">Nam</label>
            </div>
            <div class="custom-control custom-radio pull-left">
                <input checked="" type="radio" id="customRadio2" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Nữ</label>
            </div>
        </div>

    </div>
    <div class="row">
        <label class="col-lg-2 col-formlabel text-left">+ Ngày sinh:</label>
        <div class="col-lg-4">
            <div class="input-group maxwidth-220">
                <input type="text" class="form-control" placeholder="dd/mm/yyyy">
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-formlabel">+ Tình trạng lâm sàng</label>
    </div>

    <div class="row mb-15">
        <div class="col-lg-4">
            <p>I.1 CHEN CHÚC</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_I1[]"
                           class="custom-control-input setCheckboxYcommand" value="1"
                           id="clinical_conditions_I1_1">
                    <label class="custom-control-label" for="clinical_conditions_I1_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_I1[]"
                           class="custom-control-input setCheckboxYcommand" value="2"
                           id="clinical_conditions_I1_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_I1_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_I1[]"
                           class="custom-control-input setCheckboxYcommand" value="3"
                           id="clinical_conditions_I1_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_I1_3">3.Nặng </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <p>I.2 THƯA KẼ</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_I2[]"
                           class="custom-control-input setCheckboxYcommand" value="1"
                           id="clinical_conditions_I2_1">
                    <label class="custom-control-label" for="clinical_conditions_I2_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_I2[]"
                           class="custom-control-input setCheckboxYcommand" value="2"
                           id="clinical_conditions_I2_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_I2_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_I2[]"
                           class="custom-control-input setCheckboxYcommand" value="3"
                           id="clinical_conditions_I2_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_I2_3">3.Nặng </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <p>II.1 HẸP HÀM</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_II1[]" value="1"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_II1_1">
                    <label class="custom-control-label" for="clinical_conditions_II1_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_II1[]" value="2"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_II1_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_II1_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_II1[]" value="3"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_II1_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_II1_3">3.Nặng </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-15">
        <div class="col-lg-4">
            <p>III.1 CẮN SÂU</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_III1[]" value="1"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III1_1">
                    <label class="custom-control-label" for="clinical_conditions_III1_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_III1[]" value="2"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III1_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_III1_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_III1[]" value="3"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III1_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_III1_3">3.Nặng </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <p>III.2 CẮN HỞ</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_III2[]" value="1"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III2_1">
                    <label class="custom-control-label" for="clinical_conditions_III2_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_III2[]" value="2"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III2_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_III2_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_III2[]" value="3"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_III2_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_III2_3">3.Nặng </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <p>IV.1 HẠNG II</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_IV1[]" value="1"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV1_1">
                    <label class="custom-control-label" for="clinical_conditions_IV1_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_IV1[]" value="2"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV1_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_IV1_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_IV1[]" value="3"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV1_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_IV1_3">3.Nặng </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-15">
        <div class="col-lg-4">
            <p>IV.2 HẠNG III</p>
            <div class="md-full">
                <div class="custom-control custom-checkbox pull-left">
                    <input type="checkbox" name="clinical_conditions_IV2[]" value="1"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV2_1">
                    <label class="custom-control-label" for="clinical_conditions_IV2_1">1.Nhẹ </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_IV2[]" value="2"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV2_2">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_IV2_2">2.Trung
                        bình </label>
                </div>
                <div class="custom-control custom-checkbox pull-left ml-15">
                    <input type="checkbox" name="clinical_conditions_IV2[]" value="3"
                           class="custom-control-input setCheckboxYcommand" id="clinical_conditions_IV2_3">
                    <label class="custom-control-label v-a-m" for="clinical_conditions_IV2_3">3.Nặng </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-15">
        <label class="col-lg-3 col-formlabel text-right">- Khác:</label>
        <div class="col-lg-9">
            <input type="text" name="clinical_conditions_other" class="form-control setInputTextYcommand"
                   placeholder="">
        </div>
    </div>

    <div class="row mt-15">
        <label class="col-lg-3 col-formlabel text-right">- Ghi chú chung:</label>
        <div class="col-lg-9">
            <textarea name="clinical_conditions_general_note" rows="4"
                      class="md-full form-control setInputTextYcommand"></textarea>
        </div>
    </div>

    <div class="row mt-15">
        <label class="col-lg-3 col-formlabel text-right">- Mong muốn của bệnh nhân:</label>
        <div class="col-lg-9">
            <textarea name="clinical_conditions_desire" rows="4"
                      class="md-full form-control setInputTextYcommand"></textarea>
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-sm-12 col-formlabel">+ Ghi nhận tình trạng lâm sàng</label>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">1. Tương quan răng
            cối:</label>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Phải</label>
                        <div class="col-lg-8">
                            <input type="text" name="record_linical_condition[]"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Trái</label>
                        <div class="col-lg-8">
                            <input type="text" name="record_linical_condition[]"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">2. Tương quan răng
            nanh:</label>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Phải</label>
                        <div class="col-lg-8">
                            <input type="text" name="record_linical_condition[]"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Trái</label>
                        <div class="col-lg-8">
                            <input name="record_linical_condition[]" type="text"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">3. Đường
            giữa:</label>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Hàm
                            trên</label>
                        <div class="col-lg-8">
                            <input name="record_linical_condition[]" type="text"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-lg-2 col-formlabel text-right">Hàm
                            dưới</label>
                        <div class="col-lg-8">
                            <input name="record_linical_condition[]"
                                   class="form-control record_linical_condition">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">4. Overbite:</label>
        <div class="col-lg-9">
            <input type="text" name="record_linical_condition[]"
                   class="form-control record_linical_condition">
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">5. Overjet:</label>
        <div class="col-lg-9">
            <input type="text" name="record_linical_condition[]"
                   class="form-control record_linical_condition">
        </div>
    </div>
    <div class="row mb-10">
        <label class="col-lg-3 col-formlabel">6. Vấn đề khớp thái
            dương
            hàm:</label>
        <div class="col-lg-9">
            <input type="text" name="record_linical_condition[]"
                   class="form-control record_linical_condition">
        </div>
    </div>
    <div class="row mb-30">
        <label class="col-lg-3 col-formlabel">7. Thói quen
            xấu:</label>
        <div class="col-lg-9">
            <input type="text" name="record_linical_condition[]"
                   class="form-control record_linical_condition">
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <h4 class="text-primary">1. Chỉ định điều trị:</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input name="arch_to_treat[]" value="1" type="checkbox"
                   class="custom-control-input setCheckboxYcommand" id="arch_to_treat_1">
            <label class="custom-control-label v-a-m" for="arch_to_treat_1">Cả 2 hàm</label>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="arch_to_treat[]" value="2"
                   class="custom-control-input setCheckboxYcommand" id="arch_to_treat_2">
            <label class="custom-control-label v-a-m" for="arch_to_treat_2">Hàm trên</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="3"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_3">
                <label class="custom-control-label v-a-m" for="arch_to_treat_3">
                    Mẫu hàm chẩn đoán hàm đối diện</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="4"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_4">
                <label class="custom-control-label v-a-m" for="arch_to_treat_4">Không
                    làm gì hàm dưới</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="5"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_5">
                <label class="custom-control-label v-a-m" for="arch_to_treat_5">Khay
                    thụ động ở hàm dưới (chú ý: sẽ tính tiền cả 2
                    hàm)</label>
            </div>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="arch_to_treat[]" value="6"
                   class="custom-control-input setCheckboxYcommand" id="arch_to_treat_6">
            <label class="custom-control-label v-a-m" for="arch_to_treat_6">Hàm dưới</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="7"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_7">
                <label class="custom-control-label v-a-m" for="arch_to_treat_7">Mẫu hàm chẩn đoán hàm đối
                    diện</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="8"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_8">
                <label class="custom-control-label v-a-m" for="arch_to_treat_8">Không
                    làm gì hàm dưới</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" name="arch_to_treat[]" value="9"
                       class="custom-control-input setCheckboxYcommand" id="arch_to_treat_9">
                <label class="custom-control-label v-a-m" for="arch_to_treat_9">Khay
                    thụ động ở hàm dưới (chú ý: sẽ tính tiền cả 2
                    hàm)</label>
            </div>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">2. Giới hạn sự
            dịch
            chuyển của các răng (Ví dụ: Cầu răng, răng cứng khớp,
            implants,...)</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="tooth_movement_retrictions[]" value="1"
                   class="custom-control-input setCheckboxYcommand" id="tooth_movement_retrictions_01">
            <label class="custom-control-label v-a-m" for="tooth_movement_retrictions_01">NKhông (có
                thể dịch chuyển tất cả các răng)</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="tooth_movement_retrictions[]" value="2"
                   class="custom-control-input setCheckboxYcommand" id="tooth_movement_retrictions_02">
            <label class="custom-control-label v-a-m" for="tooth_movement_retrictions_02">Những răng sau không
                nên dịch chuyển</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="w-100">
            <div class="table-responsive">
                <table id="default-datatable" class="display table table-striped table-bordered td-height-40 mb-0">
                    <tbody>
                    <tr>
                        <td class="rotate-90" rowspan="4">
                            <span>R (Phải)</span>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="18" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions1">
                                <label class="custom-control-label" for="tooth_movement_retrictions1">18</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="17" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions2">
                                <label class="custom-control-label" for="tooth_movement_retrictions2">17</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="16" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions3">
                                <label class="custom-control-label" for="tooth_movement_retrictions3">16</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="15" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions114">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions114">15</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="14" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions4">
                                <label class="custom-control-label" for="tooth_movement_retrictions4">14</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="13" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions5">
                                <label class="custom-control-label" for="tooth_movement_retrictions5">13</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="12" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions6">
                                <label class="custom-control-label" for="tooth_movement_retrictions6">12</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="11" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions7">
                                <label class="custom-control-label" for="tooth_movement_retrictions7">11</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="21" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions8">
                                <label class="custom-control-label" for="tooth_movement_retrictions8">21</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="22" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions9">
                                <label class="custom-control-label" for="tooth_movement_retrictions9">22</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="23" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions10">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions10">23</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="24" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions11">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions11">24</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="25" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions12">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions12">25</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="26" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions13">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions13">26</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="27" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions14">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions14">27</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="28" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions15">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions15">28</label>
                            </div>
                        </td>
                        <td class="rotate90" rowspan="4">
                            <span>L (Trái)</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="48" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions16">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions16">48</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="47" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions17">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions17">47</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="46" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions18">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions18">46</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="45" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions19">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions19">45</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="44" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions20">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions20">44</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="43" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions21">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions21">43</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="42" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions22">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions22">42</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="41" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions23">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions23">41</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="31" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions24">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions24">31</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="32" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions25">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions25">32</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="33" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions26">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions26">33</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="34" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions27">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions27">34</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="35" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions28">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions28">35</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="36" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions29">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions29">36</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="37" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions30">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions30">37</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="38" name="tooth_movement_retrictions[]"
                                       id="tooth_movement_retrictions31">
                                <label class="custom-control-label"
                                       for="tooth_movement_retrictions31">38</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p>
            Bác sỹ phải chịu trách nhiệm trong việc chẩn đoán qua
            hình
            ảnh Xquang và các tư liệu khác về bệnh nhân.</p>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">3. Gắn Attachments (Để chỉ định
            attachments, vui lòng xem phần Clinical
            Preferences)</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="attachments[]" value="1"
                   class="custom-control-input setCheckboxYcommand" id="attachments01">
            <label class="custom-control-label v-a-m" for="attachments01">Đặt
                attachments ở những chỗ cần thiết</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" name="attachments[]" value="2"
                   class="custom-control-input setCheckboxYcommand" id="attachments02">
            <label class="custom-control-label v-a-m" for="attachments02">Do not place attachments on
                these
                teeth/Không đặt attachments ở các răng sau
                đây:</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="default-datatable" class="display table table-striped table-bordered td-height-40">

                    <tbody>
                    <tr>
                        <td class="rotate-90" rowspan="4">
                            <span>R (Phải)</span>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="18" name="attachments[]" id="attachments1">
                                <label class="custom-control-label" for="attachments1">18</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="17" name="attachments[]" id="attachments2">
                                <label class="custom-control-label" for="attachments2">17</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="16" name="attachments[]" id="attachments3">
                                <label class="custom-control-label" for="attachments3">16</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="15" name="attachments[]" id="attachments453">
                                <label class="custom-control-label" for="attachments453">15</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="14" name="attachments[]" id="attachments4">
                                <label class="custom-control-label" for="attachments4">14</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="13" name="attachments[]" id="attachments5">
                                <label class="custom-control-label" for="attachments5">13</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="12" name="attachments[]" id="attachments6">
                                <label class="custom-control-label" for="attachments6">12</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="11" name="attachments[]" id="attachments7">
                                <label class="custom-control-label" for="attachments7">11</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="21" name="attachments[]" id="attachments8">
                                <label class="custom-control-label" for="attachments8">21</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="22" name="attachments[]" id="attachments9">
                                <label class="custom-control-label" for="attachments9">22</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="23" name="attachments[]" id="attachments10">
                                <label class="custom-control-label" for="attachments10">23</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="24" name="attachments[]" id="attachments11">
                                <label class="custom-control-label" for="attachments11">24</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="25" name="attachments[]" id="attachments12">
                                <label class="custom-control-label" for="attachments12">25</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="26" name="attachments[]" id="attachments13">
                                <label class="custom-control-label" for="attachments13">26</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="27" name="attachments[]" id="attachments14">
                                <label class="custom-control-label" for="attachments14">27</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="28" name="attachments[]" id="attachments15">
                                <label class="custom-control-label" for="attachments15">28</label>
                            </div>
                        </td>
                        <td class="rotate90" rowspan="4">
                            <span>L (Trái)</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="48" name="attachments[]" id="attachments16">
                                <label class="custom-control-label" for="attachments16">48</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="47" name="attachments[]" id="attachments17">
                                <label class="custom-control-label" for="attachments17">47</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="46" name="attachments[]" id="attachments18">
                                <label class="custom-control-label" for="attachments18">46</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="45" name="attachments[]" id="attachments19">
                                <label class="custom-control-label" for="attachments19">45</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="44" name="attachments[]" id="attachments20">
                                <label class="custom-control-label" for="attachments20">44</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="43" name="attachments[]" id="attachments21">
                                <label class="custom-control-label" for="attachments21">43</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="42" name="attachments[]" id="attachments22">
                                <label class="custom-control-label" for="attachments22">42</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="41" name="attachments[]" id="attachments23">
                                <label class="custom-control-label" for="attachments23">41</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="31" name="attachments[]" id="attachments24">
                                <label class="custom-control-label" for="attachments24">31</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="32" name="attachments[]" id="attachments25">
                                <label class="custom-control-label" for="attachments25">32</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="33" name="attachments[]" id="attachments26">
                                <label class="custom-control-label" for="attachments26">33</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="34" name="attachments[]" id="attachments27">
                                <label class="custom-control-label" for="attachments27">34</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="35" name="attachments[]" id="attachments28">
                                <label class="custom-control-label" for="attachments28">35</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="36" name="attachments[]" id="attachments29">
                                <label class="custom-control-label" for="attachments29">36</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="37" name="attachments[]" id="attachments30">
                                <label class="custom-control-label" for="attachments30">37</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="38" name="attachments[]" id="attachments31">
                                <label class="custom-control-label" for="attachments31">38</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">4. Tương quan theo chiều trước sau:</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="default-datatable"
                       class="display table table-striped table-bordered table-td-center mb-0">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Phải</th>
                        <th class="text-center">Trái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Giữ nguyên</td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="1"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_1r">
                                <label class="custom-control-label" for="anterior_posterior_1r"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="2"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_1l">
                                <label class="custom-control-label" for="anterior_posterior_1l"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Chỉ cải thiện tương quan răng nanh</td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="3"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_2r">
                                <label class="custom-control-label" for="anterior_posterior_2r"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="4"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_2l">
                                <label class="custom-control-label" for="anterior_posterior_2l"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cải thiện tương quan răng nanh và răng cối (Nêu chi tiết ở mục yêu cầu đặc biệt)
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="5"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_3r">
                                <label class="custom-control-label" for="anterior_posterior_3r"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="6"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_3l">
                                <label class="custom-control-label" for="anterior_posterior_3l"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Điều chỉnh về khớp răng hạng I (răng nanh và răng cối)</td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="7"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_4r">
                                <label class="custom-control-label" for="anterior_posterior_4r"></label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox pl-0">
                                <input type="checkbox" name="anterior_posterior[]" value="8"
                                       class="custom-control-input setCheckboxYcommand"
                                       id="anterior_posterior_4l">
                                <label class="custom-control-label" for="anterior_posterior_4l"></label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="anterior_posterior[]"
                   value="9" id="anterior_posterior_tooth_movement1">
            <label class="custom-control-label v-a-m" for="anterior_posterior_tooth_movement1">Các lựa chọn dịch
                chuyển răng</label>
        </div>
        <p class="l-h-1c8">&nbsp;(Nếu lựa chọn nhiều hơn 1 chỉ định dưới đây thì chỉ định số lượng và trình tự
            tại mục Chỉ định đặc biệt)</p>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                       name="anterior_posterior[]" value="10" id="anterior_posterior_tooth_movement2">
                <label class="custom-control-label v-a-m" for="anterior_posterior_tooth_movement2">Cắt kẽ phía
                    sau</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                       name="anterior_posterior[]" value="11" id="anterior_posterior_tooth_movement">
                <label class="custom-control-label v-a-m" for="anterior_posterior_tooth_movement">Chỉnh hạng
                    II/III (Cần thêm khí cụ hỗ trợ carrier và thun hạng II)</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                       name="anterior_posterior[]" value="12" id="anterior_posterior_tooth_movement4">
                <label class="custom-control-label v-a-m" for="anterior_posterior_tooth_movement4">Di xa tuần
                    tự</label>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                       name="anterior_posterior[]" value="13" id="anterior_posterior_tooth_movement5">
                <label class="custom-control-label v-a-m" for="anterior_posterior_tooth_movement5">Mô phỏng phẫu
                    thuật chỉnh hình</label>
            </div>
        </div>
        <div class="col-lg-12 mt-10">
            <p>Chỉ định nhổ răng để chỉnh tương quan trước sau ở mục nhổ răng trong mục Răng thưa kẽ và răng
                chen chúc</p>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">5. Overjet</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overjet[]" value="1"
                   id="overjet1">
            <label class="custom-control-label v-a-m" for="overjet1">Cho ra kết quả sau khi làm thẳng
                hàng</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overjet[]" value="2"
                   id="overjet2">
            <label class="custom-control-label v-a-m" for="overjet2">Giữ nguyên Overjet như ban đầu, có thể mài
                kẽ</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overjet[]" value="3"
                   id="overjet3">
            <label class="custom-control-label v-a-m" for="overjet3">Cải thiện Overjet với mài kẽ</label>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">6. Cắn sâu, cắn hở</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]" value="1"
                   id="overjet4">
            <label class="custom-control-label v-a-m" for="overjet4">Cho ra kết quả sau khi làm thẳng
                hàng</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]" value="2"
                   id="overjet5">
            <label class="custom-control-label v-a-m" for="overjet5"> Giữ nguyên overbite như trước (Có thể cắt
                kẽ)</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]" value="3"
                   id="overjet6">
            <label class="custom-control-label v-a-m" for="overjet6">Điều chỉnh cắn hở</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="4" id="overjet7">
                <label class="custom-control-label v-a-m" for="overjet7">Chỉ làm trồi răng phía trước</label>
            </div>
            <div class="md-full pl-40 mt-0">
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="5"
                               class="custom-control-input setCheckboxYcommand" id="overjet8">
                        <label class="custom-control-label v-a-m" for="overjet8">Hàm trên</label>
                    </div>
                </div>
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="6"
                               class="custom-control-input setCheckboxYcommand" id="overjet9">
                        <label class="custom-control-label v-a-m" for="overjet9">Hàm dưới</label>
                    </div>
                </div>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="7" id="overjet10">
                <label class="custom-control-label v-a-m" for="overjet10">Làm trồi răng phía trước và làm lún
                    răng phía sau</label>
            </div>
            <div class="md-full pl-40 mt-0">
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="8"
                               class="custom-control-input setCheckboxYcommand" id="overjet11">
                        <label class="custom-control-label v-a-m" for="overjet11">Hàm trên</label>
                    </div>
                </div>
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="9"
                               class="custom-control-input setCheckboxYcommand" id="overjet12">
                        <label class="custom-control-label v-a-m" for="overjet12">Hàm dưới</label>
                    </div>
                </div>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="10" id="overjet13">
                <label class="custom-control-label v-a-m" for="overjet13">Những chỉ định đặc biệt khác như phẫu
                    thuật sẽ được yêu cầu tại mục Chỉ định đặc biệt</label>
            </div>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]" value="11"
                   id="overjet14">
            <label class="custom-control-label v-a-m" for="overjet14">Điều chỉnh cắn sâu</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="12" id="overjet15">
                <label class="custom-control-label v-a-m" for="overjet15">Chỉ làm lún răng phía trước</label>
            </div>
            <div class="md-full pl-40 mt-0">
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="13"
                               class="custom-control-input setCheckboxYcommand" id="overjet16">
                        <label class="custom-control-label v-a-m" for="overjet16">Hàm trên</label>
                    </div>
                </div>
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="14"
                               class="custom-control-input setCheckboxYcommand" id="overjet17">
                        <label class="custom-control-label v-a-m" for="overjet17">Hàm dưới</label>
                    </div>
                </div>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="15" id="overjet18">
                <label class="custom-control-label v-a-m" for="overjet18">Làm lún răng phía trước và làm trồi
                    răng phía sau</label>
            </div>
            <div class="md-full pl-40 mt-0">
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="16"
                               class="custom-control-input setCheckboxYcommand" id="overjet19">
                        <label class="custom-control-label v-a-m" for="overjet19">Hàm trên</label>
                    </div>
                </div>
                <div class="md-full">
                    <div class="custom-control custom-checkbox pull-left">
                        <input type="checkbox" name="overbite[]" value="17"
                               class="custom-control-input setCheckboxYcommand" id="overjet20">
                        <label class="custom-control-label v-a-m" for="overjet20">Hàm dưới</label>
                    </div>
                </div>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="overbite[]"
                       value="18" id="overjet21">
                <label class="custom-control-label v-a-m" for="overjet21">Những chỉ định đặc biệt khác như phẫu
                    thuật sẽ được yêu cầu tại mục Chỉ định đặc biệt</label>
            </div>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">7. Gờ được thiết kế ở mặt trong trên khay của răng cửa,răng nanh hàm trên để
            nâng khớp cắn</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                   value="1" id="overjet22">
            <label class="custom-control-label v-a-m" for="overjet22">Không làm Bite Ramps</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                   value="2" id="overjet23">
            <label class="custom-control-label v-a-m" for="overjet23">Đặt Bite Ramps ở những răng hàm
                trên</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox pull-left ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                       value="3" id="overjet24">
                <label class="custom-control-label v-a-m" for="overjet24">Răng cửa</label>
            </div>
            <p class="l-h-1c6">&nbsp;Chú ý: vị trí đặt Bite Ramps sẽ làm lún các răng phía trước hàm trên (khu
                vực tạo lực).</p>
            <div class="clearfix"></div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                       value="4" id="overjet25">
                <label class="custom-control-label v-a-m" for="overjet25">Răng cửa giữa</label>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                       value="5" id="overjet26">
                <label class="custom-control-label v-a-m" for="overjet26">Răng cửa bên</label>
            </div>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="bite_ramps[]"
                   value="6" id="overjet27">
            <label class="custom-control-label v-a-m" for="overjet27">Răng nanh</label>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">8. Đường giữa</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]" value="1"
                   id="overjet28">
            <label class="custom-control-label v-a-m" for="overjet28">Cho ra kết quả đường giữa sau khi làm
                thẳng hàng</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]" value="2"
                   id="overjet29">
            <label class="custom-control-label v-a-m" for="overjet29">Giữ nguyên đường giữa như ban đầu (có thể
                đòi hỏi mài kẽ)</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]" value="3"
                   id="overjet30">
            <label class="custom-control-label v-a-m" for="overjet30">Improve midline with IPR/ Cải
                thiện đường giữa với mài kẽ</label>
        </div>
        <div class="col-lg-12">
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="4" id="overjet31">
                <label class="custom-control-label v-a-m" for="overjet31">Upper/Hàm trên</label>
            </div>
            <div class="custom-control custom-checkbox ml-40">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="5" id="overjet32">
                <label class="custom-control-label v-a-m" for="overjet32">To patient’s right/Chỉnh về
                    phía bên phải của bệnh nhân</label>
            </div>
            <div class="custom-control custom-checkbox ml-40">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="6" id="midline1">
                <label class="custom-control-label v-a-m" for="midline1">To patient’s left/Chỉnh về
                    phía bên trái của bệnh nhân</label>
            </div>
            <div class="custom-control custom-checkbox ml-15">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="7" id="midline2">
                <label class="custom-control-label v-a-m" for="midline2">Lower/Hàm dưới</label>
            </div>
            <div class="custom-control custom-checkbox ml-40">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="8" id="midline3">
                <label class="custom-control-label v-a-m" for="midline3">To patient’s right/Chỉnh về
                    phía bên phải của bệnh nhân</label>
            </div>
            <div class="custom-control custom-checkbox ml-40">
                <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="midline[]"
                       value="9" id="midline4">
                <label class="custom-control-label v-a-m" for="midline4">To patient’s left/Chỉnh về
                    phía bên trái của bệnh nhân</label>
            </div>
        </div>
    </div>
    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">9. Cắn chéo phía sau (nếu có)</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="posterior_crossbite[]"
                   value="1" id="midline5">
            <label class="custom-control-label v-a-m" for="midline5">Không điều chỉnh</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="posterior_crossbite[]"
                   value="2" id="midline6">
            <label class="custom-control-label v-a-m" for="midline6">Điều chỉnh</label>
        </div>
    </div>
    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">10. Spacing &amp; Crowding (Arch Length
            Discrepancy)(chen chúc và thưa kẽ)</h4>
    </div>
    <div class="row mb-0 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="spacing_crowding[]"
                   value="1" id="spacing_crowding1">
            <label class="custom-control-label v-a-m" for="spacing_crowding1">Răng thưa kẽ</label>
        </div>
    </div>
    <div class="row mb-0 ml-15">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="spacing_crowding[]"
                   value="2" id="spacing_crowding2">
            <label class="custom-control-label v-a-m" for="spacing_crowding2">Đóng tất cả các khoảng</label>
        </div>
    </div>
    <div class="row mb-10 ml-15">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="spacing_crowding[]"
                   value="3" id="spacing_crowding3">
            <label class="custom-control-label v-a-m" for="spacing_crowding3">Để lại những khoảng cụ thể (ghi rõ
                trong phần chỉ định đặc biệt)</label>
        </div>
    </div>
    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand" name="spacing_crowding[]"
                   value="4" id="spacing_crowding4">
            <label class="custom-control-label v-a-m" for="spacing_crowding4">Răng chen chúc</label>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">Điều chỉnh hàm trên</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="card-body py-0">
            <div class="table-responsive">
                <table id="default-datatable"
                       class="display table table-striped table-bordered table-td-center">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Ưu tiên</th>
                        <th>Khi cần thiết</th>
                        <th>Không</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nong rộng</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="1"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper11">
                                <label class="custom-control-label" for="resolve_upper11"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="2"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper12">
                                <label class="custom-control-label" for="resolve_upper12"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="3"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper1356">
                                <label class="custom-control-label" for="resolve_upper1356"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nghiêng răng</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="4"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper13">
                                <label class="custom-control-label" for="resolve_upper13"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="5"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper21">
                                <label class="custom-control-label" for="resolve_upper21"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       name="resolve_upper[]" value="6" id="resolve_upper22">
                                <label class="custom-control-label" for="resolve_upper22"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mài kẽ răng phía trước
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="7"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper31">
                                <label class="custom-control-label" for="resolve_upper31"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="8"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper32">
                                <label class="custom-control-label" for="resolve_upper32"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="9"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper33">
                                <label class="custom-control-label" for="resolve_upper33"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mài kẽ răng sau bên phải</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="10"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper41">
                                <label class="custom-control-label" for="resolve_upper41"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="11"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper42">
                                <label class="custom-control-label" for="resolve_upper42"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="12"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper43">
                                <label class="custom-control-label" for="resolve_upper43"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mài kẽ răng sau bên trái</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="13"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper51">
                                <label class="custom-control-label" for="resolve_upper51"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="14"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper52">
                                <label class="custom-control-label" for="resolve_upper52"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_upper[]" value="15"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_upper53">
                                <label class="custom-control-label" for="resolve_upper53"></label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">Điều chỉnh hàm dưới</h4>
    </div>
    <div class="row mb-10 mx-0">
        <div class="card-body py-0">
            <div class="table-responsive">
                <table id="default-datatable"
                       class="display table table-striped table-bordered table-td-center">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Ưu tiên</th>
                        <th>Khi cần thiết</th>
                        <th>Không</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nong rộng</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="1"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower11">
                                <label class="custom-control-label" for="resolve_lower11"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="2"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower12">
                                <label class="custom-control-label" for="resolve_lower12"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="3"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower13">
                                <label class="custom-control-label" for="resolve_lower13"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nghiêng răng</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="4"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower21">
                                <label class="custom-control-label" for="resolve_lower21"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="5"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower22">
                                <label class="custom-control-label" for="resolve_lower22"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="6"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower23">
                                <label class="custom-control-label" for="resolve_lower23"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mài kẽ răng phía trước
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="7"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower31">
                                <label class="custom-control-label" for="resolve_lower31"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="8"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower32">
                                <label class="custom-control-label" for="resolve_lower32"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="9"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower33">
                                <label class="custom-control-label" for="resolve_lower33"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mài kẽ răng sau bên phải</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="10"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower41">
                                <label class="custom-control-label" for="resolve_lower41"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="11"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower42">
                                <label class="custom-control-label" for="resolve_lower42"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="12"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower416">
                                <label class="custom-control-label" for="resolve_lower416"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Mài kẽ răng sau bên trái</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="13"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower51">
                                <label class="custom-control-label" for="resolve_lower51"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="14"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower52">
                                <label class="custom-control-label" for="resolve_lower52"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="resolve_lower[]" value="15"
                                       class="custom-control-input setCheckboxYcommand" id="resolve_lower53">
                                <label class="custom-control-label" for="resolve_lower53"></label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                   name="resolve_lower_extractions[]" value="1" id="resolve_lower_extractions1">
            <label class="custom-control-label v-a-m" for="resolve_lower_extractions1">Nhổ răng</label>
        </div>
    </div>

    <div class="row mb-10 ml-15">
        <div class="custom-control custom-checkbox pull-left">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                   name="resolve_lower_extractions[]" value="2" id="resolve_lower_extractions2">
            <label class="custom-control-label v-a-m" for="resolve_lower_extractions2">Không nhổ răng</label>
        </div>
    </div>
    <div class="row mb-10 ml-15">
        <div class="custom-control custom-checkbox pull-left mb-10">
            <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                   name="resolve_lower_extractions[]" value="3" id="resolve_lower_extractions3">
            <label class="custom-control-label v-a-m" for="resolve_lower_extractions3"> Nhổ các răng sau
                đây:</label>
        </div>
    </div>

    <div class="row mb-10 mx-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="default-datatable"
                       class="display table table-striped table-bordered td-height-40 mb-0">
                    <tbody>
                    <tr>
                        <td class="rotate-90" rowspan="4">
                            <span>R (Phải)</span>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="18" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth1">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth1">18</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="17" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth2">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth2">17</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="16" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth94">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth94">16</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="15" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth3">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth3">15</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="14" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth4">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth4">14</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="13" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth5">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth5">13</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="12" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth6">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth6">12</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="11" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth7">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth7">11</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="21" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth8">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth8">21</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="22" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth9">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth9">22</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="23" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth10">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth10">23</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="24" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth11">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth11">24</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="25" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth12">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth12">25</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="26" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth13">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth13">26</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="27" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth14">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth14">27</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="28" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth15">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth15">28</label>
                            </div>
                        </td>
                        <td class="rotate90" rowspan="4">
                            <span>L (Trái)</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="48" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth16">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth16">48</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="47" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth17">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth17">47</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="46" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth18">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth18">46</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="45" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth19">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth19">45</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="44" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth20">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth20">44</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="43" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth21">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth21">43</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="42" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth22">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth22">42</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="41" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth23">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth23">41</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="31" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth24">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth24">31</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="32" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth25">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth25">32</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="33" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth26">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth26">33</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="34" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth27">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth27">34</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="35" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth28">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth28">35</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="36" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth29">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth29">36</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="37" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth30">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth30">37</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input setCheckboxYcommand"
                                       value="38" name="resolve_lower_extract_these_teeth[]"
                                       id="resolve_lower_extract_these_teeth31">
                                <label class="custom-control-label"
                                       for="resolve_lower_extract_these_teeth31">38</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-10 mt-20 mx-0">
        <h4 class="text-primary">11. Chỉ định đặc biệt</h4>
    </div>
    <div class="row mb-10 mx-0">
        <textarea class="form-control setInputTextYcommand h-300p" name="special_instructions"></textarea>
    </div>

</form>