$(function () {
    var slider_option =
            {
                minSlides: 1,
                maxSlides: 1,
                slideWidth: 940,
                moveSlides: 1,
                responsive: true,
                speed: 1000,
                pause: 8000,
                pager: false,
                nextText: '<i class="fa fa-caret-right"></i>',
                prevText: '<i class="fa fa-caret-left"></i>',
                auto: true
            };

    $(function () {
        $('#slider img:first').imagesLoaded(function () {
            slider = $('#slider').bxSlider(slider_option);
        });
    });
});


$(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(function() {
    var fbUrl = 'https://www.facebook.com/%E4%B8%AD%E5%A4%AE%E6%83%85%E5%A0%B1%E5%B0%82%E9%96%80%E5%AD%A6%E6%A0%A1-1578738322430448/',
        fbTitle = '中央情報専門学校';
 
    $(window).resize(function () {
        $('#fbPagePlugin').html('<div class="fb-page" data-href="' + fbUrl + '" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="' + fbUrl + '"><a href="' + fbUrl + '">' + fbTitle + '</a></blockquote></div></div>');
        window.FB.XFBML.parse();
    });
});
