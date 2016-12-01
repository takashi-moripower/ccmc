$(function(){
    $('input[name="post-code"]').keyup(function(){
	AjaxZip3.zip2addr('post-code','','address1','address1','address2')
    });
});