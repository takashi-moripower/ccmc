$(function(){
  $('body').prepend('<div id="sample-image"><div class="inner"></div></div>');
  $('body').dblclick(function(){
    $('#sample-image').toggle();
  });
});

