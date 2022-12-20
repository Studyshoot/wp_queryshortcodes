<?php
add_shortcode('wp-varquery', ' wp_queryshortcodes');
function  wp_queryshortcodes($atts)
{

    ob_start();
    extract(shortcode_atts(array(
        'type' => array(
            'post',
            'articles',
            'shop',
            'news',
            'emails',
        ) ,
        'order' => '',
        'per_page' => '',
        'page' => '',
        'category' => '',
        'status' => '',
        'orderby' => '',
    ) , $atts));
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'per_page' => $page,
        'category_name' => $category,
        'post_status' => $status,
        'orderby' => $orderby,
        'category_name' => $category,
    );
    $query = new WP_Query($options);
    if ($query->have_posts())
    { ?>
        <?php while ($query->have_posts()):
            $query->the_post(); ?>
             <a href="<?php the_permalink();?>"><?php the_title(); ?></a>


<?php
        endwhile;
        wp_reset_postdata();
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

//See the output file
