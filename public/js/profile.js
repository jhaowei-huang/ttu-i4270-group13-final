function setTooltip() {
    // 增加欄位的輸入提示
    $('#form-profile input').each(function () {
        if ($(this).attr('id') !== undefined) {
            let content = sigup_tooltip[$(this).attr('id')];
            $(this).popover({
                placement: 'top',
                container: 'body',
                trigger: 'focus',
                content: content
            }).blur(function () {
                $(this).popover('hide');
            });
        }
    });
}

function waiting(status = true) {
    if (status) {
        // 等待資料傳輸中
        $('.validation-area').text('驗證中，請稍後');
        $('#loading').css('display', 'block');
        $('#form-profile input').prop('disabled', true);
        $('#btn-submit').prop('disabled', true);
    } else {
        // 資料傳輸完畢
        $('.input-invalid').removeClass('input-invalid');
        $('.validation-area').text('');
        $('#loading').css('display', 'none');
        $('#form-profile input').prop('disabled', false);
        $('#btn-submit').prop('disabled', false);
        grecaptcha.reset();
    }
}

function success(response) {
    try {
        // 若註冊成功就跳轉到指定頁面
        window.location.href = response.redirect;
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

function modalWaiting(status = true) {
    if (status) {
        // 等待資料傳輸中
        $('.modal-validation-area').text('驗證中，請稍後');
        $('#modal-loading').css('display', 'block');
        $('#form-modal input').prop('disabled', true);
        $('#btn-submitModal').prop('disabled', true);
    } else {
        // 資料傳輸完畢
        $('.modal-input').removeClass('input-invalid');
        $('.modal-validation-area').text('');
        $('#modal-loading').css('display', 'none');
        $('#form-modal input').prop('disabled', false);
        $('#btn-submitModal').prop('disabled', false);
    }
}

function modalSuccess(response) {
    try {
        if (!response.hasOwnProperty('errors')) {
            // 成功寄送重設密碼的信件，重新跳轉至指定頁面
            window.location.href = response.redirect;
        } else {
            modalWaiting(false);
            let errors = response.errors;
            for (let key in errors) {
                if (errors[key] !== '' && errors.hasOwnProperty(key)) {
                    $('.modal-validation-area').append(errors[key] + '\n');
                    $('#modal-' + key).addClass('input-invalid');
                }
            }
        }
    } catch (e) {
        console.log(e);
        console.log(response);
    }
}

function modalError(jqXHR, exception) {
    let validation = $('.modal-validation-area');

    modalWaiting(false);

    if (jqXHR.status === 422) {
        // 狀態422為Laravel預設的表單驗證錯誤狀態
        let errors = jqXHR.responseJSON.errors;

        for (let key in errors) {
            if (errors[key] !== '' && errors.hasOwnProperty(key)) {
                validation.append(errors[key] + '\n');
                $('#modal-' + key).addClass('input-invalid');
            }
        }
    } else {
        validation.append(jqXHR.status, '：伺服器錯誤');
    }
}

$(document).ready(function () {
    setTooltip();

    $('#form-profile').on('submit', function (e) {
        // 停用預設的遞送表單，預設的會導致頁面刷新
        e.preventDefault();
        // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊
        let data = $('#form-profile').serialize();
        waiting();
        // 使用ajax遞送表單，避免頁面刷新
        ajax('POST', '/profile', data, success, error);
    });

    $('#modal').on('hidden.bs.modal', function (e) {
        $('#column-2').remove();
        $('#column-3').remove();
    });

    $('#btn-editPassword').on('click', function (e) {
        $('#modal-title').text('修改密碼');
        $('#modal-text').html('輸入您現在的<strong class="color-primary">原密碼</strong>以及<strong class="color-secondary">新密碼</strong></span><p>注意!! 修改密碼完成後將會<strong class="color-third">登出</strong></p>');

        let column1 = $('#column-1');
        column1.find('i').removeClass().addClass('fas fa-key');
        column1.find('input')
            .attr('type', 'password')
            .attr('placeholder', '原密碼')
            .attr('id', 'modal-old-password')
            .attr('name', 'modal-old-password');
        let form = $('#form-modal');

        let column2 = column1.clone(true).attr('id', 'column-2');
        column2.find('input')
            .attr('placeholder', '新密碼')
            .attr('id', 'modal-password')
            .attr('name', 'modal-password');
        form.append(column2);

        let column3 = column1.clone(true).attr('id', 'column-3');
        column3.find('input')
            .attr('placeholder', '再輸入一次新密碼')
            .attr('id', 'modal-confirm-password')
            .attr('name', 'modal-confirm-password');
        form.append(column3);

        $('#btn-submitModal').on('click', function (e) {
            e.preventDefault();
            let data = $('#form-modal').serialize();
            modalWaiting();
            ajax('POST', '/profile/updatePassword', data,
                modalSuccess, modalError);
        });

        $('#modal').modal('show');
    });

    $('#btn-editEmail').on('click', function (e) {
        $('#modal-title').text('修改email');
        $('#modal-text').html('請輸入新的email<p>注意!! 修改email完成後將會<strong class="color-third">登出</strong>並且需要<strong class="color-primary">重新驗證email</strong></p>')
            .append('您現在的email： ' + $('#btn-editEmail').parent().parent().find('input').attr('value'));

        let column1 = $('#column-1');
        column1.find('i').removeClass().addClass('fas fa-at');
        column1.find('input')
            .attr('type', 'email')
            .attr('placeholder', '新email')
            .attr('id', 'modal-email')
            .attr('name', 'modal-email');

        $('#btn-submitModal').on('click', function (e) {
            e.preventDefault();
            let data = $('#form-modal').serialize();
            modalWaiting();
            ajax('POST', '/updateEmail', data,
                modalSuccess, modalError);
        });

        $('#modal').modal('show');
    });
});
