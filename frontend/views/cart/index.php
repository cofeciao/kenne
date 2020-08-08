<?php
$this->title = "Giỏ hàng";
?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
</div>

<?/*= \frontend\widgets\AlertWidget::widget()*/?>

<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Uren's Cart Area -->
<?php
if (empty($data)){ ?>
    <div class="alert alert-danger text-center" style="margin: 5% 0">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p style="font-size: larger;margin-top: 1%"><b>Thông báo:</b> Giỏ hàng của bạn đang trống.<br> Vui lòng quay về
                <a href="<?= \yii\helpers\Url::home()?>" style="color: #0b2e13;font-weight: bold">SHOP</a>  để chọn sản phẩm.</p>
        </div>
    </div>
<?php }else{?>
<div class="kenne-cart-area">
    <div class="container">
        <div class="text-right cart-div" s>
            <a class="delete-cart"  href="<?= '/cart/delete-all' ?>">
                Xóa tất cả
            </a>
        </div>
        <div class="row">
            <div class="col-12">

                <form action="<?= '/cart/update-quantity'?>" method="post">
                    <?= \yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken());?>
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="kenne-product-remove">Xóa</th>
                                <th class="kenne-product-thumbnail">Hình ảnh</th>
                                <th class="cart-product-name">Tên sản phẩm</th>
                                <th class="kenne-product-price">Đơn giá</th>
                                <th class="kenne-product-quantity">Số lượng</th>
                                <th class="kenne-product-subtotal">Tổng tiền</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php foreach ($data as $key => $item){?>
                                
                            <tr>

                                <td class="kenne-product-remove"><a href="<?= '/cart/delete?id='.$key ?>"><i class="fa fa-trash"
                                                                                                 title="Remove"></i></a></td>
                                <td class="kenne-product-thumbnail"><a href="javascript:void(0)"><img width="100px" height="100px" src="<?= $item['image']?>" alt="<?= $item['slug']?>"></a></td>
                                <td class="kenne-product-name"><a href="javascript:void(0)"><?= $item['name']?></a></td>
                                <td class="kenne-product-price"><span class="amount"><?= number_format($item['price'],0,',','.') ?> đ</span></td>
                                <td class="quantity">
                                    <label>Còn lại:&nbsp;</label><b><span class="remain-quantity-<?= $key?>"><?= $item['pro_quantity']?></span></b> sp
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="<?= $item['sl'] ?>" type="text" data-name="<?= $key?>" name="<?=$key?>[sl]">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                    <?php  if (Yii::$app->session->hasFlash('success'.$key)){
                                        ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= Yii::$app->session->getFlash('success'.$key) ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </div>
                                    <?php  } elseif (Yii::$app->session->hasFlash('error'.$key)){ ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= Yii::$app->session->getFlash('error'.$key) ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </div>
                                    <?php }?>
                                </td>
                                <td class="product-subtotal"><span class="amount"><?= number_format($item['price']*$item['sl'],0,',','.') ?> đ</span></td>

                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" value="" placeholder="Coupon code" type="text">
                                    <input class="button" value="Mã khuyến mãi" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button"  value="Cập nhật giỏ hàng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng tiền giỏ hàng</h2>
                                <ul>
                                    <li>Tổng tiền <span><?= isset($total) ? number_format($total,0,',','.'): 0?> đ</span></li>
                                    <li>Thành tiền <span><?= isset($total) ? number_format($total,0,',','.'): 0?> đ</span></li>
                                </ul>
                                <a href="<?= \yii\helpers\Url::toRoute('/checkout')?>" onclick="">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Cart Area End Here -->
<?php }?>

