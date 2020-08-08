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
