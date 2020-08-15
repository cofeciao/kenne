<?php
$this->title = "Tài khoản";
\yii\web\YiiAsset::register($this);

?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area" style="margin-bottom: 3%">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                <li class="active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>
</div>

<?= \frontend\widgets\AlertWidget::widget() ?>
<?php if (isset($data)) { ?>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's Page Content Area -->
<main class="page-content" style="margin-top: -3%">
    <div class="account-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="<?= \yii\helpers\Url::toRoute('/site/logout')?>" role="tab" aria-selected="false">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Hello <b><?= isset(Yii::$app->user->identity) ? Yii::$app->user->identity->username : ''?></b><a href="<?= \yii\helpers\Url::toRoute('/site/logout')?>"> (Sign
                                        out</a>)</p>
                                <p>Từ dashboard có thể xem được các đơn hàng gần đây của bạn<a href="javascript:void(0)"></a>.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">MY ORDERS</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                        <tr>
                                            <th>ORDER</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>TOTAL</th>
                                            <th></th>
                                        </tr>
                                        <?php foreach ($data->models as $item) {?>
                                        <tr>
                                            <td><a class="account-order-id" href="javascript:void(0)">#<?= $item->id ?></a></td>
                                            <td><?= date('d-m-Y',$item->created_at) ?></td>
                                            <td>
                                                <?php if ($item->tr_status == 0) {
                                                    echo "Chưa thanh toán";
                                                 } else {
                                                    echo "Đã thanh toán";
                                                }?>
                                            </td>
                                            <td><?= number_format($item->tr_total,0,',','.')?>đ</td>
                                            <td><a href="<?= \yii\helpers\Url::toRoute(['/account/detail-order','id'=>$item->id])?>"
                                                   data-name=<?= $item->id ?> class="kenne-btn kenne-btn_sm" id="account-view"><span>View</span></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="small-title">Billing Adress</h4>
                                        <address>
                                            1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h4 class="small-title">Shipping Address</h4>
                                        <address>
                                            1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="#" class="kenne-form">
                                    <div class="kenne-form-inner">
                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname">First Name*</label>
                                            <input type="text" id="account-details-firstname">
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label for="account-details-lastname">Last Name*</label>
                                            <input type="text" id="account-details-lastname">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Email*</label>
                                            <input type="email" id="account-details-email">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-oldpass">Current Password(leave blank to leave
                                                unchanged)</label>
                                            <input type="password" id="account-details-oldpass">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-newpass">New Password (leave blank to leave
                                                unchanged)</label>
                                            <input type="password" id="account-details-newpass">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-confpass">Confirm New Password</label>
                                            <input type="password" id="account-details-confpass">
                                        </div>
                                        <div class="single-input">
                                            <button class="kenne-btn kenne-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Account Page Area End Here -->
</main>
<?php } ?>

<div class="modal" tabindex="-1" role="dialog" id="modal-account" >
    <div class="modal-dialog" role="document" style="max-width: 900px;margin: auto">
        <div class="modal-content" >
        </div>
    </div>
</div>
