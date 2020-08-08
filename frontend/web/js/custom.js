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

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

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

var url3 = window.location;
if(url3 == 'http://project.tm/shop' || url3['href'].indexOf('?sort') != -1){
    $(document).ready(function(){
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
    });
}
else {
    $(document).ready(function(){

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
    });
}
