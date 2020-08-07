<?php ?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home() ?>">Home</a></li>
                <li class="active">Liên hệ</li>
            </ul>
        </div>
    </div>
</div>
<?= \frontend\widgets\AlertWidget::widget()?>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Contact Main Page Area -->
<div class="contact-main-page">
    <div class="container">
        <div id="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.239432136485!2d106.64759151459762!3d10.792965192310335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175294adf5418db%3A0x8f9890b4bacc89ea!2zMTE0IE7Eg20gQ2jDonUsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1596624568248!5m2!1svi!2s"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Liên hệ chúng tôi</h3>
                    <p class="contact-page-message">Nếu có bất kì thắc mắc vui lòng để lại tin nhắn cho chúng tôi hoặc
                        gọi số điện thoại chúng tôi cung cấp bên dưới. </p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Address</h4>
                        <p>114 Năm Châu, Phường 12, Quận Tân Bình, TPHCM</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Điện thoại</h4>
                        <p>Mobile: (08) 123 456 789</p>
                        <p>Hotline: 1818 678 456</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>thiennhan6677@domain.com</p>
                        <p>bestbtn@bestbtn.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Gửi tin nhắn cho chúng tôi</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="<?= \yii\helpers\Url::toRoute('/contact-us/create') ?>"
                              method="post">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
                                   value="<?= Yii::$app->request->csrfToken; ?>"/>
                            <div class="form-group">
                                <label>Họ tên của bạn<span class="required">*</span></label>
                                <input type="text" name="con_name" id="con_name" required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email<span class="required">*</span></label>
                                <input type="email" name="con_email" id="con_email" required>
                            </div>
                            <div class="form-group">
                                <label>Chủ đề</label>
                                <input type="text" name="con_subject" id="con_subject">
                            </div>
                            <div class="form-group form-group-2">
                                <label>Nội dung lời nhắn</label>
                                <textarea name="con_message" id="con_message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="kenne-contact-form_btn">GỬI
                                </button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Main Page Area End Here -->

