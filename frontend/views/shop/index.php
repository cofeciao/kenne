<?php
use yii\widgets\LinkPager;
$this->title = "Shop";
//echo "<pre>";
//print_r($pagination);
//echo "</pre>";
//die;
?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>SHOP</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Shop</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<?php if (isset($data)){?>
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
                        <p>Hiển thị <?= isset($data) ? $data->pagination->totalCount : "0"?>  kết quả  / <?= isset($data) ? $data->pagination->pageSize : "0"?></p>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Short By:</label>
                                <select class="nice-select myniceselect" name ="sort" id="sort">
                                <option value="1">Default sorting</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap grid gridview-3 row">
                    <?php if (!empty($data->getModels())){?>
                    <?php foreach ($data->getModels() as $item){?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                        <img class="primary-img" src="<?= $item->pro_image?>" alt="<?= $item->pro_slug?>">
                                        <img class="secondary-img" src="<?= $item->pro_image?>" alt="<?= $item->pro_slug?>">
                                    </a>
                                    <?php if ($item->pro_sale != 0){?>
                                    <span class="sticker"><?= $item->pro_sale?>%</span>
                                    <?php } else {?>
                                        <span class="sticker-2">New</span>
                                    <?php }?>
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
                                            <li><a href="<?= \yii\helpers\Url::toRoute(['/cart/add-cart','slug'=>$item->pro_slug])?>" data-toggle="tooltip" data-placement="right" title="Add To cart" onclick="addCart(<?= $item->id?>)"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name">
                                            <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                                <?= $item->pro_name?>
                                            </a>
                                        </h3>
                                        <div class="price-box">
                                            <span class="new-price"><?=number_format($item->pro_price*(100-$item->pro_sale)/100,0,',','.')?> đ</span>
                                            <span class="old-price"><?=number_format($item->pro_price,0,',','.')?> đ</span>
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
                                        <img src="<?= $item->pro_image?>" alt="<?= $item->pro_slug?>">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price"><?=number_format($item->pro_price*(100-$item->pro_sale)/100,0,',','.')?> đ</span>
                                            <span class="old-price"><?=number_format($item->pro_price,0,',','.')?> đ</span>
                                        </div>
                                        <h6 class="product-name"><a href="<?= \yii\helpers\Url::toRoute(['/detail-product'])?>"><?= $item->pro_name?></a></h6>
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
                                            <p><?= html_entity_decode($item->pro_description)?>
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
                                            <li><a href="<?= \yii\helpers\Url::toRoute(['/cart'])?>>" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} else {?>
                        <div style="text-align: center">
                            <h6>Không tìm thấy sản phẩm nào!</h6>
                        </div>
                    <?php }?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                <?php
                echo LinkPager::widget([
                    'pagination'=>$data->pagination,
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
                    'options' => [
                        'class' => 'kenne-pagination-box primary-color',
                    ],
                ]);



                /*if (isset($pagination)){
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,
                        'options' => [
                            'class' => 'kenne-pagination-box primary-color',
                        ],
                    ]);
                }*/
                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
        </div>
    </div>
</div>

<!-- Kenne's Content Wrapper Area End Here -->
<?php } ?>


