$(document).ready(function () {
    // 預設顯示地圖資訊頁
    $('#btn-mrt').css('border-bottom', 'solid');
    $('#content-mrt').show();
    // 按下資訊、捷運、公車，將會切換到相對應的頁面
    $('.indicator').click(function (e) {
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        $('.btn').css('border-bottom', 'none');
        $('#' + id).css('border-bottom', 'solid');
        $('.content').hide();
        $('#' + id.replace('btn', 'content')).show();
    });
});
