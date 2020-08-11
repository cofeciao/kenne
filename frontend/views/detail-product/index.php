<?php
use kartik\social\FacebookPlugin;

    $this->title = "Chi tiết sản phẩm";

?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Single Product Type</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Single Product Area -->
<?php if(isset($data)){?>
<div class="sp-area">
    <div class="container">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider kenne-element-carousel" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                            <div class="single-slide red zoom">
                                <img src="<?=  $data['pro_image']?>" alt="<?= $data['pro_slug'];?>" id="image_slug">
                            </div>
                            <!--Ảnh zoom lớn-->
                            <!--<div class="single-slide orange zoom">
                                <img src="/images/product/1-2.jpg" alt="Kenne's Product Image">
                            </div>
                            <div class="single-slide brown zoom">
                                <img src="/images/product/2-1.jpg" alt="Kenne's Product Image">
                            </div>
                            <div class="single-slide umber zoom">
                                <img src="/images/product/2-2.jpg" alt="Kenne's Product Image">
                            </div>
                            <div class="single-slide black zoom">
                                <img src="/images/product/3-1.jpg" alt="Kenne's Product Image">
                            </div>
                            <div class="single-slide green zoom">
                                <img src="/images/product/3-2.jpg" alt="Kenne's Product Image">
                            </div>-->
                        </div>
                        <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3" data-slick-options='{
                                "slidesToShow": 3,
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>
                            <div class="single-slide red">
                                <img src="<?=  $data['pro_image']?>" alt="<?= $data['pro_slug'];?>">
                            </div>
                            <!--Ảnh nhỏ-->
                            <!--<div class="single-slide orange">
                                <img src="/images/product/1-2.jpg" alt="Kenne's Product Thumnail">
                            </div>
                            <div class="single-slide brown">
                                <img src="/images/product/2-1.jpg" alt="Kenne's Product Thumnail">
                            </div>
                            <div class="single-slide umber">
                                <img src="/images/product/2-2.jpg" alt="Kenne's Product Thumnail">
                            </div>
                            <div class="single-slide red">
                                <img src="/images/product/3-1.jpg" alt="Kenne's Product Thumnail">
                            </div>
                            <div class="single-slide orange">
                                <img src="/images/product/3-2.jpg" alt="Kenne's Product Thumnail">
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#"><?= $data['pro_name'];?></a></h5>
                        </div>
                        <div class="rating-box">
                            <ul>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                            </ul>
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <?php if($data['pro_quantity'] != 0) {?>
                                <li>Còn <?= $data['pro_quantity'] ?> sản phẩm</li>
                                <?php }else{?>
                                <li>Hết hàng</li>
                                <?php } ?>

                                <!--show price sale or not?-->
                                <?php if($data['pro_sale'] !=0 ){?>
                                <li>Giá: <a href="javascript:void(0)">
                                        <span><?= number_format($data['pro_price']*(100-$data['pro_sale'])/100,0,',','.') ?> đ</span>
                                        <span style="text-decoration: line-through"><?= number_format($data['pro_price'],0,',','.')?> đ</span></a>
                                </li>
                                <?php } else {?>
                                    <li>Giá: <a href="javascript:void(0)">
                                            <span><?= number_format($data['pro_price'],0,',','.')?> đ</span></a>
                                    </li>
                                <?php } ?>
                                <!--End show price-->
                            </ul>
                        </div>
                        <!--<div class="product-size_box">
                            <span>Size</span>
                            <select class="myniceselect nice-select">
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                            </select>
                        </div>-->
                        <div class="quantity">
                            <label>Số lượng</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text" name="pro_quantity" id="pro_quantity">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                             <?php  if (Yii::$app->session->hasFlash('error')){
                                        ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= Yii::$app->session->getFlash('error') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </div>
                                    <?php  }?>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <!--<li><a class="qty-cart_btn" href="<?/*= \yii\helpers\Url::toRoute(['/cart/add-cart','slug'=>$data['pro_slug']])*/?>">Add To Cart</a></li>-->
                                <li><a class="qty-cart_btn"  id="chooseQuantity" ">Add To Cart</a></li>
                                <li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Single Product Area End Here -->

<!-- Begin Product Tab Area Two -->
<div class="product-tab_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#specification"><span>Đặc tả</span></a></li>
                            <li><a data-toggle="tab" href="#reviews"><span>Đánh giá (1)</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <ul>
                                    <li>
                                        <span class="title"><?= $data['pro_name'];?></span>
                                        <span><?= $data['pro_description'];?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php if (isset($data->pro_specification)){?>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            <table class="table table-bordered specification-inner_stuff">
                                <tbody>
                                <tr>
                                    <td colspan="2"><strong>Memory</strong></td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td>test 1</td>
                                    <td>8gb</td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td colspan="2"><strong>Processor</strong></td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td>No. of Cores</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            Không có đặc tả
                        </div>
                        <?php }?>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="tab-pane active" id="tab-review">
                                <form class="form-horizontal" id="form-review">
                                    <?php echo FacebookPlugin::widget(); ?>
                                    <h2>Write a review</h2>
                                    <div class="form-group required">
                                        <div class="col-sm-12 p-0">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input class="review-input" type="email" name="con_email" id="con_email" required>
                                        </div>
                                    </div>
                                    <div class="form-group required second-child"xx>
                                        <div class="col-sm-12 p-0">
                                            <label class="control-label">Share your opinion</label>
                                            <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                            <div class="help-block"><span class="text-danger">Note:</span> HTML is
                                                not
                                                translated!</div>
                                        </div>
                                    </div>
                                    <div class="form-group last-child required">
                                        <div class="col-sm-12 p-0">
                                            <div class="your-opinion">
                                                <label>Your Rating</label>
                                                <span>
                                                        <select class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="kenne-btn-ps_right">
                                            <button class="kenne-btn">Continue</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Tab Area Two End Here -->

<?php } else {
    echo  "<h3>Không tìm thấy sản phẩm bạn yêu cầu. Vui lòng quay lại trang chủ</h3>";
} ?>
<!-- Begin Product Area -->
<div class="product-area pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Sản phẩm bán chạy</h3>
                    <div class="product-arrow"></div>
                </div>
            </div>
            <?php if (isset($dataBestSeller)) {?>
            <div class="col-lg-12">
                <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".product-arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":575, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>
                    <?php  foreach ($dataBestSeller as $item){?>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?= \yii\helpers\Url::toRoute(['detail-product','slug'=>$item->pro_slug])?>">
                                    <img class="primary-img" src="<?= \yii\helpers\Url::to($item->pro_image)?>" alt="Kenne's Product Image">
                                    <img class="secondary-img" src="/images/product/1-2.jpg" alt="Kenne's Product Image">
                                </a>
                                <span class="sticker">Best Seller</span>
                                <div class="add-actions">
                                    <ul>
                                        <!--<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>-->
                                        <li><a href="<?= \yii\helpers\Url::toRoute(['/wishlist/add-to-wishlist','slug'=>$item->pro_slug])?>" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <!--<li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>-->
                                        <li><a href="<?= \yii\helpers\Url::toRoute(['/wishlist/add-to-cart','slug'=>$item->pro_slug])?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="<?= \yii\helpers\Url::toRoute(['detail-product','slug'=>$item->pro_slug])?>"><?= $item->pro_name?></a></h3>
                                    <div class="price-box">
                                        <span class="new-price"><?= number_format($item->pro_price*(100-$item->pro_sale)/100,0,',','.')?> đ</span>
                                        <span class="old-price"><?= number_format($item->pro_price,0,',','.')?> đ</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    <?php } ?>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<?php

$script = <<<JS
$('#chooseQuantity').on('click',function() {
    var slug = $('#image_slug').attr('alt');
    var qtt = $('#pro_quantity').val();
    location.replace('/cart/add-cart?slug='+slug+'&qtt='+qtt);
});

JS;
$this->registerJs($script,\yii\web\View::POS_END)
?>