<?php
?>
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
                        <?php if (isset($logo)){?>
                        <?php foreach ($logo as $item) : ?>
                        <div class="brand-item">
                            <a href="<?php echo $item->link_logo ?>">
                                <img src="<?=  \yii\helpers\Url::to('/backend/uploads/'.$item->logo) ?>" alt="Brand Images">
                            </a>
                        </div>
                        <?php endforeach;} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Area End Here -->
