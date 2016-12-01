<?php
/*
  Template Name: redirect
 */

if (have_posts()) {
    the_post();
    $slug = get_the_content();
}else{
    $slug = 'top';
}
$location = home_url($slug);
wp_redirect($location, 301);
exit;

