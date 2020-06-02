$('body').on('change', '.load-data', function () {
    var el = $(this),
        url_load_data = el.attr('url-load-data') || null,
        element_load_data = el.attr('element-load-data') || null,
        self_key = el.attr('self-key') || null,
        data_add = el.attr('data-add') || {},
        method_load = el.attr('method-load') || 'POST';
    if (url_load_data === null) {
        console.log('Url load data not found!');
        return false;
    }
    if ($(element_load_data).length <= 0) {
        console.log('Element load data not found!');
        return false;
    }
    if (!$(element_load_data).is('select')) {
        console.log('Element load data must be tag <select>');
        return false;
    }
    if (self_key === null) {
        console.log('Key not defined!');
        return false;
    }
    var data = {};
    data[self_key] = el.val();
    data = Object.assign(data_add, data);
    $(element_load_data).find('option[value!=""]').remove();
    $.ajax({
        type: method_load,
        url: url_load_data,
        dataType: 'json',
        data: data
    }).done(function (res) {
        if (res.code === 200) {
            if (!["string", "object"].includes(typeof res.data)) {
                console.log('Dữ liệu format không đúng định dạng "string" hoặc "object"');
                return false;
            }
            if (typeof res.data === "string") {
                $(element_load_data).append(res.data);
            } else if (typeof res.data === "object") {
                Object.keys(res.data).forEach(function (k) {
                    $(element_load_data).append('<option value="' + k + '">' + res.data[k] + '</option>');
                });
            }
        } else {
            console.log('Load data not success with code ' + res.code, res);
        }
    }).fail(function (f) {
        console.log('Load data fail');
    });
});