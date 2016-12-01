<?php
remove_filter('the_content', 'wpautop');
get_header();

$sidebar = search_sidebar();
if (empty($sidebar)) {
    $sidebar = 'parts/sidebar/default';
}
?>
<div id="middle" class="clearfix">
    <div class="inner middle-left">
	<?php
	if (have_posts()):
	    the_post();

	    get_template_part('parts/keyvisual');
	    ?>
    	<div class="breadcrumbs">
		<?php
		if (function_exists('bcn_display')) {
		    bcn_display();
		}
		?>
    	</div>
	    <?php
	    ?>
    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	    <div><?php the_content(); ?></div>
    	</div>
	    <?php
	endif;
	?>    
    </div>
    <?php
    get_template_part($sidebar);
    ?>
</div>
<?php
get_footer();


