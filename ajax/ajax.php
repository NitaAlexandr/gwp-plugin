<?php
/**
 * Date: 5/14/15
 * Time: 6:14 PM
 */

function gwp_set_site_languages()
{
    print_r($_POST);
    die();
}
add_action( 'wp_ajax_gwp_set_site_languages', 'gwp_set_site_languages' );