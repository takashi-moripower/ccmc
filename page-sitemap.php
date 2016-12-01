<?php
remove_filter('the_content', 'wpautop');
get_header();

$file = get_template_file('images/kv/school.png');
?>
<div id="middle" class="clearfix">
        <div class="inner middle-left">

                <div class="keyvisual">
                        <img src="<?php echo $file; ?>" alt="keyvisual <?php echo get_the_title(); ?>" >
                        <div class="text">
                                <h1>サイトマップ</h1>
                        </div>
                </div>
                <div class="breadcrumbs">
                        <?php
                        if (function_exists('bcn_display')) {
                                bcn_display();
                        }
                        ?>
                </div>

                <div class="clearfix">
                        <div class="block-left sitemap01">
                                <h2>Sitemap</h2>
                                <?php
                                wp_nav_menu(array(
                                    'menu' => 'footer nav 01',
                                    'container' => '',
                                    'menu_class' => '',
                                    'items_wrap' => '<ul>%3$s</ul>'));
                                ?>
                                <br>
                                <?php
                                wp_nav_menu(array(
                                    'menu' => 'footer nav 02',
                                    'container' => '',
                                    'menu_class' => '',
                                    'items_wrap' => '<ul>%3$s</ul>'));
                                ?>
                        </div>
                        <div class="block-right">
                                <?php
                                $args = NULL;
                                $category_list = get_categories($args);
                                foreach ($category_list as $category) {
                                        set_query_var('category-recent', $category);
                                        get_template_part('parts/category-recent');
                                }
                                ?>

                                <h2>サイト内検索</h2>
                                <?php get_search_form(); ?>
                        </div>
                </div>
        </div>
        <?php
        get_template_part('parts/sidebar/default');
        ?>
</div>
<?php
get_footer();


