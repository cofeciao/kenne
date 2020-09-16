<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/14/2020
 * Time: 11:10
 */
?>
<form class="" action="" method="post">
    <div class="setHidden">
        <div class="text-center">
            <button type="button" class="btn btn-sm btn-primary">Lưu lại</button>
            <a class="btn btn-sm btn-danger btn-delete text-white">Xóa</a>
        </div>
        <div class="form-group row">
            <div class="col-sm-9">
                <div class="form-group row">
                    <div class="col-sm-9">
                        <fieldset class="form-group mt-0">
                            <button onclick="$(this).siblings('.inputUpload').click()" type="button"
                                    class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-cloud-upload mr-5"></span>Upload
                            </button>
                            <input type="file" datatype="video" name="file[]" accept="video/mp4" multiple=""
                                   style="display: none" enctype="multipart/form-data" class="form-control inputUpload"
                                   namefoldersave="patient">
                            <input type="hidden" name="imageMutil" class="imageMutil">
                        </fieldset>
                        <div class="preview-images-zone">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md-full">
        <p class="mb-10">2020-09-14 10:06:51</p>
        <p class="mb-10">Tên bác sĩ khám: <span class="text-primary bold">Luke Nguyễn</span></p>
    </div>
    <div class="form-group row">
        <div class="col-lg-9">
            <article class="upload-file icon-ok">
                <output class="result">
                    <div class="mb-30 box-image">
                        <a href="javascript:void(0)">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/iway/video.png')[1] ?>"
                                 class="thumbnail">
                        </a>
                        <a href="javascript:void(0"
                           class="swal2-confirm btn btn-success swal2-styled download-file"><i
                                    class="dripicons-download"></i></a>
                        <input value="" data-url="" type="checkbox"
                               class="form-control patient-file-checkbox">
                    </div>
                </output>
            </article>
        </div>
    </div>
</form>
