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


function showPopupModal() {

}

$(document).ready(function () {
    $('.btn').click(function (e) {
        console.log(e.target.id);
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        if (id === 'btn-signin') {
            window.location.href='/signin';
        } else if(id === 'btn-signup') {
            window.location.href='/signup';
        }
    });
});
