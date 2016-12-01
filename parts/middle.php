<div class="breadcrumbs">
    <?php
    if (function_exists('bcn_display')) {
	bcn_display();
    }
    ?>
</div>
<?php
if (have_posts()):
    while (have_posts()) : the_post();
	?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <div><?php the_content(); ?></div>
	    <div class="post-meta">
		<div class="date"><?php echo get_the_date(); ?></div>
		<div class="category"><?php the_category(','); ?></div>
	    </div>
	</div>
	<?php
    endwhile; // 繰り返し処理終了
endif;
?>

