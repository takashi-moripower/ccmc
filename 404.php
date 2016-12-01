<?php

get_header();

$sidebar = search_sidebar();
if (!empty($sidebar)) {
    $middle_class = 'middle-left';
} else {
    $middle_class = 'middle-all';
}
?>
<div id="middle" class="clearfix">
    <div class="inner <?php echo $middle_class; ?>">
	<h2>Page not found</h2>
	<p>
	    指定されたページは存在しません。
	</p>
	<ul class="list-style03">
	    <li>
		<a href="<?php echo home_url();?>">
		    TOP PAGE
		</a>
	    </li>
	    <li>
		<a href="<?php echo home_url('category/topics');?>">
		    最新のお知らせ
		</a>
	    </li>
	    <li>
		<a href="<?php echo home_url('sitemap');?>">
		    サイトマップ
		</a>
	    </li>
	</ul>
    </div>
</div>
<?php
get_footer();

