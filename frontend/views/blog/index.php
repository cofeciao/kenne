<?php

?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Grid View</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
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
                            <form class="search-form" action="javascript:void(0)">
                                <input type="text" class="search-field" placeholder="search here">
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


<!--////////////////////////////////////////   Recent Post //////////////////////////////////////////////////////////-->
                        <h4 class="kenne-blog-sidebar-title">Recent Posts</h4>
                        <?php foreach ($RecentPost as $item)  : ?>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="<?='./backend/web/uploads/'.$item['image']?>" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="blog-details.html"><?=$item['title']?></a></span>
                                <span class="post-date"><?= $item['date'] ?></span>

                            </div>
                        </div>
                        <?php endforeach; ?>
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
                            <? foreach ($data as $item): ?>
                                <li>
                                    <a href="javascript:void(0)"><?=$item['tags']?></a>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
<!--/////////////////////////////////////////////// End Tags ////////////////////////////////////////////////////////-->



<!--///////////////////////////////////////////////////////  Gallery ////////////////////////////////////////////////-->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row blog-item_wrap">
                    <?php foreach($data as $item): ?>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="<?='./backend/web/uploads/'.$item['image']?>" alt="Blog Image"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html"><?=$item['title'];?></a>
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
                  <?php endforeach ;?>


<!--                    <div class="col-lg-6">-->
<!--                        <div class="blog-item">-->
<!--                            <div class="kenne-element-carousel single-blog_slider arrow-style-2 overflow-hidden" data-slick-options='{-->
<!--                                    "slidesToShow": 1,-->
<!--                                    "slidesToScroll": 1,-->
<!--                                    "infinite": false,-->
<!--                                    "arrows": true,-->
<!--                                    "dots": false,-->
<!--                                    "spaceBetween": 30-->
<!--                                    }' data-slick-responsive='[-->
<!--                                    {"breakpoint":768, "settings": {-->
<!--                                    "slidesToShow": 1-->
<!--                                    }},-->
<!--                                    {"breakpoint":575, "settings": {-->
<!--                                    "slidesToShow": 1-->
<!--                                    }}-->
<!--                                ]'>-->
<!--                                < ?php //foreach ($data as $item) :?>-->
<!--                                <div class="single-item">-->
<!--                                    <div class="blog-img">-->
<!--                                        <a href="blog-details.html">-->
<!--                                            <img src="< ?//='./backend/web/uploads/'.$item['image']?>" alt="Blog Image">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                < ?php //endforeach;?>
-->
<!--                            </div>-->
<!--                            <div class="blog-content">-->
<!--                                <h3 class="heading">-->
<!--                                    <a href="blog-details.html">Post With Gallery</a>-->
<!--                                </h3>-->
<!--                                <p class="short-desc">-->
<!--                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a-->
<!--                                    line in section 1.10.32.-->
<!--                                </p>-->
<!--                                <div class="blog-meta">-->
<!--                                    <ul>-->
<!--                                        <li>Oct.20.2019</li>-->
<!--                                        <li>-->
<!--                                            <a href="javascript:void(0)">02 Comments</a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--//////////////////////////////////////////////////// End Gallery //////////////////////////////////////////////////////-->



<!--           ////////////////////////////////////////  Phan Trang  Chua Xong    ///////////////////////////////////////////-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="kenne-paginatoin-area">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12">-->
<!--            < ?php-->
<!--//            if (isset($pages)){-->
<!--//                echo \yii\widgets\LinkPager::widget([-->
<!--//                    'pagination' => $pages,-->
<!--//                    'prevPageLabel' => false,-->
<!--//                    'nextPageLabel' => false,-->
<!--//                    'options' => [-->
<!--//                        'class' => 'kenne-pagination-box primary-color',-->
<!--//                    ],-->
<!--//                ]);-->
<!--//            }-->
<!--//            else{-->
<!--//                echo 'khong co ';-->
<!--//            }-->
<!--//            ?>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->



            </div>
        </div>
    </div>
</div>
<!-- Kenne's Blog Grid View Area End Here -->
