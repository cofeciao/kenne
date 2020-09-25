$(function () {
    let customerStatus = $('[name="Customer[status_customer]"]');

    registerShowHide($('[name="Customer[online_source]"]'), ['facebook'], $('[name="Customer[fb_fanpage]"], [name="Customer[fb_customer]"]'));
    registerShowHide(customerStatus, ['fail'], $('[name="Customer[reason_fail]"]'));
    registerShowHide(customerStatus, ['dat_hen'], $('[name="Customer[co_so_id]"]'));
});