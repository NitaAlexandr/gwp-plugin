<?php
/**
 * Date: 5/14/15
 * Time: 6:14 PM
 */

function gwp_set_site_languages()
{
    if(isset($_POST['languages']) || !empty($_POST['languages']))
    {
        global $locale,$all_languages;

        $new_langs = array();
        foreach($_POST['languages'] as $post_lang)
        {
            if(array_key_exists($post_lang['value'],$all_languages))
                $new_langs[$post_lang['value']] = $all_languages[$post_lang['value']];
        }

        update_option("gwp-site-language",$new_langs,false);

        wp_send_json_success(array($_POST['languages'],$all_languages,$new_langs));
    }
    else
    {
        wp_send_json_error("No language was set");
    }

    wp_die();
}
add_action( 'wp_ajax_gwp_set_site_languages', 'gwp_set_site_languages' );