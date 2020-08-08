<?php ?>
<!-- Begin Kenne's Footer Area -->
<div class="kenne-footer_area bg-smoke_color">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter-area">
                        <div class="newsletter-logo">
                            <a href="javascript:void(0)">
                                <img src="/images/footer/logo/1.png" alt="Logo">
                            </a>
                        </div>
                        <p class="short-desc">Nhận thông tin khuyến mãi mới nhất, để lại email của bạn</p>
                        <div class="newsletter-form_wrap">
                            <form action="<?= \yii\helpers\Url::toRoute('/news-letter/subcribe')?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form">
                                        <?= \yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam,Yii::$app->request->csrfToken)?>
                                        <input required id="mc-email" class="newsletter-input" type="email" name="emailSubcribe" autocomplete="off" placeholder="Enter email address" />
                                        <button class="newsletter-btn" id="mc-submit"><i
                                                class="ion-android-mail" type="submit"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="row footer-widgets_wrap">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Shopping</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="<?= \yii\helpers\Url::toRoute('/shop')?>">Product</a></li>
                                    <li><a href="<?= \yii\helpers\Url::toRoute('/cart')?>">My Cart</a></li>
                                    <li><a href="<?= \yii\helpers\Url::toRoute('/wishlist')?>">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Account</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="<?= \yii\helpers\Url::toRoute('/sign')?>">Login</a></li>
                                    <li><a href="<?= \yii\helpers\Url::toRoute('/sign')?>">Register</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Loại sản phẩm</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <?php if(isset($data)) {?>
                                        <?php foreach ($data as $item){?>
                                            <li><a href="<?=\yii\helpers\Url::toRoute(['/shop/','slug'=> $item['cat_slug']])?>"> <?= $item['cat_name']?></a></li>
                                        <?php }} ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        <span>Copyright &copy; 2019 <a href="javascript:void(0)">Kenne.</a> All rights reserved.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment">
                        <img src="/images/footer/payment/1.png" alt="Kenne's Payment Method">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Footer Area End Here -->
