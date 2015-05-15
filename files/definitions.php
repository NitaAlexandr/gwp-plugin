<?php
/**
 * Date: 5/14/15
 * Time: 2:25 PM
 */

// default current language code
if(get_option('GWP_CURRENT_LANGUAGE') != false)
    define('GWP_CURRENT_LANGUAGE',get_option('GWP_CURRENT_LANGUAGE'));

define('GWP_PAGES_PATH',GWP_PATH.'pages/');
define('GWP_FILES_PATH',GWP_PATH.'files/');
define('GWP_FOLDER_NAME','gwp');

