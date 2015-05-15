<?php
/**
 * Date: 5/14/15
 * Time: 3:57 PM
 */

function gwp_print($content = '', $die=0)
{
    echo '<pre style="
max-height: 550px;
background-color: #000000;
color:greenyellow;
font-weight: bold;
padding: 5px 15px;
overflow: scroll;
">';
    print_r($content);
    echo '</pre>';

    if($die)
    {
        die();
    }
}