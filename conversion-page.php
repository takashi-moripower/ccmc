<?php
/*
Template Name: conversion-page
*/
?><?php
remove_filter('the_content', 'wpautop');
get_header();

$sidebar = search_sidebar();
if (empty($sidebar)) {
    $sidebar = 'parts/sidebar/default';
}
?>
<div id="middle" class="clearfix">
    <div class="inner middle-left">
	<?php
	if (have_posts()):
	    the_post();

	    get_template_part('parts/keyvisual');
	    ?>
    	<div class="breadcrumbs">
		<?php
		if (function_exists('bcn_display')) {
		    bcn_display();
		}
		?>
    	</div>
	    <?php
	    ?>
    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	    <div><?php the_content(); ?></div>
    	</div>
	    <?php
	endif;
	?>    
    </div>
    <?php
    get_template_part($sidebar);
    ?>
</div>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000317623;
    var yahoo_conversion_label = "rb6RCKuv1WkQ6Nm7oQM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/1000317623/?value=0&label=rb6RCKuv1WkQ6Nm7oQM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000317460;
    var yahoo_conversion_label = "BwtzCOaUzWkQx_K7oQM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/1000317460/?value=0&label=BwtzCOaUzWkQx_K7oQM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>
<?php
get_footer();


