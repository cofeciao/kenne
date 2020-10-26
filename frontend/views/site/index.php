<?php

namespace frontend\controllers;
use frontend\widgets\SliderWidget;
use yii\helpers\Url;

$this->title = 'Kenne Shopping';
?>

<?= SliderWidget::widget(); ?>
<!-- Begin Slider Area -->
<div class="slider-area">

    <div class="kenne-element-carousel home-slider arrow-style" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "autoplay" : true,
                "fade" : true,
                "autoplaySpeed" : 7000,
                "pauseOnHover" : false,
                "pauseOnFocus" : false
                }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>
        <div class="slide-item bg-1 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Exclusive Offer -20% Off This Week</span>
                    <h2>Accessories <br> Explore Trending</h2>
                    <p class="short-desc">Aliquam error eos cumque aut repellat quasi accusantium inventore necessitatibus. Vel quisquam distinctio in inventore dolorum.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="shop-left-sidebar.html">shop now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item bg-2 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Exclusive Offer -10% Off This Week</span>
                    <h2>Stylist <br> Female Clothes</h2>
                    <p class="short-desc-2">Made from Soft, Durable, US-grown Supima cotton.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="shop-left-sidebar.html">shop now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Service Area -->
<div class="service-area">
    <div class="container">
        <div class="service-nav">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h4>Free Shipping</h4>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h4>Money Return</h4>
                            <p>30 days for free return</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h4>Online Support</h4>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="images/banner/1-1.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="images/banner/1-2.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="images/banner/1-3.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Begin Product Area -->
<div class="product-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>New Product</h3>
                    <div class="product-arrow"></div>
                </div>
            </div>
            <?php if (isset($proNew)) : ?>
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
                    <?php foreach ($proNew as $item) : ?>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?php echo Url::toRoute(['/detail-product/','slug' => $item->pro_slug]) ?>">
                                    <img class="primary-img" src="<?php echo $item->pro_image ?>" alt="<?php echo $item->pro_slug ?>">
                                    <img class="secondary-img" src="<?php echo $item->pro_image ?>" alt="<?php echo $item->pro_slug ?>">
                                </a>
                                <span class="sticker-2">Hot</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a class="add-wishlist" data-name="<?= $item->pro_name?>" href="<?php echo Url::toRoute(['/wishlist/add-to-wishlist','slug' => $item->pro_slug]) ?>" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="<?php echo Url::toRoute(['/cart/add-cart','slug' => $item->pro_slug]);?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Quibusdam ratione</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$46.91</span>
                                        <span class="old-price">$50.99</span>
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
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<!-- Begin Banner Area Two -->
<div class="banner-area banner-area-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img class="img-full" src="images/banner/1-4.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img class="img-full" src="images/banner/1-5.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area Two End Here -->

<!-- Begin Product Tab Area -->
<div class="product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Best Seller</h3>
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#bag"><span>Bag</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#plaid-shirts"><span>Plaid Shirts</span></a></li>
                            <li><a data-toggle="tab" href="#shoes"><span>Shoes</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (isset($dataBestSeller)) : ?>
            <div class="col-lg-12">
                <div class="tab-content kenne-tab_content">
                    <div id="bag" class="tab-pane active show" role="tabpanel">
                        <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
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
                            <?php foreach ($dataBestSeller as $item) : ?>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?php echo Url::toRoute(['/detail-product/','slug' => $item->pro_slug]) ?>">
                                            <img class="primary-img" src="<?php echo $item->pro_image ?>" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="<?php echo $item->pro_image ?>" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Best Seller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="<?php echo Url::toRoute(['/cart','slug' => $item->pro_slug]) ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Voluptates
                                                    laudantium</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$95.00</span>
                                                <span class="old-price">$100.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div id="plaid-shirts" class="tab-pane" role="tabpanel">
                        <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/7-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/7-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Excepturi
                                                    perspiciatis</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$60.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/8-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/8-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Esse eveniet</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$70.00</span>
                                                <span class="old-price">$75.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/6-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/6-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Eligendi
                                                    voluptate</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$60.00</span>
                                                <span class="old-price">$65.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/2-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/2-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Nulla
                                                    laboriosam</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$80.00</span>
                                                <span class="old-price">$85,00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/3-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/3-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Adipisci
                                                    voluptas</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$75.91</span>
                                                <span class="old-price">$80.99</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/5-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/5-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Voluptates
                                                    laudantium</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$95.00</span>
                                                <span class="old-price">$100.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="shoes" class="tab-pane" role="tabpanel">
                        <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/2-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/2-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Nulla
                                                    laboriosam</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$80.00</span>
                                                <span class="old-price">$85,00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/3-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/3-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Adipisci
                                                    voluptas</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$75.91</span>
                                                <span class="old-price">$80.99</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/8-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/8-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Esse eveniet</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$70.00</span>
                                                <span class="old-price">$75.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/1-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/1-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                    ratione</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$46.91</span>
                                                <span class="old-price">$50.99</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/2-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/2-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Nulla
                                                    laboriosam</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$80.00</span>
                                                <span class="old-price">$85,00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="images/product/6-1.jpg" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="images/product/6-2.jpg" alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Bestseller</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="single-product.html">Eligendi
                                                    voluptate</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$60.00</span>
                                                <span class="old-price">$65.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Tab Area End Here -->

<!-- Begin Latest Blog Area -->
<div class="latest-blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Latest <span>Blog</span></h3>
                    <div class="latest-blog_arrow"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel latest-blog_slider slider-nav" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".latest-blog_arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>

                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="images/blog/1.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="javascript:void(0)">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="images/blog/2.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="javascript:void(0)">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="images/blog/3.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="javascript:void(0)">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="images/blog/1.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="javascript:void(0)">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest Blog Area End Here -->

<!-- Begin Kenne's Banner Area Four -->
<div class="kenne-banner_area kenne-banner_area-4">
    <div class="banner-img"></div>
    <div class="banner-content">
        <h3>Get exclusive Products.</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
        <div class="contact-us">
            <a href="callto://+123123321345">(+123) 123 321 345</a>
        </div>
        <div class="kenne-btn-ps_center">
            <a class="kenne-btn transparent-btn" href="shop-left-sidebar.html">Shop Now</a>
        </div>
    </div>
</div>
<!-- Kenne's Banner Area Four End Here -->

<!-- Begin Kenne's Instagram Area -->
<div class="kenne-instagram_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="kenne-section_area">
                    <h3>Instagram Feed</h3>
                    <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel instagram-slider arrow-style arrow-style-3" data-slick-options='{
                    "slidesToShow": 5,
                    "slidesToScroll": 1,
                    "infinite": false,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30
                    }' data-slick-responsive='[
                    {"breakpoint":1200, "settings": {
                    "slidesToShow": 5
                    }},
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 4
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":576, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":480, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>

                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/1.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/2.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/3.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/4.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/5.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/6.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/7.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/1.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/2.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>
                    <div class="single-item img-hover_effect">
                        <div class="instagram-img">
                            <a href="javascript:void(0)">
                                <img src="images/instagram/3.jpg" alt="Kenne's Instagram Image">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Instagram Area End Here -->

<!-- Scroll To Top Start -->
<a class="scroll-to-top" href=""><i class="ion-chevron-up"></i></a>
<!-- Scroll To Top End -->

