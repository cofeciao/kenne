<div class="banner-area">
    <div class="container">
        <div class="row">
            <?php if (isset($data)) {
                foreach ($data as $item){ ?>
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="<?= \yii\helpers\Url::to('/uploads/kenne/370x250/'.$item['sld_image'])?>" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <?php } }?>
        </div>
    </div>
</div>