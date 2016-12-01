<?php
get_header();

$category_list = get_the_category();
$category = $category_list[0];

$category_config = array(
    'movie' => array(
        'kv' => get_template_directory_uri() . '/images/kv/movie.png',
        'sidebar' => '/parts/sidebar/support',
    ),
    'blog' => array(
        'kv' => get_template_directory_uri() . '/images/kv/support.png',
        'sidebar' => '/parts/sidebar/support',
    ),
    'result' => array(
        'kv' => get_template_directory_uri() . '/images/kv/result.png',
        'sidebar' => '/parts/sidebar/path',
    ),
    'default' => array(
        'kv' => get_template_directory_uri() . '/images/kv/school.png',
        'sidebar' => '/parts/sidebar/default',
    ),
);

if (empty($category_config[$category->slug])) {
        $config = $category_config['default'];
} else {
        $config = $category_config[$category->slug];
}
?>
<!--
CATEGORY DEFAULT
-->
<div id="middle" class="clearfix">
        <div class="inner middle-left">
                <div class="inner">
                        <div class="keyvisual">
                                <img src="<?php echo $config['kv']; ?>" alt="keyvisual <?php echo $category->name; ?>" >
                                <div class="text">
                                        <h1><?php echo $category->name; ?></h1>
                                </div>
                        </div>	    

                        <div class="breadcrumbs">
                                <?php
                                if (function_exists('bcn_display')) {
                                        bcn_display();
                                }
                                ?>
                        </div>
                        <?php
                        $prev_year = NULL;

                        if (have_posts()):
                                while (have_posts()) : the_post();

                                        $current_year = get_the_date('Y');
                                        if ($current_year != $prev_year):
                                                ?>
                                                <h2><i class="fa fa-calendar"></i> <?php echo $current_year; ?>年 の<?php echo $category->name; ?></h2>
                                                <?php
                                                $prev_year = $current_year;
                                        endif;

                                        $content = get_the_content();
                                        $thumbnail = get_thumbnail($content);
                                        ?>
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="clearfix">
                                                        <?php if ($thumbnail): ?>
                                                                <div class="thumbnail">
                                                                        <img src="<?php echo $thumbnail; ?>" alt="thumbnail <?php the_title(); ?>">
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php the_excerpt(); ?>
                                                </div>
                                                <div class="post-meta">
                                                        <div class="date"><?php echo get_the_date(); ?></div>
                                                        <div class="category"><?php the_category(','); ?></div>
                                                </div>
                                        </div>
                                        <?php
                                endwhile; // 繰り返し処理終了
                        endif;
                        ?>

                        <?php get_template_part('parts/archive-pager'); ?>

                        <?php
                        $args = array(
                            'category_name' => $category->slug,
                            'nopaging' => true
                        );

                        $query = new WP_Query($args);
                        $years = array();

                        while ($query->have_posts()) {
                                $query->the_post();

                                if (!isset($years[get_the_date('Y')])) {
                                        $years[get_the_date('Y')] = 0;
                                }
                                $years[get_the_date('Y')] += 1;
                        }
                        ?>
                        <h2>過去の<?php echo $category->name; ?></h2>
                        <ul class="list-style03">
                                <?php foreach ($years as $year => $count): ?>
                                        <li>
                                                <a href="<?php echo home_url('/category/' . $category->slug . '/' . $year); ?>"><?php echo $year; ?>年<?php echo $category->name; ?></a>
                                        </li>
                                <?php endforeach; ?>
                        </ul>
                </div>
        </div>
        <?php get_template_part($config['sidebar']); ?>
</div>
<?php
get_footer();

