function saveContent() {

    alertMessage('Please confirm to Save General.', 'saveContentCallback');
}


function saveContentCallback() {
    preload('show');
    var f = document.getElementById('contFrm');

    f.method = 'post';
    f.enctype = 'multipart/form-data';
    f.target = 'updateFrm';
    f.action = BASEURL + "/setting/processFrm",
        f.submit();
}

function successCallBack() {
    preload('hide');
    window.location.hash = '/setting/general_web/?' + new Date().getTime();
}