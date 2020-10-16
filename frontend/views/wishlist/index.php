<?php
    $this->title = "Danh sách yêu thích";
?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>>">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>

<!-- Kenne's Breadcrumb Area End Here -->
<!--Begin Kenne's Wishlist Area -->
<?php
if (empty($cookieWishlist)){ ?>
    <div class="alert alert-danger text-center" style="margin: 5% 0">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p style="font-size: larger;margin-top: 1%"><b>Thông báo:</b> Danh sách yêu thích của bạn đang trống.<br> Vui lòng quay về
                <a href="<?= \yii\helpers\Url::home()?>" style="color: #0b2e13;font-weight: bold">TRANG CHỦ</a>  để chọn sản phẩm.</p>
        </div>
    </div>
<?php }else{?>
<div class="kenne-wishlist_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-left cart-div" s>
                    <a class="delete-cart"  href="<?= \yii\helpers\Url::toRoute('/wishlist/delete-all') ?>">
                        Xóa tất cả
                    </a>
                </div>
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="kenne-product_remove">Xóa</th>
                                <th class="kenne-product-thumbnail">Hình ảnh</th>
                                <th class="cart-product-name">Tên sản phẩm</th>
                                <th class="kenne-product-price">Đơn giá</th>
                                <th class="kenne-cart_btn"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cookieWishlist as $key => $item){?>

                                <tr>

                                    <td class="kenne-product-remove"><a href="<?= \yii\helpers\Url::toRoute(['/wishlist/delete','id'=>$key]) ?>"><i class="fa fa-trash"
                                                                                                                 title="Remove"></i></a></td>
                                    <td class="kenne-product-thumbnail"><a href="javascript:void(0)"><img width="100px" height="100px" src="<?= $item['image']?>" alt="<?= $item['slug']?>"></a></td>
                                    <td class="kenne-product-name"><a href="javascript:void(0)"><?= $item['name']?></a></td>
                                    <td class="kenne-product-price"><span class="amount"><?= number_format($item['price'],0,',','.') ?> đ</span></td>
                                    <td class="kenne-cart_btn"><a href="<?= \yii\helpers\Url::toRoute(['/cart/add-cart','slug'=>$item['slug']])?>">add to cart</a></td>

                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Wishlist Area End Here -->
<?php } ?>