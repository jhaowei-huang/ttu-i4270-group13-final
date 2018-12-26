function showPopupModal() {

}

$(document).ready(function () {
    $('.btn').click(function (e) {
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        if (id === 'btn-signin') {
            window.location.href = '/signin';
        } else if (id === 'btn-signup') {
            window.location.href = '/signup';
        }
    });

    $('.btn-signin').click(function (e) {
        window.location.href = '/signin';
    });
});
