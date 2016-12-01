<?php
/*
 * Search template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Wasedabunri
 * @since Wasedabunri 1.0
 */
get_header('');
?>
<div id="middle" class="clearfix">
        <div class="inner middle-left">
                <?php
                $allsearch = & new WP_Query("s=$s&posts_per_page=-1");
                $key = wp_specialchars($s, 1);
                $count = $allsearch->post_count;
                ?>
                <?php if (have_posts()) : ?>
                        <h3>検索結果</h3>
                        <p><strong><?php echo $key; ?></strong>で検索した結果、<?php echo $count; ?>件の記事が見つかりました。</p>

                        <?php
                        if (have_posts()):
                                while (have_posts()) : the_post();
                                        ?>
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <div><?php the_excerpt(); ?></div>
                                                <div class="post-meta">
                                                        <div class="date"><?php echo get_the_date(); ?></div>
                                                        <div class="category"><?php the_category(','); ?></div>
                                                </div>
                                        </div>
                                        <?php
                                endwhile; // 繰り返し処理終了
                        endif;
                        ?>

                </div>

                <?php echo get_template_part('parts/archive-pager') ?>
        <?php else: ?>
                <div id="nav-below" class="navigation">
                        <p><strong><?php echo $key; ?></strong>で検索した結果、関連する記事は見つかりませんでした</p>
                </div>
        <?php endif; ?>
</div><!-- #primary -->
<?php
get_footer();

