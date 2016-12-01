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

	    <?php if (!empty($wp_query->meta_query->queries['meta_type'])): ?>
    	    <h2><?php echo $wp_query->meta_query->queries['meta_type']['value']; ?></h2>
	    <?php endif; ?>
	    <div class="forworker01">
		<?php
		set_query_var('loop_fw', $wp_query);
		get_template_part('parts/forworker-table');
		?>
	    </div>

	    <?php get_template_part('parts/archive-pager'); ?>
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

