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

});