<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
    <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
       href="javascript:void(0);"><span class="feather-icon"><i data-feather="more-vertical"></i></span></a>
    <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
                class="feather-icon"><i data-feather="menu"></i></span></a>
    <a class="navbar-brand" href="<?=Url::home(); ?>">
        <?= Yii::t('backend', 'Modava'); ?>
    </a>
    <ul class="navbar-nav hk-navbar-content order-xl-2">
        <li class="nav-item">
            <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span
                        class="feather-icon"><i data-feather="search"></i></span></a>
        </li>
        <li class="nav-item">
            <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span
                        class="feather-icon"><i data-feather="settings"></i></span></a>
        </li>
        <li class="nav-item dropdown dropdown-notifications">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span class="feather-icon bell"><i
                            data-feather="bell"></i></span></a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a></h6>
                <div class="notifications-nicescroll-bar">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <img src="<?= Yii::$app->assetManager->publish('@backendWeb/dist/img/avatar1.jpg')[1]; ?>"
                                         alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text"><span
                                                class="text-dark text-capitalize">Evie Ono</span> accepted your
                                        invitation to join the team
                                    </div>
                                    <div class="notifications-time">12m</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <img src="<?= Yii::$app->assetManager->publish('@backendWeb/dist/img/avatar2.jpg')[1]; ?>"
                                         alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">New message received from <span
                                                class="text-dark text-capitalize">Misuko Heid</span></div>
                                    <div class="notifications-time">1h</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-primary rounded-circle">
													<span class="initial-wrap"><span><i
                                                                    class="zmdi zmdi-account font-18"></i></span></span>
                                            </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">You have a follow up with<span
                                                class="text-dark text-capitalize"> dashgrin head</span> on <span
                                                class="text-dark text-capitalize">friday, dec 19</span> at <span
                                                class="text-dark">10.00 am</span></div>
                                    <div class="notifications-time">2d</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-success rounded-circle">
													<span class="initial-wrap"><span>A</span></span>
                                            </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">Application of <span
                                                class="text-dark text-capitalize">Sarah Williams</span> is waiting for
                                        your approval
                                    </div>
                                    <div class="notifications-time">1w</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-warning rounded-circle">
													<span class="initial-wrap"><span><i
                                                                    class="zmdi zmdi-notifications font-18"></i></span></span>
                                            </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">Last 2 days left for the project</div>
                                    <div class="notifications-time">15d</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown dropdown-authentication">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-img-wrap">
                        <div class="avatar">
                            <img src="<?= Yii::$app->assetManager->publish('@backendWeb/dist/img/avatar12.jpg')[1]; ?>"
                                 alt="user" class="avatar-img rounded-circle">
                        </div>
                        <span class="badge badge-success badge-indicator"></span>
                    </div>
                    <div class="media-body">
                        <span>Madelyn Shane<i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                <a class="dropdown-item" href="#"><i
                            class="dropdown-icon zmdi zmdi-card"></i><span>My balance</span></a>
                <a class="dropdown-item" href="inbox.html"><i
                            class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                <div class="dropdown-divider"></div>
                <div class="sub-dropdown-menu show-on-hover">
                    <a href="#" class="dropdown-toggle dropdown-item no-caret"><i
                                class="zmdi zmdi-check text-success"></i>Online</a>
                    <div class="dropdown-menu open-left-side">
                        <a class="dropdown-item" href="#"><i
                                    class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                        <a class="dropdown-item" href="#"><i
                                    class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                        <a class="dropdown-item" href="#"><i
                                    class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <?= Html::a('<i class="dropdown-icon zmdi zmdi-power"></i> ' . Yii::t('backend', 'Logout'), Url::toRoute(['/auth/logout.html']), ['class' => 'dropdown-item', 'data-method ' => 'POST']); ?>
            </div>
        </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-0">
            <li class="nav-item">
                <a href="#" class="nav-link">Marketing</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Sales</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Help Desk</a>
            </li>
            <li class="nav-item<?php if (Yii::$app->controller->module->id == 'calendar') echo ' active'; ?>">
                <a href="<?=Url::toRoute(['/calendar']); ?>" class="nav-link"><?=Yii::t('backend', 'Calendar'); ?></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Email</a>
            </li>
            <li class="nav-item<?php if (Yii::$app->controller->module->id == 'filemanager') echo ' active'; ?>">
                <a href="<?= Url::toRoute(['/filemanager']); ?>"
                   class="nav-link"><?= Yii::t('backend', 'File Manager'); ?></a>
            </li>
        </ul>
    </div>

</nav>
<form role="search" class="navbar-search">
    <div class="position-relative">
        <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i
                        data-feather="search"></i></span></a>
        <input type="text" name="example-input1-group2" class="form-control" placeholder="Type here to Search">
        <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
    </div>
</form>