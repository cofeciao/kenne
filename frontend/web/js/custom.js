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
