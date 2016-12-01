<?php
$type = get_query_var('forworker_type');
$args = array(
    'category_name' => 'forworker',
    'posts_per_page' => 5,
    'order' => 'DESC',
    'orderby' => 'meta_recruit_start',
    'meta_query' => array(
	'meta_type' => array(
	    'key' => 'type',
	    'value' => $type
	),
	'meta_recruit_start' => array(
	    'key' => 'date_recruit_start'
	)
    )
);
$loop_fw = new WP_Query($args);

if (!$loop_fw->have_posts()) {
    ?>
    <div class="forworker01">
        <h3>type[<?php echo $type; ?>] の講座情報はありません</h3>
    </div>
    <?php
    return;
}
?>
<div class="forworker01">
    <h3>
	<?php echo $type; ?>　最新情報
	<a href="<?php echo home_url('category/forworker/?type=' . $type); ?>" class="link_archive">
	    &gt; 一覧
	</a>
    </h3>
    <?php
    set_query_var('loop_fw', $loop_fw);
    get_template_part('parts/forworker-table');
    ?>
</div>