var sigup_tooltip = {
    'username': '帳號至少包含1個英文字以及1個數字，不可以有特殊符號，長度至少6個字元最多20字元',
    'email': '請輸入有效的email，格式包含 @',
    'password': '密碼至少包含1個英文字以及1個數字，可以有特殊符號，長度至少6個字元最多20字元，密碼與帳號不能相同',
    'confirm_password': '請再輸入一次相同的密碼',
    'name': '中文姓名不少於2個字，非中文姓名不少於3個字元，不能有特殊符號',
    'address': '選填，請輸入聯絡地址，例如：台北市中山區中山北路三段40號',
    'department': '選填，請輸入您的公司/部門，例如：大同大學資工系',
    'position': '選填，請輸入您的職稱，例如：專任助理',
    'phone': '選填，請輸入電話，格式：[區碼][號碼]，例如：0221822928',
    'phone_ext': '選填，請輸入電話分機號碼，最多10碼，例如：6565',
    'fax': '選填，請輸入傳真，格式：[區碼][號碼]，例如：0221822928',
    'fax_ext': '選填，請輸入傳真分機號碼，最多10碼，例如：6572'
};

function ajax(type = 'GET', url, data, successHandller, errorHandller) {
    $.ajax({
        type: type,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: data,
        success: successHandller,
        error: errorHandller
    });
}
