<?php

register_nav_menu('header-nav01', 'ヘッダーナビゲーション');
register_nav_menu('footer-nav01', 'フッターナビゲーション');
register_nav_menu('side-nav01', 'サイドナビゲーション');

if (!function_exists('_log')) {

	function _log($message) {
		if (WP_DEBUG === true) {
			if (is_array($message) || is_object($message)) {
				error_log(print_r($message, true));
			} else {
				error_log($message);
			}
		}
	}

}
/**
 * contact form 7 メール送信前に文字コード指定
 */
add_filter('wpcf7_before_send_mail', 'my_wppcf7_before_send_mail', 1, 1);

function my_wppcf7_before_send_mail($cf7) {
	mb_language("Japanese");
	return $cf7;
}

/*
 *  get_permalink_by_slug
 *  in:$slug
 *  スラッグからurlを取得
 */

function get_permalink_by_slug($slug) {
	$page = get_page_by_path($slug);
	return get_permalink($page->ID);
}

/*
 *  get_template_file
 *  in:filename
 *  テンプレート内のファイルを検索、
 *  存在したらフルパスを、存在しなかったらNULLを返す
 */

function get_template_file($filename) {
	$path1 = get_template_directory() . '/' . $filename;
	$path2 = get_template_directory_uri() . '/' . $filename;
	if (is_file($path1)) {
		return $path2;
	}
	return NULL;
}

function search_template_files($id, $prefix, $suffix, $single = true) {

	function serach_template_files_sub01($id, $prefix, $suffix) {
		$slug = get_page_uri($id);
		$filename = $prefix . $slug . $suffix;
		return get_template_file($filename);
	}

	$result = array();
	$ancestors = get_ancestors($id, 'page');


	$file = serach_template_files_sub01($id, $prefix, $suffix);
	if ($file) {
		$result[] = $file;
	}

	if (!empty($ancestors)) {
		foreach ($ancestors as $ancestor_id) {
			$file = serach_template_files_sub01($ancestor_id, $prefix, $suffix);
			if ($file) {
				$result[] = $file;
			}
		}
	}

	if (empty($result)) {
		return NULL;
	}
	if ($single) {
		return $result[0];
	}
	return $result;
}

/*
 *  enqueue_page_script
 *  in:id
 *  page idからslugを取得し、slugと同じ名前のcss,jsが存在したら
 *  読み込みリストに追加
 */

function enqueue_page_script($id) {
	$slug = get_page_uri($id);
	$css = get_template_file('css/pages/' . $slug . '.css');
	if ($css) {
		wp_enqueue_style($slug, $css, array('style'));
	}

	$js = get_template_file('js/pages/' . $slug . '.js');
	if ($js) {
		wp_enqueue_script($slug, $js, array('jquery'));
	}
}

/*
 *  kv_func
 *  何もしない、[kv]～[/kv]間を表示させないためのダミー
 *  実際はテンプレート内で表示処理している
 */

function kv_func() {
	return NULL;
}

add_shortcode('kv', 'kv_func');

/*
 * search_sidebar
 * 適当なサイドバーを検索
 */

function search_sidebar() {
	global $post;

	if (!is_page()) {
		return NULL;
	}

	function search_sidebar2($id) {
		$slug = get_page_uri($id);
		$partsname = 'parts/sidebar/' . $slug;
		$filename = $partsname . '.php';
		$sidebar = get_template_file($filename);
		if ($sidebar) {
			return $partsname;
		} else {
			return NULL;
		}
	}

	$sidebar = search_sidebar2($post->ID);
	if ($sidebar) {
		return $sidebar;
	}

	if ($post->post_parent) {
		foreach ($post->ancestors as $id) {
			$sidebar = search_sidebar2($id);
			if ($sidebar) {
				return $sidebar;
			}
		}
	}
	return NULL;
}

/*
 *  breadcrumbs_func
 *  パンくずリスト表示
 */

function breadcrumbs_func() {
	if (function_exists('bcn_display')) {
		$list = bcn_display(true);
	}
	return '<div class="breadcrumbs">' . $list . '</div>';
}

add_shortcode('breadcrumbs', 'breadcrumbs_func');

/*
 *  lifemovie_func
 *  キャンパスライフムービー　月毎リストの表示
 */

function lifemovie_func($atts) {
	extract(
			shortcode_atts(array('month' => 4, 'year' => date('Y')), $atts)
	);

	set_query_var('lifemovie_year', $year);
	set_query_var('lifemovie_month', $month);

	ob_start();
	get_template_part('parts/campuslife');
	$result = ob_get_contents();
	ob_end_clean();

	return $result;
}

add_shortcode('lifemovie', 'lifemovie_func');

/*
 *  forworker_func
 *  社会人講座　リストの表示
 */

function forworker_func($atts) {
	extract(
			shortcode_atts(array('type' => 1), $atts)
	);

	set_query_var('forworker_type', $type);

	ob_start();
	get_template_part('parts/forworker');
	$result = ob_get_contents();
	ob_end_clean();

	return $result;
}

add_shortcode('forworker', 'forworker_func');


/*
 *  カテゴリ　forworker　で type絞り込み検索に対応
 */
add_action('pre_get_posts', 'category_forworker_type');

function category_forworker_type($wp_query) {

	/*
	 * メインクエリー　かつ　カテゴリ指定　かつ　forworkerカテゴリ
	 * でなければ何もせずreturn
	 */

	if (!$wp_query->is_main_query()) {
		return;
	}
	if (!$wp_query->is_category('forworker')) {
		return;
	}




	/*
	 * デフォルトのソート順を募集開始日　降順　に設定
	 */

	if (!isset($wp_query->query_vars['orderby'])) {
		$wp_query->query_vars['orderby'] = 'meta_recruit_start';
	}
	if (!isset($wp_query->query_vars['order'])) {
		$wp_query->query_vars['order'] = 'DESC';
	}
	$meta = array(
		'relation' => 'AND',
		'meta_recruit_start' => array(
			'key' => 'date_recruit_start'
		)
	);

	/*
	 * GETデータにタイプ指定があった場合、queryに條件追加
	 */
	if (isset($_GET['type'])) {
		$type = $_GET['type'];
		$meta['meta_type'] = array(
			'key' => 'type',
			'value' => $type
		);
	}

	$wp_query->set('meta_query', $meta);


	if (isset($_GET['type'])) {
		$type = $_GET['type'];
		$meta = array(
			'meta_type' => array(
				'key' => 'type',
				'value' => $type,
			)
		);
		$wp_query->set('meta_query', $meta);
	}
}

/*
 *  月別カテゴリアーカイブ表示処理
 */

function extend_date_archives_flush_rewrite_rules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

add_action('init', 'extend_date_archives_flush_rewrite_rules');

function extend_date_archives_add_rewrite_rules($wp_rewrite) {
	$rules = array();
	$structures = array(
		$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_date_permastruct(),
		$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_month_permastruct(),
		$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_year_permastruct(),
	);
	foreach ($structures as $s) {
		$rules += $wp_rewrite->generate_rewrite_rules($s);
	}
	$wp_rewrite->rules = $rules + $wp_rewrite->rules;
}

add_action('generate_rewrite_rules', 'extend_date_archives_add_rewrite_rules');

function wp_get_cat_archives($opts, $cat) {
	$args = wp_parse_args($opts, array('echo' => '1')); // default echo is 1.
	$echo = $args['echo'] != '0'; // remember the original echo flag.
	$args['echo'] = 0;
	$args['cat'] = $cat;

	$archives = wp_get_archives(build_query($args));
	$archs = explode('</li>', $archives);
	$links = array();

	$cat0 = get_the_category();
	$cat_slug = $cat0[0]->category_nicename;

	foreach ($archs as $archive) {
		$link = preg_replace("/\/date\//", "/category/{$cat_slug}/date/", $archive);
		array_push($links, $link);
	}
	$result = implode('</li>', $links);

	if ($echo) {
		echo $result;
	} else {
		return $result;
	}
}

/*
 *  /月別カテゴリアーカイブ表示処理 end
 */


/*
 *  「続きを読む」をカスタマイズするためのコード
 */

function my_excerpt_more($post) {
	return '... <a href="' . get_permalink($post->ID) . '">' . ' 続きを読む' . '</a>';
}

// 抜粋（the_excerpt()）を適当な文字数でカットして表示するコード
function my_trim_all_excerpt($text = '', $cut = 80) {
	global $post;
	$raw_excerpt = $text;
	if ('' == $text) {
		$text = get_the_content('');
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
	}
	$excerpt_mblength = apply_filters('excerpt_mblength', $cut);
	$excerpt_more = my_excerpt_more($post);
	$text = wp_trim_words($text, $excerpt_mblength, $excerpt_more);

	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

// the_excerpt()にフィルターをかけるコード
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'my_trim_all_excerpt');

/*
 *  投稿のサムネイル自動取得
 */

function get_thumbnail($content) {
	$thumbnail_youtube = get_thumbnail_youtube($content);
	if ($thumbnail_youtube) {
		return $thumbnail_youtube;
	}

	$thumbnail_img = get_thumbnail_img($content);
	if ($thumbnail_img) {
		return $thumbnail_img;
	}

	return NULL;
}

function get_thumbnail_youtube($content) {
	// content の中からurlを抽出
	if (preg_match_all('(https?://www.youtube.com[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)', $content, $url_list) == 0) {
		return NULL;
	}

	// url群の中からyoutubeIDを抽出
	$youtube_id = NULL;
	foreach ($url_list as $url) {
		$youtube_id = get_youtube_id($url[0]);
		if ($youtube_id) {
			return 'http://img.youtube.com/vi/' . $youtube_id . '/default.jpg';
		}
	}
	return NULL;
}

/*
 *  urlからyoutubeIDを抽出　見つからなければNULL
 */

function get_youtube_id($url) {
	$u = parse_url($url);

	parse_str($u['query'], $queryVars);

	if ($u['query'] && $queryVars['v']) {
		return $queryVars['v'];
	} else if ($u['fragment']) {
		return $u['fragment'];
	} else if ($u['path']) {
		return basename($u['path']);
	}

	return NULL;
}

function get_thumbnail_img($content) {
	if (preg_match_all('/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $content, $matches) == 0) {
		return NULL;
	}

	return $matches[1][0];
}
