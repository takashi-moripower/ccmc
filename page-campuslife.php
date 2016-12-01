<?php
remove_filter('the_content', 'wpautop');
get_header();

$file = get_template_file('images/kv/campus/life.png');
?>
<div id="middle" class="clearfix">
    <div class="inner middle-left">
        <div class="keyvisual">
            <img src="<?php echo $file; ?>" alt="keyvisual <?php echo get_the_title(); ?>" >
        </div>
        <div class="breadcrumbs">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            }
            ?>
        </div>
        <div class="life01 clearfix">
            <h2>キャンパスライフ</h2>
            <?php
            $args = array(
                'category_name' => 'blog',
                'posts_per_page' => 4,
                'order' => 'DESC',
                'orderby' => 'date',
            );

            $query = new WP_Query($args);

            while ($query->have_posts()):
                $query->the_post();

                $content = get_the_content();
                $thumbnail = get_thumbnail($content);
                ?>
                <div class="cell">
                    <div class="date">
                        <?php echo get_the_date(); ?>
                    </div>
                    <?php if ($thumbnail): ?>
                        <div class="image image1 text-center">
                            <img src="<?php echo $thumbnail ?>" alt="sumbnail" />
                        </div>
                    <?php else: ?>
                        <div class="image text-center">
                            <br><br>
                            no image
                        </div>
                    <?php endif; ?>
                    <div class="title">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="text">
                        <?php echo the_excerpt(); ?>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
        </div>
        <div class="link_archive">
            <a href="<?php echo home_url('category/blog'); ?>">
                &gt;記事一覧はこちら
            </a>
        </div>
        <div class="life02">
            <h2>年間行事</h2>
            <?php
            $event_list = array(
                4 => array(
                    array('入学式', '新入生オリエンテーション', '前期授業スタート', 'バーベキュー大会'),
                    array('進路面談スタート', '企業説明会＆就職フェア開催'),
                ),
                5 => array(
                    array('健康診断'),
                    array('健康診断', 'バーベキュー大会'),
                ),
                6 => array(
                    array('個人面談スタート'),
                    array('校内進学説明会'),
                ),
                7 => array(
                    array('前期期末試験', 'プレゼン大会', '前期授業終了'),
                    array('前期期末試験', 'プレゼン大会', '前期授業終了'),
                ),
                8 => array(
                    array('夏休み'),
                    array('夏休み'),
                ),
                9 => array(
                    array('後期授業スタート'),
                    array('後期授業スタート', '校内進学説明会（2回目）'),
                ),
                10 => array(
                    array('文化祭'),
                    array('文化祭'),
                ),
                11 => array(
                    array('校内システムコンテスト'),
                    array('校内システムコンテスト'),
                ),
                12 => array(
                    array('クリスマスパーティー', '冬休み'),
                    array('クリスマスパーティー', '冬休み'),
                ),
                2 => array(
                    array('後期期末試験'),
                    array('後期期末試験'),
                ),
                3 => array(
                    array('後期授業終了', '春休み'),
                    array('卒業制作発表会', '卒業イベント', '卒業式'),
                ),
            );
            ?>
            <?php
            for ($i = 0; $i < 12; $i++):
                $m = ($i + 3 ) % 12 + 1;
                ?>
                <table class="month">
                    <tr>
                        <th>
                    <div class="title"><?php echo $m; ?>月</div>
                    <?php if(FALSE): ?>
                    <div class="link-icon"><a href="<?php echo home_url('category/movie/0000/' . $m); ?>"><i class="fa fa-youtube-play"></i></a></div>
                    <?php endif; ?>
                    <div class="link-icon"><a href="<?php echo home_url('category/blog/0000/' . $m); ?>"><i class="fa fa-comment fa-flip-horizontal"></i></a></div>
                    </th>
                    </tr>
                    <?php if (!empty($event_list[$m])): ?>
                        <tr>
                            <td class="grade01">
                                <div class="grade">1年生</div>
                                <?php
                                foreach ($event_list[$m][0] as $event) {
                                    echo '<div class="event">' . $event . "</div>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="grade02">
                                <div class="grade">2年生</div>
                                <?php
                                foreach ($event_list[$m][1] as $event) {
                                    echo '<div class="event">' . $event . "</div>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="image1 image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/support/campuslife/life_m<?php echo sprintf('%02d', $m) ?>.png">
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td class="image1 month-empty">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/support/campuslife/picture_00.png">
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
                <?php
            endfor;
            ?>
        </div>
    </div>
    <?php
    get_template_part('parts/sidebar/support');
    ?>
</div>
<?php
get_footer();


