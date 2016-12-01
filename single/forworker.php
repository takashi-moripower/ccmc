<?php
wp_enqueue_style('forworker', get_template_directory_uri() . '/css/pages/forworker.css');

get_header();

$kv = get_template_directory_uri() . '/images/kv/forworker.png';
?>
<div id="middle" class="clearfix">
    <div class="inner middle-left">
	<div class="inner">
	    <div class="keyvisual">
		<img src="<?php echo $kv; ?>" alt="keyvisual 社会人講座" >
		<div class="text">
		    <h1>社会人講座</h1>
		</div>
	    </div>
	    <div class="breadcrumbs">
		<?php
		if (function_exists('bcn_display')) {
		    bcn_display();
		}
		?>
	    </div>
	    <h2><?php the_title(); ?></h2>
	    <div id="post-<?php the_ID(); ?>" <?php post_class('forworker01'); ?>>
		<?php
		set_query_var('loop_fw', $wp_query);
		set_query_var('fw_notitle', true);
		get_template_part('parts/forworker-table');
		?>
		<div><?php the_content(); ?></div>
	    </div>
	</div>
	<div class="caption">
	    <a href="<?php echo home_url('forworker/request'); ?>">
		社会人講座の<br>お申し込み方法
	    </a>
	</div>
    </div>
    <?php get_template_part('parts/sidebar/forworker'); ?>
</div>
<?php
get_footer();

