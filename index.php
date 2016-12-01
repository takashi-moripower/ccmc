<?php

get_header();

$middle_class = "middle-all";

?>
<div id="middle" class="<?php echo $middle_class; ?>">
    <div class="inner">
    <?php get_template_part('parts/middle'); ?>
    </div>
</div>
<?php
get_footer();

