<?php
$args = array(
    'category_name' => 'movie',
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'date'
);


$query_movie = new WP_Query($args);

if (!$query_movie->have_posts()) {
    return;
}

while ($query_movie->have_posts()) {
    $query_movie->the_post();

    $src = get_thumbnail_youtube(get_the_content());
    if ($src):
	?>
	<a href="<?php the_permalink(); ?>">
	    <img src ="<?php echo $src ?>" alt="<?php echo get_the_title(); ?>">
	</a>
	<?php
    endif;
}