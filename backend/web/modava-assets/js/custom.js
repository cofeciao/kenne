var pathPre = '';
if (window.location.href.includes('/backend')) {
    pathPre = '/backend';
}
$.getScript(pathPre + "/modava-assets/js/my-grid-view.js");
$.getScript(pathPre + "/modava-assets/js/my-loading.js");