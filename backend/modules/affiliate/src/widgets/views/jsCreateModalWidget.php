<?php if (Yii::$app->request->isAjax): ?>
<script>
    let form = $('#<?=$formClassName?>');

    form.on('beforeSubmit', function(e){
    debugger;
        e.preventDefault();

        url = '/backend/affiliate/handle-ajax/save-ajax';

        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            data: form.serialize() + '&model=<?=$modelName?>'
        })
            .done(res => {
                $('.ModalContainer').modal('hide');
                $.toast({
                    heading: 'Thông báo',
                    text: 'Tạo mới thành công',
                    position: 'top-right',
                    class: 'jq-toast-success',
                    hideAfter: 3500,
                    stack: 6,
                    showHideTransition: 'fade'
                });
            })
            .fail(f => {
                $.toast({
                    heading: 'Thông báo',
                    text: 'Tạo mới thất bại',
                    position: 'top-right',
                    class: 'jq-toast-danger',
                    hideAfter: 3500,
                    stack: 6,
                    showHideTransition: 'fade'
                });
            });

        return false;
    });
</script>
<?php endif ?>