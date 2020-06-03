$(function(){
    'use strict';
    $('body').on('change', '.load-data-on-change', function () {
        var el = $(this),
            url_load_data = el.attr('load-data-url') || null,
            element_load_data = el.attr('load-data-element') || null,
            self_key = el.attr('load-data-key') || null,
            data_add = el.attr('load-data-data') || {},
            callback = el.attr('load-data-callback') || null,
            method_load = el.attr('load-data-method') || 'POST';
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
                    console.log('Invalid data format: "string" or "object"!');
                    return false;
                }
                if (typeof res.data === "string") {
                    $(element_load_data).append(res.data);
                } else if (typeof res.data === "object") {
                    Object.keys(res.data).forEach(function (k) {
                        $(element_load_data).append('<option value="' + k + '">' + res.data[k] + '</option>');
                    });
                }
                if (typeof window[callback] === "function") {
                    window[callback]();
                } else if (typeof callback === "string") {
                    try {
                        eval(callback);
                    } catch (e) {
                        console.log('Error callback!');
                    }
                }
            } else {
                console.log('Load data not success with code ' + res.code, res);
            }
        }).fail(function (f) {
            console.log('Load data fail');
        });
    });
});