$(function () {
        /*
         *  スマホ時メニュー表示処理
         */
        $('#header .menu-button').click(function () {
                $('#header .header-nav03').slideToggle();
        });
        $('#header .menu-close').click(function () {
                $('#header .header-nav03').slideToggle();
        });


        $('#header .header-nav03 a[title="title-only"]').addClass('submenu-open');

        $('#header .header-nav03 a[title="title-only"]').click(function () {
                if ($(this).hasClass('submenu-open')) {
                        $(this).removeClass('submenu-open');
                        $(this).addClass('submenu-close');
                } else {
                        $(this).removeClass('submenu-close');
                        $(this).addClass('submenu-open');
                }

                $(this).next('.sub-menu').slideToggle();
        });

        /*
         *  ヘッダーナビ　上部固定処理
         */
        var nav = $('#header .header-nav01');
        var offset = nav.offset();

        $(window).scroll(function () {
                if ($(window).scrollTop() > offset.top) {
                        nav.addClass('fixed');
                } else {
                        nav.removeClass('fixed');
                }

                if ($(window).scrollTop() > 10) {
                        $('#footer .return-top').stop();
                        $('#footer .return-top').fadeTo(1000, 0.5);
                } else {
                        $('#footer .return-top').stop();
                        $('#footer .return-top').fadeTo(1000, 0);
                }
        });

        /*
         *  ヘッダーナビ　サブメニュー表示処理
         */
        $('#header .header-nav01>ul>li').hover(
                function () {
                        $(this).children('ul').stop();
                        $(this).children('ul').slideDown(300);
                },
                function () {
                        $(this).children('ul').stop();
                        $(this).children('ul').slideUp(300);
                }
        );

        /*
         *  フッターメニューのサブアイテムの高さをそろえる
         */
        $('footer-nam02>ul>li').matchHeight();
});
