<?php
$category = get_query_var('category-recent');

$args = array(
    'cat' => $category->cat_ID,
    'posts_per_page' => 5,
    'order' => 'ASC',
    'orderby' => 'date'
);
$post_list = get_posts($args);

if( empty( $post_list ) ){  return; }

?>
<div class="category-recent">
    <h2>
	<?php echo $category->cat_name; ?>の最新記事
	<a href="<?php echo get_category_link( $category->term_id );?>">
	<div class="link_archive">一覧</div>
	</a>
    </h2>
    <ul>
	<?php
	foreach ($post_list as $post):
	    setup_postdata($post);
	    ?>
            <li>
    	    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
	    <?php
	endforeach;
	wp_reset_postdata();
	?>
    </ul>
</div>