<div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
        <div class="minicart-content">
            <div class="minicart-heading">
                <h4>Giỏ hàng</h4>
            </div>
            <ul class="minicart-list">
                <?php if (isset($data)){
                    foreach ($data as $key => $item){
                    ?>
                <li class="minicart-product">
                    <a class="product-item_remove" href="<?= \yii\helpers\Url::toRoute(['/cart/delete','id'=>$key ])?>"><i
                            class="ion-android-close"></i></a>
                    <div class="product-item_img">
                        <img src="<?= $item['image']?>" alt="<?= $item['slug']?>">
                    </div>
                    <div class="product-item_content">
                        <a class="product-item_title" href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item['slug']])?>"><?= $item['name']?></a>
                        <span class="product-item_quantity">
                            <?= $item['sl']?> x <?= number_format($item['price'],0,',','.')?> đ
                        </span>
                    </div>
                </li>
                <?php }}?>
            </ul>
        </div>
        <div class="minicart-item_total">
            <span>Tổng tiền</span>
            <span class="ammount"><?= number_format($total,0,',','.') ?> đ</span>
        </div>
        <div class="minicart-btn_area">
            <a href="<?= '/cart'?>" class="kenne-btn kenne-btn_fullwidth">Giỏ hàng</a>
        </div>
        <div class="minicart-btn_area">
            <a href="checkout.html" class="kenne-btn kenne-btn_fullwidth">Thanh toán</a>
        </div>
    </div>
</div>