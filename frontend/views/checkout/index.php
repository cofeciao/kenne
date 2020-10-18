<?php
$this->title = "Thanh toán";
?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home() ?>>">Home</a></li>
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's Checkout Area -->
<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="coupon-accordion">
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                sit amet ipsum luctus.</p>
                            <form action="javascript:void(0)">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row">
                                    <input value="Login" type="submit">
                                    <label>
                                        <input type="checkbox">
                                        Remember me
                                    </label>
                                </p>
                                <p class="lost-password"><a href="javascript:void(0)">Lost your password?</a></p>
                            </form>
                        </div>
                    </div>
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="javascript:void(0)">
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text">
                                    <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="<?= \yii\helpers\Url::toRoute('/checkout/add-order') ?>" method="post">
                    <div class="checkbox-form">
                        <h3>Chi tiết đơn hàng</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và tên<span class="required">*</span></label>
                                    <input placeholder="" type="text" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input placeholder="Tên số nhà, đường" type="text" name="address" required>
                                </div>
                            </div>
                            <input type="number" hidden value="<?= $total?>" name="total">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city">Tỉnh/Thành phố <span class="required">*</span></label>
                                    <select class="form-control" id="city" name="city" required>
                                        <option>-- Chọn thành phố ---</option>
                                        <?php if (isset($provinceNames)){?>
                                        <?php foreach ($provinceNames as $provinceName){?>
                                        <option value="<?= $provinceName->id?>"><?= $provinceName->name?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label for="district">Quận/Huyện <span class="required">*</span></label>
                                    <select class="form-control" id="district" name="district" required>
                                        <option>-- Chọn quận huyện ---</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ Email <span class="required">*</span></label>
                                    <input placeholder="" type="email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" required name="phone">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="order-button-payment">
                        <input value="Đặt hàng" type="submit">
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <?php if (isset($data)){
                if (empty($data)){
                    ?>
                    <tr class="cart_item">
                        <h4>Không có sản phẩm</h4>
                        <h3>Vui lòng quay lại <a href="<?= \yii\helpers\Url::home() ?>"
                                                 style="color: #0d3349"><b>SHOP</b></a> để mua hàng</h3>
                    </tr>
                <?php } else { ?>
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-product-image">Hình ảnh</th>
                                <th class="cart-product-name">Sản phẩm</th>
                                <th class="cart-product-total">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data as $item) {
                                ?>
                                <tr class="cart_item">
                                    <td class="cart-product-image">
                                        <img src="<?= $item['image'] ?>" alt="<?= $item['slug'] ?>" width="50px"
                                             height="50px">
                                    </td>
                                    <td class="cart-product-name"><?= $item['name'] ?><strong
                                                class="product-quantity">
                                            × <?= $item['sl'] ?></strong></td>
                                    <td class="cart-product-total">
                                    <span class="amount">
                                        <?= number_format($item['price'], 0, ',', '.') ?> đ
                                    </span>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <?php if (isset($total)) { ?>
                                <tr class="cart-subtotal">
                                    <th>Tổng tiền đơn hàng</th>
                                    <td></td>
                                    <td><span class="amount">
                                        <?= number_format($total, 0, ',', '.') ?> đ
                                    </span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Thành tiền</th>
                                    <td></td>
                                    <td><strong><span class="amount">
                                    <?= number_format($total, 0, ',', '.') ?> đ
                                        </span></strong></td>
                                </tr>
                            <?php } ?>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title">
                                            <a href="javascript:void(0)" class="" data-toggle="collapse"
                                               data-target="#collapseOne" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                Cách thức thanh toán
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Vui lòng chờ shipper giao hàng đến địa chỉ bạn cung cấp. Sản phẩm sẽ được
                                                chuyển đến chậm nhất là một tuần.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title">
                                            <a href="javascript:void(0)" class="collapsed" data-toggle="collapse"
                                               data-target="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                Chính sách hoàn trả hàng
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Khi nhận hàng vui lòng kiểm tra sản phẩm. Tùy từng mặt hàng mà được hoàn
                                                trả và bảo hành.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Checkout Area End Here -->
<?php $script = <<<JS
    $("#city").change(function () {
        var template1 = "";
        var id = $(this).val();
        $.get('/checkout/get-district',{
          id : id  ,
        },function(data) {
          var data = JSON.parse(data);
          var i;
          for (i = 0; i < data.length; i++) {
              template1 += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
          }
          document.getElementById("district").innerHTML = template1;
        });
    });
JS;
$this->registerJs($script);
?>