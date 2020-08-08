
<div class="banner-area banner-area-2">
    <div class="container">
        <div class="row">
            <?php if (isset($data)){
                foreach ($data as $item){?>
               
            <div class="col-md-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img class="img-full" src="<?= \yii\helpers\Url::to('/uploads/kenne/570x810/'.$item->sld_image)?>" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <?php  }}  ?>
        </div>
    </div>
</div>
