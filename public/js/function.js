function showPopupModal() {

}

$(document).ready(function () {
    $('.btn').click(function (e) {
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        if (id === 'btn-signin') {
            window.location.href = '/signin';
        } else if (id === 'btn-signup') {
            window.location.href = '/signup';
        } else if (id === 'btn-forgetPassword') {
            window.location.href = '/forgetPassword';
        } else if (id === 'btn-profile') {
            window.location.href = '/profile';
        } else if (id === 'btn-register' || id === 'btn-inquire' || id === 'btn-cancel') {
            alert('尚未完成');
        }
    });
});
