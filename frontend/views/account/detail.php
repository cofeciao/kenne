
<?php if (isset($dataDetail)) { ?>
    <div class="modal-header">
        <h5 class="modal-title">Chi tiết đơn hàng #<?= isset($id) ? $id : 0 ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Quanlity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody class="modal-body-product">
            <?php foreach ($dataDetail->models as $key => $item) { ?>
                <tr>
                    <th scope="row" class="modal-id"># <?= $key ?></th>
                    <td class="modal-image"><a href="asd"><img src="<?= \yii\helpers\Url::to($item['pro_image']) ?>"
                                                 class="image-detail" width="150px" height="150px"></a></td>
                    <td class="modal-name"><?= $item['pro_name'] ?></td>
                    <td class="modal-quantity"><?= $item['or_quantity'] ?></td>
                    <td class="modal-price"><?= number_format($item['or_price'], 0, ',', '.') ?> đ</td>
                    <td class="modal-total"><?= number_format($item['or_price'] * $item['or_quantity'], 0, ',', '.') ?>
                        đ
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php echo \yii\widgets\LinkPager::widget([
        'pagination' => $dataDetail->pagination,
    ]); ?>
<?php } ?>
<?php
$js = <<< JS
$( '.pagination li a').click(function(e){
    e.preventDefault();
    href = $(this).attr("href");
    $.ajax({
        url : href,
        type: "get",
        data : {},
        success:function (data){
             $(".modal-content").html(data);
              $("#modal-account").modal("show");
            }
    });
    return false;
});
JS;
$this->registerJs($js);

//echo '<script language="javascript" type="text/javascript">';
//echo '$(document).ready(function(){
//            $(".pagination li a").click(function(e){
//                e.preventDefault();
//                href = $(this).attr("href");
//                $.ajax({
//                    url : href,
//                    type: "get",
//                    data : {},
//                    success:function (data){
//                         $(".modal-content").html(data);
//                          $("#modal-account").modal("show");
//                        }
//                });
//            });
//        });'
//
////pagination ajax
//;
?>

