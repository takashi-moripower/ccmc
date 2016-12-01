<?php

get_header();

$middle_class = "middle-all";

?>
<div id="middle"  class="clearfix" >
    <h1>archive</h1>
    <div class="inner <?php echo $middle_class; ?>" >
    <?php get_template_part('parts/middle'); ?>
    <?php get_template_part('parts/archive-pager'); ?>
    </div>
</div>
<?php
get_footer();

