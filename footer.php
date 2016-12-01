<div id="footer">
    <div class="return-top">
        <a href="#">
            <i class="fa fa-angle-double-up"></i>
        </a>
    </div>
    <div class="inner">
        <div class="footer01 clearfix only-pc">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-nav01',
                'container' => '',
                'menu'=>'footer nav 01',
                'menu_class' => '',
                'items_wrap' => '<div class="footer-nav01"><ul>%3$s</ul></div>'));
            wp_nav_menu(array(
                'theme_location' => 'footer-nav01',
                'menu'=>'footer nav 02',
                'container' => '',
                'menu_class' => '',
                'items_wrap' => '<div class="footer-nav02"><ul>%3$s</ul></div>'));
            ?>
        </div>
        <div class="address">
            <a href="<?php home_url; ?>">
                <div class="item">
                    学校法人　中央情報学園
                    <div class="title">中央情報専門学校</div>
                    〒352-0001 埼玉県新座市東北2-33-10<br>
                    電話:048-474-6651　FAX:048-475-1814
                </div>
            </a>

            <a href="http://wbc.ac.jp/" target="_blank">
                <div class="item">
                    姉妹校 <span class="title2">早稲田文理専門学校</span><br>
                    〒171-0033 東京都豊島区高田2-6-7<br>
                    電話:03-5960-2611　FAX:03-5960-2622
                </div>
            </a>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-46389333-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
