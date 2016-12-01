<?php
$cat_list = get_the_category();


if (isset( $cat_list[0] )) {
    get_template_part('single/default');
} else {
    $cat = $cat_list[0]->slug;

    if (get_template_file('single/' . $cat . '.php')) {
        get_template_part('single/' . $cat);
    } else {
        get_template_part('single/default');
    }
}