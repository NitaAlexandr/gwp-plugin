<?php
/**
 * Date: 5/15/15
 * Time: 11:34 AM
 */

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

    global $post;
    $args = array(
        'public'   => true,
    );
    $post_types = get_post_types($args, 'names');
    unset($post_types['attachment']);


    $context = array('normal','advanced','side');
    $priority = array('high','core','default','low');

    foreach ( $post_types as $screen ) {

        add_meta_box(
            'gwp_translate_psot',
            __( 'Global WP', 'gwp' ),
            'gwp_post_meta_box_callback',
            $screen,
            $context[2],
            $priority[0],
            $post
        );
    }
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );



function gwp_post_meta_box_callback($parameters)
{
    if(defined('WPLANG'))
        gwp_print(WPLANG);
    else
                gwp_print('dashboard in english');

    gwp_print($parameters);
}