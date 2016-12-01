<?php
remove_filter('the_content', 'wpautop');
wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . "/js/jquery.bxslider/jquery.bxslider.js", array('jquery'));
wp_enqueue_script('imagesloaded', get_stylesheet_directory_uri() . "/js/imagesloaded.pkgd.min.js", array('jquery'));

get_header();
?>
<div id="fb-root"></div>
<div id="middle" class="clearfix">
    <div id="slider">
        <div class="slide-part">
            <a href="<?php echo home_url('admission/guidance/application/'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_slide04.png" alt="体験授業申し込み">
            </a>
        </div>
        <div class="slide-part">
            <a href="<?php echo home_url('admission/guidance/#AO'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_slide05.png" alt="AO入試">
            </a>
        </div>
        <div class="slide-part">
            <a href="<?php echo home_url('course/it-web'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_slide01.png" alt="IT・Web学科">
            </a>
        </div>
        <div class="slide-part">
            <a href="<?php echo home_url('course/business'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_slide02.png" alt="ビジネスデザイン学科">
            </a>
        </div>
        <div class="slide-part">
            <a href="<?php echo home_url('course/it-pro'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_slide03.png" alt="ITプロフェッショナル学科">
            </a>
        </div>
    </div>
    <div class="inner middle-all">
        <div class="top02 clearfix">
            <div class="title">Course</div>
            <a href="<?php echo home_url('course/it-web'); ?>">
                <div class="cell course01">
                    <div class="image image1">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_course01.png" alt="ITWeb学科">
                    </div>
                    <div class="title">
                        IT・Web学科
                        <div class="subtitle">
                            2年制／入学定員70名(男女）
                        </div>
                    </div>
                    <div class="message">
                        IT業界と連携して、情報システム・ITの基礎からWeb技術の応用までを学び、実践的なスキルを備えたIT人材を育成		    
                    </div>
                </div>
            </a>
            <a href="<?php echo home_url('course/business'); ?>">
                <div class="cell course02">
                    <div class="image image1">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_course02.png" alt="ビジネスデザイン学科">
                    </div>
                    <div class="title">
                        ビジネスデザイン学科
                        <div class="subtitle">
                            2年制／入学定員50名(男女）
                        </div>
                    </div>
                    <div class="message">
                        ITスキルとともにビジネススキルやビジネスマインド（おもてなしの心と所作）を学び、ビジネスを成功に導く実践力のあるビジネス人材を育成
                    </div>
                </div>
            </a>
            <a href="<?php echo home_url('course/it-pro'); ?>">
                <div class="cell course03">
                    <div class="image image1">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_course03.png" alt="ITプロ学科">
                    </div>
                    <div class="title">
                        ITプロフェッショナル学科
                        <div class="subtitle">
                            4年制／入学定員20名(男女）
                        </div>
                    </div>
                    <div class="message">
                        ソフトバンクのサイバー大学と提携し、４年間の体系的カリキュラムで高度なIT技術者を育成。卒業時は「学士」と「高度専門士」の両方を取得
                    </div>
                </div>
            </a>
        </div>
        <div class="top03 clearfix">
            <div class="block-left">
				<?php
				set_query_var('topics_category', 'topics');
				get_template_part('parts/topics');
				?>

                <div class="facebook">
                    <div class="fb-page" data-href="https://www.facebook.com/%92%86%89%9B%8F%EE%95%F1%90%EA%96%E5%8Aw%8DZ-1578738322430448" data-tabs="timeline" data-width="500" data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/%92%86%89%9B%8F%EE%95%F1%90%EA%96%E5%8Aw%8DZ-1578738322430448"><a href="https://www.facebook.com/%92%86%89%9B%8F%EE%95%F1%90%EA%96%E5%8Aw%8DZ-1578738322430448">中央情報専門学校</a></blockquote></div></div>
                </div>
            </div>
            <div class="block-right banner-list">
                <div class="item">
                    <a href="<?php echo home_url('admission/guidance/#AO'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner11.png" alt="AO入試">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('admission/guidance/application'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner09.png" alt="体験授業申し込み">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('admission/request'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner02.png" alt="資料請求はこちらから">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('campus/access'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner03.png" alt="アクセス">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('course/japanese'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner05.png" alt="日本語本科">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('joboffer'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner04.png" alt="求人票ダウンロード">
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo home_url('school/practice'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner08.png" alt="職業実践専門課程">
                    </a>
                </div>
                <div class="item">
                    <a href="http://www.cyber-u.ac.jp/" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner06.png" alt="サイバー大学">
                    </a>
                </div>
                <div class="item">
                    <a href="http://www.ryugakuawards.org/" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner10.png" alt="日本留学アワーズ">
                    </a>
                </div>
				<?php if (false): ?>
					<div class="item">
						<a href="<?php echo home_url('school/information'); ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top/top_banner07.png" alt="学校基本情報">
						</a>
					</div>
				<?php endif ?>
                <div class="movie-list">
					<?php get_template_part('parts/thumbnail-movie'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

