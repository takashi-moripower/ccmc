<?php
$loop_fw = get_query_var('loop_fw');
$notitle = get_query_var('fw_notitle', false);

?>

<table>
    <?php
    while ($loop_fw->have_posts()):
	$loop_fw->the_post();

	$post_meta = get_post_custom();
	$recruit_start = strtotime($post_meta['date_recruit_start'][0]);
	$recruit_end = strtotime($post_meta['date_recruit_end'][0]);
	$train_start = strtotime($post_meta['date_train_start'][0]);
	$train_end = strtotime($post_meta['date_train_end'][0]);
	$now = time();

	$state = '募集中';
	if ($now < $recruit_start) {
	    $state = '募集予定';
	}
	if ($now > $recruit_end) {
	    $state = '応募終了';
	}
	if ($now > $train_end) {
	    $state = '訓練終了';
	}
	?>
        <tr>
    	<th>
		<?php if ($state == '募集中'): ?>
		    <span class="active">
			<?php echo $state; ?>
		    </span>
		<?php else: ?>
		    <?php echo $state; ?>
		<?php endif; ?>
    	</th>
    	<td>
		<?php if (!$notitle): ?>
		    <a href="<?php echo get_permalink(); ?>">
			<?php the_title(); ?>
		    </a>
		<?php endif; ?>
		<?php if ($state == '募集中' || $state == '募集予定' || $notitle): ?>
		    <div class="post-meta clearfix bg-lightblue">
			<div class="cell">
			    <div class="title">募集期間</div>
			    <?php echo date('Y年m月d日', $recruit_start); ?>～<?php echo date('Y年m月d日', $recruit_end); ?>
			    <br>
			    <div class="title">訓練期間</div>
			    <?php echo date('Y年m月d日', $train_start); ?>～<?php echo date('Y年m月d日', $train_end); ?><br>
			</div>
			<div class="cell">
			    <div class="title">対象者</div>
			    <?php echo $post_meta['target'][0]; ?>
			    <br>
			    <div class="title">定員</div>
			    <?php echo $post_meta['limit'][0]; ?>
			</div>
		    </div>
		<?php endif; ?>
    	</td>
        </tr>
    <?php endwhile; ?>
</table>
