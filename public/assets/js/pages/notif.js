$(document).ready(function () {
    let error = $('#error').length;
    if (error > 0) {
        const errorText = document.getElementById('error');
        toastr['error'](errorText.innerHTML,
            'Error!', {
            closeButton: true,
            tapToDismiss: true,
            positionClass: 'toast-bottom-right'
        });
        setTimeout(() => {
            $('#error').remove();
        }, 1000)
    }

    let success = $('#success').length;
    if (success > 0) {
        const successText = document.getElementById('success');
        toastr['success'](successText.innerHTML,
            'Success!', {
            closeButton: true,
            tapToDismiss: true,
            positionClass: 'toast-bottom-right'
        });
        setTimeout(() => {
            $('#success').remove();
        }, 1000)
    }

    let info = $('#info').length;
    if (info > 0) {
        const infoText = document.getElementById('info');
        toastr['info'](infoText.innerHTML,
            'Info!', {
            closeButton: true,
            tapToDismiss: true,
            positionClass: 'toast-bottom-right'
        });
        setTimeout(() => {
            $('#info').remove();
        }, 1000)
    }

    let warning = $('#warning').length;
    if (warning > 0) {
        const warningText = document.getElementById('warning');
        toastr['warning'](warningText.innerHTML,
            'Warning!', {
            closeButton: true,
            tapToDismiss: true,
            positionClass: 'toast-bottom-right'
        });
        setTimeout(() => {
            $('#warning').remove();
        }, 1000)
    }
})