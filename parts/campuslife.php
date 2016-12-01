<?php
$month = get_query_var('lifemovie_month');
$year = get_query_var('lifemovie_year');

$args = array(
    'category_name' => 'movie',
    'posts_per_page' => 5,
    'monthnum' => $month,
    'year ' => $year,
    'order'=>'ASC',
    'orderby'=>'date',
);
$loop_life = new WP_Query($args);

if (!$loop_life->have_posts()) {
    ?>
    <div class="life02">
        <h3><?php echo $month ?>月の動画はありません</h3>
    </div>
    <?php
    return;
}
?>
<div class="life02">
    <h3>
	<?php echo $month;?>月のできごと
	<a href="<?php echo get_home_url().'/category/movie/'.$year.'/'.$month;?>" class="link_archive">
	    &gt; 一覧
	</a>
    </h3>
    <?php
    while ($loop_life->have_posts()):
	$loop_life->the_post();
    
	$content = get_the_content();

	// content の中からurlを抽出
	if( preg_match_all('(https?://[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)' ,$content , $url_list ) == 0 ){
	    continue;
	}
	
	// url群の中からyoutubeIDを抽出
	$youtube_id = NULL;
	foreach( $url_list as $url ){
	    $youtube_id = get_youtube_id($url[0]);
	    if( !empty( $youtube_id )){	break;   }
	}
	if( empty( $youtube_id ) ){ continue;	}
    
	?>

        <div class="cell clearfix">
    	<div class="image">
	    <img src="http://img.youtube.com/vi/<?php echo $youtube_id;?>/default.jpg" alt="movie sumbnail" />
    	</div>
    	<div class="title">
    	    <a href="<?php echo get_permalink(); ?>">
		    <?php the_title(); ?>
    	    </a>
    	</div>
	    <div class="date">
		<?php echo get_the_date();  ?>
	    </div>
        </div>
    <?php endwhile; ?>
</div>