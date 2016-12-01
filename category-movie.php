<?php
get_header();

//$category = get_the_category()[0];
$temp = get_the_category();
$category = isset($temp[0]) ? $temp[0] : NULL ;

$category_config = array(
    'movie' => array(
	'kv' => get_template_directory_uri() . '/images/kv/movie.png',
	'sidebar' => '/parts/sidebar/support',
    ),
);
$config = $category_config['movie'];

?>
<!--
CATEGORY CAMPASMOVIE
-->

<div id="middle" class="clearfix">
    <div class="inner middle-left">
	<div class="inner">
	    <div class="keyvisual">
		<img src="<?php echo $config['kv']; ?>" alt="keyvisual <?php echo $category->name; ?>" >
		<div class="text">
		    <h1>キャンパスムービー</h1>
		</div>
	    </div>	    

	    <div class="breadcrumbs">
		<?php
		if (function_exists('bcn_display')) {
		    bcn_display();
		}
		?>
	    </div>
                <p>
                        学校の様子などを動画で紹介します。<br>
                        現在制作中でございます。
                </p>
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
		'category_name' => 'movie',
                'post_status'=>'publish',
		'nopaging' => true
	    );

	    $query = new WP_Query($args);
	    $years = array();

	    while ($query->have_posts()) {
		$query->the_post();
		$years[get_the_date('Y')] += 1;
	    }
	    ?>
	    <h2>過去のキャンパスムービー</h2>
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

