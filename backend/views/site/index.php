<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12-Dec-18
 * Time: 4:24 PM
 */


$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid mt-xl-50- mt-sm-30- mt-10 px-xxl-65- px-xl-15">
    <ul class="nav nav-tabs nav-sm nav-light mb-10" role="tablist">
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left active" data-toggle="tab" href="#tabs-1" role="tab"><i
                        class="zmdi zmdi-apps"></i>My Dashboard</a>
        </li>

        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#" role="tab"><i class="zmdi zmdi-trending-up"></i>Sales
                Insights</a>
        </li>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#" role="tab"><i class="zmdi zmdi-headset"></i>Help Desk
                Insights</a>
        </li>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#tabs-4" role="tab"><i class="zmdi zmdi-device-hub"></i>Tickets
                Insights</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    Content Here
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>