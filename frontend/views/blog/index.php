<?php
use yii\widgets\LinkPager;
$this->title = "Blogs";
?>


<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Grid View</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home() ?>">Home</a></li>
                <li class="active">Left Sidebar</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Blog Grid View Area -->
<div class="grid-view_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="kenne-blog-sidebar-wrapper">
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Search</h4>
                        <div class="search-form_area">
                            <form class="search-form" action="<?php \yii\helpers\Url::toRoute(['/blog']) ?>">
                                <input type="text" class="search-field" placeholder="search here" name="search">
                                <button type="submit" class="search-btn"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Archives</h4>
                        <ul class="kenne-blog-archive">
                            <li><a href="javascript:void(0)">October 2019</a></li>
                        </ul>
                    </div>
                    <div class="kenne-blog-sidebar">


<!--//////////////////////////////////////// Recent Post //////////////////////////////////////////////////////////-->
                        <h4 class="kenne-blog-sidebar-title">Recent Posts</h4>
                        <?php if(isset($recentPost)){?>
                        <?php foreach ($recentPost as $item)  : ?>
                        <?php if(isset($item->image)){ ?>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="<?php echo \yii\helpers\Url::toRoute(['/blog/blog-detail','id' => $item['id']]);?>">
                                        <img class="img-full" src="<?php echo '/backend/web/uploads/'.$item->image[0] ?>" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="<?= \yii\helpers\Url::toRoute(['blog-detail','id'=>$item->id])?>"><?=$item['title']?></a></span>
                                <span class="post-date"><?= $item['date'] ?></span>
                            </div>
                        </div>
                        <?php }?>
                        <?php endforeach; }?>
                    </div>
<!--//////////////////////////////////////// End Recent Post ////////////////////////////////////////////////////////-->


<!--/////////////////////////////////////////////////// Tags ////////////////////////////////////////////////////////-->
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Comments</h4>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="/images/blog/admin.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>HasTech say:</span>
                                <a href="javascipt:void(0)">Nulla auctor mi vel nisl...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="/images/blog/user.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>Kathy Young say:</span>
                                <a href="javascipt:void(0)">Mauris Venenatis Orci Quis...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="/images/blog/admin.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>HasTech say:</span>
                                <a href="javascipt:void(0)">Quisque Semper Nunc Vitae...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="/images/blog/user.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>Kathy Young say:</span>
                                <a href="javascipt:void(0)">Thanks for the information, anyway :)</a>
                            </div>
                        </div>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Tags</h4>
                        <ul class="kenne-tags_list">
                            <?php if(isset($tags)){ ?>
                            <?php foreach($tags as $item) : ?>
                                <li>
                                    <a href="javascript:void(0)"><?=$item['tags']?></a>
                                </li>
                            <?php endforeach; }?>
                        </ul>
                    </div>
                </div>
            </div>
<!--/////////////////////////////////////////////// End Tags ////////////////////////////////////////////////////////-->






<!--///////////////////////////////////////////////////////  Gallery ////////////////////////////////////////////////-->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row blog-item_wrap">
                    <?php if(isset($pages)){ ?>
                    <?php foreach ($pages->models as $item) : ?>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <?php if($item->image == null){ ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php echo $item->link; ?>
                                </div>
                            <?php } ?>
                            <?php  if(isset($item->image) && count($item->image) > 1) {
                                echo '<div class="kenne-element-carousel single-blog_slider arrow-style-2 overflow-hidden" data-slick-options=\'{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }\' data-slick-responsive=\'[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]\'>';
                                foreach ($item->image as $value){?>
                                <div class="single-item">
                                    <div class="blog-img">
                                        <a href="<?php echo \yii\helpers\Url::toRoute(['/blog/blog-detail', 'id' => $item['id']]);?>">
                                            <img src="<?php echo '/backend/web/uploads/'.$value?>" alt="Blog Image"/>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                                echo '</div>';
                            } if(isset($item->image) && count($item->image) == 1) { ?>
                                <div class="blog-img">
                                    <a href="<?php echo \yii\helpers\Url::toRoute(['/blog/blog-detail', 'id' => $item['id']]);?>">
                                        <img src="<?php echo '/backend/web/uploads/'.$item->image[0]?>" alt="Blog Image"/>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="<?php echo \yii\helpers\Url::toRoute(['/blog/blog-detail', 'id' => $item['id']]);?>"><?=$item['title'];?></a>
                                </h3>
                                <p class="short-desc">
                                    <?=$item['descriptions']?>
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><?=$item['date'] ?></li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;} ?>
<!--//////////////////////////////////////////////////// End Gallery //////////////////////////////////////////////////////-->



<!-- ////////////////////////////////////////////  Pagination    ////////////////////////////////////////////////////-->
<!--        <div class="row">-->
                    <div class="col-lg-12">
                        <div class="kenne-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php

                                        if (isset($pages)){
                                            echo LinkPager::widget([
                                                'pagination' => $pages->pagination,
                                                'prevPageLabel' => false,
                                                'nextPageLabel' => false,
                                                'options' => [
                                                    'class' => 'kenne-pagination-box primary-color',
                                                ],
                                            ]);
                                        }
                                        else{
                                            echo 'do not';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Blog Grid View Area End Here -->
