function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str = str.replace(/đ/g,"d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    str = str.replace(/ + /g," ");
    str = str.trim();
    return str;
}

$(function () {
    "use strict";

    var btn_del = '.btn-del';

    function setPopovers() {
        $(btn_del).each(function () {
            popoverBtnDel($(this));
        });
    }

    function popoverBtnDel(el) {
        var url = el.attr('data-url') || null;
        if (url === null) {
            console.log('Empty url!');
            return false;
        }
        var title = el.attr('title') || null,
            data_title = el.attr('data-title') || "Bạn thực sự muốn xóa?",
            btn_success_class = el.attr('btn-success-class') || null,
            btn_cancel_class = el.attr('btn-cancel-class') || null,
            btn_cancel = $('<button class="btn btn-warning mr-5' + (btn_cancel_class !== null ? ' ' + btn_cancel_class : '') + '">Cancel</button>'),
            btn_success = $('<a href="' + url + '" class="btn btn-success' + (btn_success_class !== null ? ' ' + btn_success_class : '') + '">Yes</a>'),
            content = $('<div></div>').append(btn_cancel, btn_success);
        btn_cancel.on('click', function () {
            el.popover('hide');
        });
        el.on('show.bs.popover', function () {
            $('body').find(btn_del).not(el).each(function () {
                $(this).popover('hide');
            });
        }).removeAttr('title').popover({
            html: true,
            title: data_title,
            content: content,
            template: '<div class="popover popover-" role="tooltip">' +
                '<div class="arrow"></div>' +
                '<div class="alert alert-warning alert-dismissible fade show mb-0 p-1" role="alert">' +
                '<h5 class="alert-heading popover-header text-red"></h5>' +
                '<div class="popover-body text-center pb-0"></div>' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>' +
                '</div>'
        }).attr('title', title);
    }

    $('body').on('load-body', function () {
        setPopovers();
    }).trigger('load-body');
});

$(document).ready(function () {
    var slider = $('#image-gallery').lightSlider({
        gallery: true,
        item: 1,
        mode: 'fade',
        thumbItem: 24,
        slideMargin: 0,
        speed: 1000,
        auto: true,
        loop: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });

    $("#font").click(function () {
        $("#image-gallery").removeClass("show-left");
        $("#image-gallery").removeClass("show-right");
        $("#image-gallery").removeClass("show-up");
        $("#image-gallery").removeClass("show-down");
        $(".click-button").removeClass("active");
        $(this).addClass("active");
        $("#image-gallery").addClass("show-font");
    });

    $("#left").click(function () {
        $("#image-gallery").removeClass("show-font");
        $("#image-gallery").removeClass("show-right");
        $("#image-gallery").removeClass("show-up");
        $("#image-gallery").removeClass("show-down");
        $(".click-button").removeClass("active");
        $(this).addClass("active");
        $("#image-gallery").addClass("show-left");
    });

    $("#right").click(function () {
        $("#image-gallery").removeClass("show-font");
        $("#image-gallery").removeClass("show-left");
        $("#image-gallery").removeClass("show-up");
        $("#image-gallery").removeClass("show-down");
        $(".click-button").removeClass("active");
        $(this).addClass("active");
        $("#image-gallery").addClass("show-right");
    });

    $("#up").click(function () {
        $("#image-gallery").removeClass("show-font");
        $("#image-gallery").removeClass("show-left");
        $("#image-gallery").removeClass("show-right");
        $("#image-gallery").removeClass("show-down");
        $(".click-button").removeClass("active");
        $(this).addClass("active");
        $("#image-gallery").addClass("show-up");
    });

    $("#down").click(function () {
        $("#image-gallery").removeClass("show-font");
        $("#image-gallery").removeClass("show-left");
        $("#image-gallery").removeClass("show-right");
        $("#image-gallery").removeClass("show-up");
        $(".click-button").removeClass("active");
        $(this).addClass("active");
        $("#image-gallery").addClass("show-down");
    });

    $('#pre').click(function () {
        slider.goToPrevSlide();
    });
    $('#next').click(function () {
        slider.goToNextSlide();
    });
    $('#play').click(function () {
        $(".button-play").removeClass("buttonplay");
        $(".button-play").addClass("buttonpause");
        slider.play();
    });
    $('#pause').click(function () {
        $(".button-play").removeClass("buttonpause");
        $(".button-play").addClass("buttonplay");
        slider.pause();
    });

    $('body').on('keyup', '.dropdown-value', function () {
        $(this).closest('tr').find('.dropdown-key').val(change_alias($(this).val()).replace(/ /g, "_"));
    });

    $('body').on('change', '.load-data-on-change', function () {
        var el = $(this),
            url_load_data = el.attr('load-data-url') || null,
            element_load_data = el.attr('load-data-element') || null,
            self_key = el.attr('load-data-key') || null,
            data_add = el.attr('load-data-data') || '{}',
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
        data = Object.assign(JSON.parse(data_add), data);
        console.log(data_add, JSON.parse(data_add), data);
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