/*
$('a.add-cart').click(function (event) {
    event.preventDefault();
    var href = $(this).attr('href');
    var name = $(this).data('name');
    $.ajax({
       url : href,
       type:'get',
       data:{},
       success:function (data) {
           $('.modal-title').html('Thêm vào giỏ hàng thành công');
           $('.modal-body').html('Sản phẩm '+ name);
           $('#myModal').modal('show');
       }
    });

});*/

/*$('.cart-plus-minus-box').on('input', function() {
    var keyqtt = $(this).data('name');
    var remain_quantity = $('.remain-quantity-'+keyqtt).text();
    var qtt = $(this).val();
    if(parseInt(remain_quantity) < parseInt(qtt)){
        alert("Vui long kiểm tra lại số lượng");
        return false;
    }else{

    }
});*/

// Ham reg kiem tra email
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

// Kiem tra mail newsletter da dang ki chua - footer - ajax
$('#mc-embedded-subscribe-form').submit(function (event){
    event.preventDefault();
    var form = $(this);
    var data = form.serialize();
    var email = $('#mc-email').val();
    var url = $('#mc-embedded-subscribe-form').attr('action');
    if(IsEmail(email) == false){
        $('#invalid_email').show();
        alert("Email bạn nhập sai");
        return false;
    }
    $.ajax({
       url: url,
       type: 'post',
       data: data,
       success:function (data){
            if(data == 'success')
            {
                alert("Thành công");
            }else {
                alert("Địa chỉ email này đã đăng kí. Vui lòng kiểm tra lại.");
            }
       }
    });
});




// Them vao wishlist ajax
$('a.add-wishlist').click(function (event){
   event.preventDefault();
    var href = $(this).attr('href');
    var name = $(this).data('name');
    $.ajax({
       url : href,
       type: 'get',
       data : {},
       success:function (data){
           if(data === 'fail'){
               $('.modal-title').html('<span style="color:#d88f17">Thông báo</span>');
               $('.modal-body').html('Sản phẩm <b>'+ name+ '</b> đã có trong danh sách yêu thích ');
               $('#myModal').modal('show');
           } else {
               $('.modal-title').html('Thành công');
               $('.modal-body').html('Sản phẩm <b>'+ name+ '</b> đã được thêm vào danh sách yêu thích thành công');
               $('#myModal').modal('show');
           }
       }
    });
});
formatter = new Intl.NumberFormat('Vi-vi', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits:0
});

//Xem chi tiet don hang trong account
$('a#account-view').click(function (event){
    event.preventDefault();
    var href = $(this).attr('href');
    var id = $(this).data('name');
    /*var html = '';
    var stt = 1;*/
    $.ajax({
       url:href,
       type:'get',
       data: {},
        success:function (data){
           $('.modal-content').html(data);
           /*jsondata = JSON.parse(data);
            console.log(jsondata);
            jsondata.forEach(function (value){
                $('.modal-title').html('Chi tiết đơn hàng #'+value.id_tr);
                html += '<tr><th scope="row" class="modal-id">'+ stt++ +'</th>' +
                    '<td class="modal-image"><img src="'+value.pro_image+'" class="image-detail" width="150px" height="150px"></td>' +
                    '<td class="modal-name">'+value.pro_name+'</td>' +
                    '<td class="modal-quantity">'+value.or_quantity+' cái</td>' +
                    '<td class="modal-price">'+formatter.format(value.or_price)+'</td>'+
                    '<td class="modal-total">'+formatter.format(value.or_price*value.or_quantity)+'</td>'+
                    '</tr>';
                $('.modal-body-product').html(html);
                /!*$(".image-detail").attr("src", value['pro_image']);
                //document.getElementsByClassName('modal-image').src=value['pro_image'];
                $('.modal-name').html(value['pro_name']);
                $('.modal-quantity').html(value['pro_name']);
                $('.modal-price').html(value['or_price']);*!/
            });*/
           $('#modal-account').modal('show');
        }
    });

});

 /*
 Ham de sort trong /shop : noi url vao dang sau.
 Check 3 TH:
 - /shop?sort=...
 - /shop?slug=...
 - /shop
 */
var url3 = window.location;
if(url3 == 'http://project.tm/shop' || url3['href'].indexOf('?sort') != -1){
    /*$(document).ready(function(){*/
        $('#sort').change(function (){
            var url1 = window.location;
            var url2 = $(this).val();

            var url = url1 + '?sort=' +url2;
            if(url.indexOf("?sort") ){
                var idx = url.indexOf('sort');
                url = url.slice(0,idx-1);
                url += '?sort=' +url2;
            }
            /*var url = url1 + '&sort=' +url2;
            if(url.indexOf("&sort") ){
                var idx = url.indexOf('sort');
                url = url.slice(0,idx-1);
                url += '&sort=' +url2;
            }
            var idx = $url.indexOf('sort');
            $url = $url.slice(0,idx-1);*/
            window.location = url;
        });
    /*});*/
}
else {
/*
    $(document).ready(function(){
*/
        $('#sort').change(function (){
            var url1 = window.location;
            var url2 = $(this).val();


            var url = url1 + '&sort=' +url2;
            if(url.indexOf("&sort") ){
                var idx = url.indexOf('sort');
                url = url.slice(0,idx-1);
                url += '&sort=' +url2;
            }
            /*var idx = $url.indexOf('sort');
            $url = $url.slice(0,idx-1);*/
            window.location = url;
        });
/*    });*/
}
