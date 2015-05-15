<?php
/**
 * Date: 5/14/15
 * Time: 6:14 PM
 */

function gwp_set_site_languages()
{
    global $locale,$all_languages;
//    print_r($_POST['languages']);
    wp_send_json_success(array($_POST['languages'],$all_languages));
    wp_die();
}
add_action( 'wp_ajax_gwp_set_site_languages', 'gwp_set_site_languages' );