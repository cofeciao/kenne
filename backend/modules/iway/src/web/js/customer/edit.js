const delayTime = 300;

function showHideButtonForCreateCallOrAS() {
    let customerStatus = $('[name="Customer[status_customer]"]').val(),
        btnCreateCall = $('.create-call'),
        btnCreateLichHen = $('.create-appointment-schedule'),
        inputIsCall = $('[name="Customer[none_db_call_is_create]"]'),
        inputIsAS = $('[name="Customer[none_db_ac_is_create]"]');

    switch (customerStatus) {
        case 'dat_hen':
            btnCreateCall.hide(delayTime);
            inputIsCall.val(0).trigger('change');
            btnCreateLichHen.show(delayTime);
            break;
        case 'cho_cham_soc_lai':
            btnCreateCall.show(delayTime);
            btnCreateLichHen.hide(delayTime);
            inputIsAS.val(0).trigger('change');
            break;
        case 'fail':
        default:
            btnCreateCall.hide(delayTime);
            btnCreateLichHen.hide(delayTime);
            inputIsAS.val(0).trigger('change');
            inputIsCall.val(0).trigger('change');
            break;
    }
}

function registerBtnCreateSec(btn, hiddenInput, createSec) {
    btn.on('click', function () {
        let ac = hiddenInput,
            acValue = parseInt(ac.val()) ? 0 : 1; /* Reverse value */

        ac.val(acValue).trigger('change');
    });
}

function showHideCreateSec(hiddenInput, createSec) {
    hiddenInput.on('change', function () {
        if (parseInt(hiddenInput.val())) {
            createSec.show(delayTime);
        } else {
            createSec.hide(delayTime);
        }
    });
}

$(function () {
    let customerStatus = $('[name="Customer[status_customer]"]');

    registerShowHide($('[name="Customer[online_source]"]'), ['facebook'], $('[name="Customer[fb_fanpage]"], [name="Customer[fb_customer]"]'));
    registerShowHide(customerStatus, ['fail'], $('[name="Customer[reason_fail]"]'));

    showHideButtonForCreateCallOrAS();
    customerStatus.on('change', function () {
        showHideButtonForCreateCallOrAS();
    });

    showHideCreateSec($('[name="Customer[none_db_ac_is_create]"]'), $('#appointment-schedule-sec'));
    showHideCreateSec($('[name="Customer[none_db_call_is_create]"]'), $('#call-sec'));

    registerBtnCreateSec($('.create-appointment-schedule'), $('[name="Customer[none_db_ac_is_create]"]'), $('#appointment-schedule-sec'));
    registerBtnCreateSec($('.create-call'), $('[name="Customer[none_db_call_is_create]"]'), $('#call-sec'));
});