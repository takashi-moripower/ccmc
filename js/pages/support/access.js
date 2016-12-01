$(function () {
    $('.access02 .google').hide();

    $('.access02 .google .button_small').click(function () {
	$('.access02 .illust').show();
	$('.access02 .google').hide();
    });
    
    $('.access02 .illust .button_small').click(function () {
	$('.access02 .google').show();
	$('.access02 .illust').hide();
    });
});