<?php
$this->title = "Shop";
?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Grid View</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Fullwidth</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Content Wrapper Area -->
<div class="kenne-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="product-page_count">
                        <p>Showing 1–9 of 40 results)</p>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Short By:</label>
                            <select class="nice-select myniceselect">
                                <option value="1">Default sorting</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                                <option value="5">Rating (Highest)</option>
                                <option value="5">Rating (Lowest)</option>
                                <option value="5">Model (A - Z)</option>
                                <option value="5">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap grid gridview-3 row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/1-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/1-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/1-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/2-2.jpg" alt="Kenne's Product Image">
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
                                        <h3 class="product-name"><a href="single-product.html">Expedita excepturi</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$50.91</span>
                                            <span class="old-price">$55.99</span>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/2-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$50.91</span>
                                            <span class="old-price">$55.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Expedita excepturi</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/3-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/3-2.jpg" alt="Kenne's Product Image">
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/3-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/4-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/4-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
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
                                        <h3 class="product-name"><a href="single-product.html">Recusandae fugit</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$60.00</span>
                                            <span class="old-price">$65.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/4-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$60.00</span>
                                            <span class="old-price">$65.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Recusandae fugit</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/5-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/5-2.jpg" alt="Kenne's Product Image">
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
                                        <h3 class="product-name"><a href="single-product.html">Facere molestias</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$80.00</span>
                                            <span class="old-price">$85.00</span>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/5-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$80.00</span>
                                            <span class="old-price">$85.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Facere molestias</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/6-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/6-2.jpg" alt="Kenne's Product Image">
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
                                        <h3 class="product-name"><a href="single-product.html">Rem voluptate</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$90.00</span>
                                            <span class="old-price">$95.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/6-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$90.00</span>
                                            <span class="old-price">$95.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Rem voluptate</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/7-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/7-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
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
                                        <h3 class="product-name"><a href="single-product.html">Cumque nulla</a></h3>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/7-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/8-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/8-2.jpg" alt="Kenne's Product Image">
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
                                        <div class="price-box">
                                            <span class="new-price">$45.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h3 class="product-name"><a href="single-product.html">Aliquid vitae</a></h3>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/8-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$45.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Aliquid vitae</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="/images/product/5-2.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="/images/product/5-1.jpg" alt="Kenne's Product Image">
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
                                        <div class="price-box">
                                            <span class="new-price">$75.91</span>
                                            <span class="old-price">$80.99</span>
                                        </div>
                                        <h3 class="product-name"><a href="single-product.html">Assumenda delectus</a></h3>
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
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="/images/product/5-1.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$75.91</span>
                                            <span class="old-price">$80.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Assumenda delectus</a></h6>
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
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="kenne-pagination-box primary-color">
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)">5</a></li>
                                        <li><a class="Next" href="javascript:void(0)">Next</a></li>
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
<!-- Kenne's Content Wrapper Area End Here -->

<!-- Begin Brand Area -->
<div class="brand-area ">
    <div class="container">
        <div class="brand-nav border-top ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kenne-element-carousel brand-slider slider-nav" data-slick-options='{
                                "slidesToShow": 6,
                                "slidesToScroll": 1,
                                "infinite": false,
                                "arrows": false,
                                "dots": false,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 4
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 2
                                }}
                            ]'>

                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/2.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/3.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/4.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/5.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/6.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="/images/brand/2.png" alt="Brand Images">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Area End Here -->
