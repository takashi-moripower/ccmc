<!DOCTYPE html>
<html>
    <head>
        <title>
			<?php
			if (get_query_var('paged')) {
				echo 'Page' . get_query_var('paged') . ' ';
			}
			wp_title('|', TRUE, 'right');
			?>
			<?php bloginfo('name'); ?>
        </title>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.png" type="image/png">
		<?php
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('awesome', "http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");

		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
		wp_enqueue_script('matchHeight', get_stylesheet_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'));
		wp_enqueue_script('header', get_stylesheet_directory_uri() . '/js/header.js', array('jquery', 'matchHeight'));


		if (is_page(array('inquiry', 'request', 'application','japanese','abroad'))) {
			//郵便番号検索
			wp_enqueue_script('ajaxzip3', "https://ajaxzip3.github.io/ajaxzip3.js");
			wp_enqueue_script('setajaxzip', get_stylesheet_directory_uri() ."/js/setajaxzip.js");
		}

		if (is_page()) {
			/*
			 * 自ページおよび祖先のページ名と同じ名前のcss,jsが存在したら自動で読み込む
			 * /course/it-web ページの場合
			 * 	    /css/pages/course.css 
			 * 	    /css/pages/course/it-web.css
			 * 	    /js/pages/course.js
			 * 	    /js/pages/course/it-web.js
			 * これらを読み込む
			 */

			global $post;

			if ($post->post_parent) {
				foreach ($post->ancestors as $id) {
					enqueue_page_script($id);
				}
			}

			$id = $post->ID;
			enqueue_page_script($id);
		}
		?>
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="headline"></div>
        <div id="header">
            <div class="header01">
                <h1 class="logo">
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header/logo.png" alt="中央情報専門学校">
                    </a>
                </h1>
                <ul class="header-nav02 clearfix only-pc">
                    <li>
                        <a href="<?php echo home_url('admission/request') ?>">
                            資料請求する
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('admission/guidance') ?>">
                            学校ガイダンスへ行こう！
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('school/access') ?>">
                            学校アクセス
                        </a>
                    </li>
                </ul>
                <div class="menu-button only-sp"><i class="fa fa-bars"></i></div>

                <div class="header-search only-pc">
					<?php get_search_form(); ?>
                </div>
				<div class="header-nav05">
					<div class="tel">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header/tel.png" alt="048-474-6651">
					</div>
					<div class="school-info">
						<a href="<?php echo home_url('school/information') ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header/school-info.png" alt="<?php bloginfo('description'); ?>">
						</a>
					</div>
				</div>
            </div>
            <div class="header02 only-pc">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-nav01',
					'menu' => 'header nav 01',
					'container' => '',
					'menu_class' => '',
					'items_wrap' => '<div class="header-nav01"><ul>%3$s</ul></div>'));
				?>
            </div>
            <div class="header03 only-sp">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-nav03',
					'menu' => 'sp nav 01',
					'container' => '',
					'menu_class' => '',
					'items_wrap' => '<div class="header-nav03"><div class="menu-close">close menu</div><ul>%3$s</ul></div>'));
				?>
            </div>
        </div>