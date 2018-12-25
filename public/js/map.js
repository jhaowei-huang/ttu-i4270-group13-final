$(document).ready(function () {
    // 預設顯示地圖資訊頁
    $('#btn').addClass('btn-active');
    $('#content').show();
    // 按下資訊、捷運、公車，將會切換到相對應的頁面
    $('.indicator').click(function (e) {
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        $('.btn').removeClass('btn-active');
        $('#' + id).addClass('btn-active');
        $('.content').hide();
        $('#' + id.replace('btn', 'content')).show();
    });
});
