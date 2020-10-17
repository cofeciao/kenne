function previewImage(preview, src) {
    if (!preview.is('img')) {
        var img = preview.children('img');
        if (img.length <= 0) preview.html('<img src="" alt="Preview"/>');
        preview = preview.children('img');
    }
    preview.attr('src', src);
}

function readURL(input, preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            previewImage(preview, e.target.result);
            $('input[name="IwayTrayImages[fileImageBase64]"]').val(e.target.result);
            $(input).closest('.upload-zone').addClass('has-image').closest('.modal-body').addClass('change-image');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        var img_default = $(input).attr('data-default') || null;
        previewImage(preview, img_default);
        if (img_default == null) {
            $(input).closest('.upload-zone').removeClass('has-image');
        }
        $('input[name="IwayTrayImages[fileImageBase64]"]').val(null);
        $(input).closest('.modal-body').removeClass('change-image');
    }
}

function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
    str = str.replace(/ + /g, " ");
    str = str.trim();
    return str;
}

/*
* Implement by Hoang Duc
* Date: 2020-09-24
* Purpose: handle show hide child with parent value
* Example: handleShowHide($('[name="Customer[online_source]"]'), ['facebook'], $('[name="Customer[fb_fanpage]"], [name="Customer[fb_customer]"]'));
* */
function handleShowHide(parrentEle, parrentValues = [], childEles) {
    let onlineSource = $(parrentEle).val();

    if (parrentValues.includes(onlineSource)) {
        $(childEles).closest('.form-group').show(300);
    } else {
        $(childEles).closest('.form-group').hide(300);
        $(childEles).val('').trigger('change');
    }
}

function registerShowHide(parrentEle, parrentValues = [], childEles, eventName = 'change') {
    handleShowHide($(parrentEle), parrentValues, childEles);
    $(parrentEle).on(eventName, function () {
        handleShowHide($(parrentEle), parrentValues, childEles);
    });
}

function copyToClipboard(text) {
    let dummy = document.createElement("input");
    document.body.appendChild(dummy);
    dummy.setAttribute("id", "dummy_id");
    document.getElementById("dummy_id").value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    $.toast({
        heading: 'Thông báo',
        text: 'Copy thành công',
        position: 'top-right',
        class: 'jq-toast-success',
        hideAfter: 2000,
        stack: 6,
        showHideTransition: 'fade'
    });
}

function saveStateSearchPanel(searchPanel, button, key) {
    if (!window.localStorage.getItem(key)) {
        window.localStorage.setItem(key, 'show');
    }

    if (window.localStorage.getItem(key) === 'show') $(searchPanel).collapse('show');
    else $(searchPanel).collapse('hide');

    $(button).on('click', function () {
        if (window.localStorage.getItem(key) === 'show') {
            window.localStorage.setItem(key, 'hide');
        } else {
            window.localStorage.setItem(key, 'show');
        }
    });
}

function formatToRawNumber(number) {
    let result = parseFloat(number.toString().replace(/,/g, ''));
    return isNaN(result) ? 0 : result;
}

function formatAsDecimal(number) {
    return new Intl.NumberFormat('en-US').format(formatToRawNumber(number));
}

function formatAsCurrency(number, symbol = '₫') {
    return formatAsDecimal(number) + ' ' + symbol;
}

function updateRecordAjax(recordId, data, url, confirmMessage = 'Bạn có muốn cập nhật', pAjaxContainerId = '#dt-pjax') {
    let confimM = confirm(confirmMessage);
    if (!confimM) return;
    $.post(url + '?id=' + recordId, data).done(function (response) {
        if (response) {
            if (response.success) {
                $.toast({
                    heading: 'Thông báo',
                    text: 'Thành công',
                    position: 'top-right',
                    class: 'jq-toast-success',
                    hideAfter: 3500,
                    stack: 6,
                    showHideTransition: 'fade'
                });
                if (pAjaxContainerId) {
                    $.pjax.reload({container: pAjaxContainerId, url: window.location.href});
                } else {
                    window.location.reload();
                }
            } else {
                $.toast({
                    heading: 'Thông báo',
                    text: 'Thất bại: ' + response.error.join(', '),
                    position: 'top-right',
                    class: 'jq-toast-warning',
                    hideAfter: 3500,
                    stack: 6,
                    showHideTransition: 'fade'
                });
            }

        } else {
            $.toast({
                heading: 'Thông báo',
                text: 'Thất bại: Lỗi không xác định',
                position: 'top-right',
                class: 'jq-toast-warning',
                hideAfter: 3500,
                stack: 6,
                showHideTransition: 'fade'
            });
        }
    });
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

    $('body').on('keyup', '.dropdown-value', function () {
        $(this).closest('tr').find('.dropdown-key').val(change_alias($(this).val()).replace(/ /g, "_"));
    });

    $('body').on('change', '.load-data-on-change', function () {
        var el = $(this),
            url_load_data = el.attr('load-data-url') || null,
            element_load_data = el.attr('load-data-element') || null,
            self_key = el.attr('load-data-key') || null,
            data_add = el.attr('load-data-data') || '{}',
            removeEmptyOption = el.attr('load-data-removeemptyoption') || null,
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
        if (removeEmptyOption) {
            $(element_load_data).html('');
        } else {
            $(element_load_data).find('option[value!=""]').remove();
        }
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

    $('body').on('click', '.copy', function () {
        copyToClipboard($(this).data('copy'));
    }).on('click', '.clear-value', function (e) {
        e.stopImmediatePropagation();
        e.preventDefault();

        let input = $(this).closest('.input-group').find('input, select');

        if (input.hasClass('data-krajee-daterangepicker')) {
            input.trigger('cancel.daterangepicker');
        } else {
            input.val('').trigger('change');
        }
    }).on('post-object-created', function () {
        if ($('.pjax-container').length) {
            $.pjax.reload({container: '#' + $('.pjax-container').attr('id')});
        } else {
            window.location.reload();
        }

    }).on('shown.bs.collapse hidden.bs.collapse', '.save-state-search', function () {
        customPjax.setHeightContent();
    });

    $('.save-state-search').each(function () {
        saveStateSearchPanel($(this), $(this).closest('.hk-sec-wrapper').find('.btn-hide-search'), $(this).data('search-panel'));
    });

    $('body').on('click', '.btn-iway-images', function () {
        var el = $(this),
            url = el.attr('data-load');
        $('#modal-image .modal-content').load(url);
        $('#modal-image').modal('show');
    }).on('click', '.upload-zone.disabled', function (e) {
        e.preventDefault();
        return false;
    }).on('click', '.upload-zone .refresh', function () {
        $(this).closest('.upload-zone').find('.btn-upload input[type="file"]').val('').trigger('change');
    });
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
});