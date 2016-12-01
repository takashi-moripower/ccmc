<?php
get_header();

$sidebar_list = array(
    'movie' => 'support',
    'result' => 'path',
    'topics' => 'default',
    'forworker' => 'forworker',
);

$category_list = get_the_category();

if (empty($category_list[0]->slug)) {
        $sidebar = 'default';
} else {
        $sidebar = $sidebar_list[$category_list[0]->slug];
}
?>
<div id="middle" class="clearfix">
        <div class="inner middle-left">
<?php get_template_part('parts/middle'); ?>
        </div>
                <?php get_template_part('parts/sidebar/' . $sidebar); ?>
</div>
        <?php
        get_footer();

        