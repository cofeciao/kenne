<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/15/2020
 * Time: 10:17
 */
?>
<form action="">
    <div class="setHidden">
        <div class="text-center">
            <button type="submit" class="btn btn-sm btn-primary">Lưu lại</button>
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
                            <input type="file" datatype="file" name="file[]"
                                   accept="application/pdf,image/x-png,image/jpg" multiple="" style="display: none"
                                   enctype="multipart/form-data" class="form-control inputUpload">
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
        <p class="mb-10">2020-09-14 16:53:57</p>
        <p class="mb-10">Tên bác sĩ khám: <span class="text-primary bold">Luke Nguyễn</span></p>
    </div>
    <div class="form-group row">
        <div class="col-lg-9">
            <article class="upload-file icon-ok">
                <output class="result">
                    <div class="m-b-30 box-image">
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-tk2">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                                 class="thumbnail">
                        </a>
                        <a href="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                           class="swal2-confirm btn btn-success swal2-styled download-file">
                            <i class="dripicons-download"></i>
                        </a>
                        <input value=""
                               data-url="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                               type="checkbox"
                               class="form-control patient-file-checkbox">
                    </div>
                    <div class="mb-30 box-image">
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-tk2">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                                 class="thumbnail">
                        </a>
                        <a href="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                           class="swal2-confirm btn btn-success swal2-styled download-file">
                            <i class="dripicons-download"></i>
                        </a>
                        <input value="263"
                               data-url="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                               type="checkbox"
                               class="form-control patient-file-checkbox">
                    </div>
                </output>
            </article>
        </div>
    </div>
    <div class="md-full">
        <p class="mb-10">2020-09-14 16:34:17</p>
        <p class="mb-10">Tên bác sĩ khám: <span class="text-primary bold">Luke Nguyễn</span></p>
    </div>
    <div class="form-group row">
        <div class="col-lg-9">
            <article class="upload-file icon-ok">
                <output class="result">
                    <div class="m-b-30 box-image">
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-tk2">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                                 class="thumbnail">
                        </a>
                        <a href="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                           class="swal2-confirm btn btn-success swal2-styled download-file">
                            <i class="dripicons-download"></i>
                        </a>
                        <input value=""
                               data-url="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                               type="checkbox"
                               class="form-control patient-file-checkbox">
                    </div>
                    <div class="mb-30 box-image">
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-tk2">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                                 class="thumbnail">
                        </a>
                        <a href="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                           class="swal2-confirm btn btn-success swal2-styled download-file">
                            <i class="dripicons-download"></i>
                        </a>
                        <input value="263"
                               data-url="<?= Yii::$app->assetManager->publish('@backendWeb/uploads/patient/logo.png')[1] ?>"
                               type="checkbox"
                               class="form-control patient-file-checkbox">
                    </div>
                </output>
            </article>
        </div>
    </div>
</form>
