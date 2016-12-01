<?php
$content = get_the_content();

/* 	[kv]～[/kv]の間の記述を抽出 */
$kv = preg_match('/\[kv\](.*)\[\/kv\]/su', $content, $result);

if (!$kv) {
    return;
}

$id = get_the_id();

$file = search_template_files($id, 'images/kv/', '.png');
if( empty($file) ){
    $file = get_template_file('images/kv/school.png');
}
?>
<div class="keyvisual">
    <img src="<?php echo $file; ?>" alt="keyvisual <?php echo get_the_title(); ?>" >
    <div class="text">
    <?php echo $result[1]; ?>
    </div>
</div>
