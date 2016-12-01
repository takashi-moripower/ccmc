<div id="sidebar" class="middle-right">
    <?php
    wp_nav_menu(array(
	'theme_location' => 'side-nav01',
	'menu' => 'side nav school',
	'container' => '',
	'menu_class' => '',
	'items_wrap' => '<div class="side-nav01"><ul>%3$s</ul></div>'));
    ?>
    <?php
    wp_nav_menu(array(
	'theme_location' => 'side-nav01',
	'menu' => 'side nav admission',
	'container' => '',
	'menu_class' => '',
	'items_wrap' => '<div class="side-nav01"><ul>%3$s</ul></div>'));
    ?>
    <?php
    get_template_part('parts/sidebar/banner-list');
    ?>
</div>
