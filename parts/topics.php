<?php
$topics_category = get_query_var( 'topics_category' );
$args = array(
    'category_name' => $topics_category,
    'posts_per_page' => 5
);
$loop_topics = new WP_Query($args);
?>
<div class="topics">
    <h2>TOPICS</h2>
    <?php
    if ($loop_topics->have_posts()):
	while ($loop_topics->have_posts()):
	    $loop_topics->the_post();
	    ?>

	    <div class="cell">
		<h3 class="title">
		    <a href="<?php echo get_permalink(); ?>">
			<?php the_title(); ?>
		    </a>
		</h3>
		<div class="content">
		    <?php the_content(); ?>
		</div>
		<div class="post-meta clear">
		    <div class="date">
			<?php echo get_the_date(); ?>
		    </div>
		    <div class="category">
			<?php the_category(','); ?>
		    </div>
		</div>
	    </div>
	<?php endwhile; ?>
    <?php endif; ?>
</div>