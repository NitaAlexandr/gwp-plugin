<?php
/**
 * Date: 5/14/15
 * Time: 6:14 PM
 */

function gwp_set_site_languages()
{
    wp_send_json($_POST);
//    wp_die();
}
add_action( 'wp_ajax_gwp_set_site_languages', 'gwp_set_site_languages' );