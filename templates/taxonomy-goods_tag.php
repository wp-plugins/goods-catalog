<?php
/*
 * Template: Tag page
 */

get_header();
echo '<div class="goods-catalog-container">';
load_template(dirname(__FILE__) . '/sidebar-goods.php');

$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>
<div class="goods-catalog">
    <div class="catalog-inner">
        <div class="breadcrumbs">
            <?php
            if (!is_search() || !is_404()) {
                global $post;
                if ($post != null) {
                    gc_breadcrumbs($post->post_parent);
                } else {
                    gc_breadcrumbs();
                }
            } else {
                print ' ';
            }
            ?>
        </div>
        <?php
        global $posts;
        $post = $posts[0];

        ob_start();

        echo '<h2 class="single-category-title">' . single_cat_title('', false) . '</h2>';

        load_template(dirname(__FILE__) . '/loop-grid.php');
        ?>
        <div class="navigation">
            <?php
            // Display navigation to next/previous pages when applicable
            if (function_exists('goods_pagination'))
                goods_pagination();
            else
                posts_nav_link();
            ?>
        </div>
    </div>
</div>
<?php
echo '<div class="clear"></div>'; // fix for some themes
echo '</div>'; // goods-catalog-container
get_footer();
