$(function() {
    $("a").tooltip();
});

$(function() {
    var num = $('.sumTotal').text();
    var n = parseFloat(num.toString()).toFixed(2);
    $('.sumTotal').text(n);
});

$(function() {
    jQuery(".chosen").chosen();
});