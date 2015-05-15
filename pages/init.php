<?php
/**
 * Created by PhpStorm.
 * User: anita
 * Date: 5/14/15
 * Time: 2:31 PM
 */

global $all_languages;
$locale_language = get_locale();

gwp_print($all_languages);
gwp_print($locale_language);

?>


<div class="wrap gwp-page-area">
    <div id="poststuff">
            <div id="" class="postbox ">
                <div class="handlediv" title="Click to toggle"><br></div>
                <h3 class="hndle ui-sortable-handle"><span><?php _e('Set the languages for the site','gwp'); ?></span></h3>
                <div class="inside">
                    <form action="gwp_set_site_languages">

                        <?php
                        $star_point = 0;
                        $main_languages = 3;
                        foreach($all_languages as $id=>$data)
                        {
                            $style = '';
                            if($star_point < $main_languages)
                            {
                                $style = 'font-weight: bold';
                            }

                            $checked = $message = '';
                            if($locale_language == $id)
                            {
                                $checked = 'checked  disabled';
                                $message = '<i>('.__('Default WP Language','gwp').')</i>';
                            }


                            ?>
                            <input <?php echo $checked; ?> type="checkbox" name="site-languages" id="<?php echo $id; ?>" value="<?php echo $id; ?>"/>
                            <label style="<?php echo $style; ?>" for="<?php echo $id; ?>"><?php echo $data['name'].' '.$message; ?></label>&nbsp;|
                            <?php
                            $star_point++;
                        }
                        submit_button(__('Set languages','gwp'));
                        ?>
                    </form>
                </div>
            </div>



        <div id="" class="postbox ">
            <div class="handlediv" title="Click to toggle"><br></div>
            <h3 class="hndle ui-sortable-handle"><span><?php _e('Set shortcode/widget','gwp'); ?></span></h3>
            <div class="inside">
                <form action="gwp_set_language_switcher_shortcode">
                    <p><?php _e('Set the language selector structure for the SHORTCODE'); ?></p>
                    <input type="radio"  selected name="S_lang_struct" value="flag_only" id="S_flag_only"/>
                    <label for="S_flag_only"><?php _e('Flag only','gwp'); ?></label>&nbsp;|

                    <input type="radio"  name="S_lang_struct" value="text_only" id="S_text_only"/>
                    <label for="S_text_only"><?php _e('Text only','gwp'); ?></label>&nbsp;|

                    <input type="radio"  name="S_lang_struct" value="text_and_flag_only" id="S_text_and_flag_only"/>
                    <label for="S_text_and_flag_only"><?php _e('Flag and Text','gwp'); ?></label>&nbsp;|

                    <br/><label for="S_shortcode_structure"><?php _e('Set the structure','gwp') ?></label>
                    <select name="S_shortcode_structure" id="S_shortcode_structure">
                        <option selected value="list_vertical"><?php _e('Vertical List','gwp') ?></option>
                        <option selected value="list_horizontal"><?php _e('Horizontal List','gwp') ?></option>
                        <option value="dropdown"><?php _e('Dropdown','gwp') ?></option>
                    </select>

                    <?php
                    submit_button(__('Save','gwp'));
                    ?>
                </form>
            </div>
            <h3 class="hndle ui-sortable-handle"><span>&nbsp;</span></h3>
            <div class="inside">
                <form action="gwp_set_language_switcher_widget">
                    <p><?php _e('Set the language selector structure for the WIDGET'); ?></p>
                    <input type="radio"  selected name="W_lang_struct" value="flag_only" id="W_flag_only"/>
                    <label for="W_flag_only"><?php _e('Flag only','gwp'); ?></label>&nbsp;|

                    <input type="radio"  name="W_lang_struct" value="text_only" id="W_text_only"/>
                    <label for="W_text_only"><?php _e('Text only','gwp'); ?></label>&nbsp;|

                    <input type="radio"  name="lang_struct" value="text_and_flag_only" id="W_text_and_flag_only"/>
                    <label for="W_text_and_flag_only"><?php _e('Flag and Text','gwp'); ?></label>&nbsp;|

                    <br/><label for="W_shortcode_structure"><?php _e('Set the structure','gwp') ?></label>
                    <select name="W_shortcode_structure" id="W_shortcode_structure">
                        <option selected value="list_vertical"><?php _e('Vertical List','gwp') ?></option>
                        <option selected value="list_horizontal"><?php _e('Horizontal List','gwp') ?></option>
                        <option value="dropdown"><?php _e('Dropdown','gwp') ?></option>
                    </select>

                    <?php
                    submit_button(__('Save','gwp'));
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
unset($locale_language);