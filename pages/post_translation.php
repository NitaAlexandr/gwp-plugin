<?php
/**
 * Created by PhpStorm.
 * User: anita
 * Date: 5/14/15
 * Time: 3:30 PM
 */

echo 'Post Translation Page';



$args = array(
    'public'   => true,
);
$post_types = get_post_types($args, 'names');
unset($post_types['attachment']);
gwp_print($post_types);

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
