$(document).ready(function () {
    $('#buttonless').click(function (e) {
        e.preventDefault();
        if (parseInt($('#cart').val())) {
            $('#cart').val(parseInt($('#cart').val()) - 1);
        }
    });

    $('#buttonincrease').click(function (e) {
        e.preventDefault();
        $('#cart').val(parseInt($('#cart').val()) + 1);
    });
    $(".click-pic").click(function () {
        $(".changepic").attr("src", $('img.click-pic').attr('src'));
    });
    $(".click-pic2").click(function () {
        $(".changepic").attr("src", $('img.click-pic2').attr('src'));
    });
    $(".click-pic3").click(function () {
        $(".changepic").attr("src", $('img.click-pic3').attr('src'));
    });
    $(".click-pic4").click(function () {
        $(".changepic").attr("src", $('img.click-pic4').attr('src'));
    });
});