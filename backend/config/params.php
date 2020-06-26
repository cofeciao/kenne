<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 10:39 AM
 */

use backend\modules\clinic\controllers\ChupBanhMoiController;
use backend\modules\clinic\controllers\ChupCuiController;
use backend\modules\clinic\controllers\ChupFinalController;
use backend\modules\clinic\controllers\ChupHinhController;
use backend\modules\clinic\controllers\HinhFinalController;
use backend\modules\clinic\controllers\TkncController;
use backend\modules\clinic\controllers\UomRang1Controller;
use backend\modules\clinic\controllers\UomRang2Controller;
use backend\modules\clinic\models\PhongKhamChupBanhMoi;
use backend\modules\clinic\models\PhongKhamChupCui;
use backend\modules\clinic\models\PhongKhamChupFinal;
use backend\modules\clinic\models\PhongKhamChupHinh;
use backend\modules\clinic\models\PhongKhamHinhFinal;
use backend\modules\clinic\models\PhongKhamHinhTknc;
use backend\modules\clinic\models\PhongKhamUomRang1;
use backend\modules\clinic\models\PhongKhamUomRang2;
use backend\modules\clinic\models\UploadAudio;

return [
    'menu-active' => [

    ],
    'create-success' => 'Thêm mới thành công.',
    'create-danger' => 'Thêm mới không thành công. Hãy liên lạc ban quản trị nếu bạn cho rằng đây là lỗi hệ thống. Xin cảm ơn',
    'create-warning' => 'Bạn không thể tạo mới trong mục này.',

    'update-success' => 'Cập nhật thành công.',
    'update-danger' => 'Cập nhật không thành công. Hãy liên lạc ban quản trị nếu bạn cho rằng đây là lỗi hệ thống. Xin cảm ơn',
    'update-warning' => 'Bạn không thể cập nhật mục này.',

    'delete-success' => 'Xóa thành công.',
    'delete-danger' => 'Xóa không thành công. Hãy liên lạc ban quản trị nếu bạn cho rằng đây là lỗi hệ thống. Xin cảm ơn',
    'delete-cancer' => 'Bạn đã không xóa',
    'warning-show-hide' => 'Bạn không thể thực hiện hành động này, hãy liên hệ ban quản trị nếu yêu cầu của bạn là cần thiết. Xin cảm ơn',

    'change-password-success' => 'Bạn đã thay đổi mật khẩu thành công.',
    'change-password-error' => 'Bạn đã thay đổi mật khẩu không thành công, có thể mật khẩu cũ bạn nhập không chính xác.',
    'find-data-not-success' => 'Không tìm thấy dữ liệu trong hệ thống',
    'product-size' => '150x150px',
    'article-size' => '150x150px'
];
