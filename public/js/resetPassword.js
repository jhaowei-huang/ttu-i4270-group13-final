function waiting(status = true) {
    if (status) {
        // 等待資料傳輸中
        $('.validation-area').text('驗證中，請稍後');
        $('#loading').css('display', 'block');
        $('input').prop('disabled', true);
        $('#btn-submit').prop('disabled', true);
    } else {
        // 資料傳輸完畢
        $('.input-invalid').removeClass('input-invalid');
        $('.validation-area').text('');
        $('#loading').css('display', 'none');
        $('input').prop('disabled', false);
        $('#btn-submit').prop('disabled', false);
        grecaptcha.reset();
    }
}

function invalidInput(errors) {
    for (let key in errors) {
        if (errors[key] !== '' && errors.hasOwnProperty(key)) {
            $('.validation-area').append(errors[key] + '\n');
            $('#' + key).addClass('input-invalid');
        }
    }
}

function success(response) {
    try {
        if (!response.hasOwnProperty('errors')) {
            // 成功寄送重設密碼的信件，重新跳轉至指定頁面
            window.location.href = response.redirect;
        } else {
            waiting(false);
            invalidInput(response.errors);
        }
    } catch (e) {
        console.log(e);
        console.log(response);
    }
}

function error(jqXHR, exception) {
    let validation = $('.validation-area');

    waiting(false);

    if (jqXHR.status === 422) {
        // 狀態422為Laravel預設的表單驗證錯誤狀態
        let errors = jqXHR.responseJSON.errors;

        for (let key in errors) {
            if (errors[key] !== '' && errors.hasOwnProperty(key)) {
                validation.append(errors[key] + '\n');
                $('#' + key).addClass('input-invalid');
            }
        }
    } else {
        validation.append(jqXHR.status, '：伺服器錯誤');
    }
}

$(document).ready(function () {
    $('#form-resetPassword').on('submit', function (e) {
        // 停用預設的遞送表單，預設的會導致頁面刷新
        e.preventDefault();
        // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊
        let data = $('#form-resetPassword').serialize();
        waiting();
        // 使用ajax遞送表單，避免頁面刷新
        ajax('POST', '/resetPassword', data, success, error);
    });
});
