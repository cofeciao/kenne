
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
        <?php if (isset($data)){?>
                <?php foreach ($data as $key =>$item){ ?>
        <div class="slide-item bg-1 animation-style-01" style="background-image: url('<?= \yii\helpers\Url::to('/uploads/kenne/1920x950/'.$item->sld_image)?>')">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span><?= $item->sld_title ?></span>
                    <h2><?= $item->nameCategory['cat_name'] ?><br> Đang thịnh hành</h2>
                    <p class="short-desc"><?= $item->sld_description ?></p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?= \yii\helpers\Url::toRoute(['/shop','slug'=>$item->nameCategory['cat_slug']])?>">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="slide-item bg-2 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Exclusive Offer -10% Off This Week</span>
                    <h2>Stylist <br> Female Clothes</h2>
                    <p class="short-desc-2">Made from Soft, Durable, US-grown Supima cotton.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?/*= \yii\helpers\Url::toRoute('/shop')*/?>">shop now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-item bg-3 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Exclusive Offer -10% Off This Week</span>
                    <h2>Stylist  Female Clothes</h2>
                    <p class="short-desc-2">Made from Soft, Durable, US-grown Supima cotton.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?/*= \yii\helpers\Url::toRoute('/shop')*/?>">shop now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-item bg-4 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Exclusive Offer -10% Off This Week</span>
                    <h2>Stylist <br> Female Clothes</h2>
                    <p class="short-desc-2">Made from Soft, Durable, US-grown Supima cotton.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?/*= \yii\helpers\Url::toRoute('/shop')*/?>">shop now</a>
                    </div>
                </div>
            </div>
        </div>-->
        <?php }} ?>

    </div>
</div>