<?php
/**
 * Date: 5/18/15
 * Time: 4:39 PM
 */

class InitPageForms{

    public $locale, $all_languages;

    function __construct()
    {
        global $locale,$all_languages;
        $this->locale = $locale;
        $this->all_languages = $all_languages;
    }

    /*
     * this function will return the form
     * to set the languages for the site
     */
    public function setSiteLanguages()
    {
        ?>
        <div id="" class="postbox ">
            <div class="handlediv" title="Click to toggle"><br></div>
            <h3 class="hndle ui-sortable-handle"><span><?php _e('Set the languages for the site','gwp'); ?></span></h3>
            <div class="inside">
                <?php
                /*
                 * FORM ABOUT SETTING THE LANGUAGE FOR THE SITE
                 */

                ?>
                <form class="gwp-form-class" action="gwp_set_site_languages">

                    <?php
                    $star_point = 0;
                    $main_languages = 3;
                    foreach($this->all_languages as $id=>$data)
                    {
                        $style = '';
                        if($star_point < $main_languages)
                        {
                            $style = 'font-weight: bold';
                        }

                        $checked = $message = '';
                        if($this->locale == $id)
                        {
                            $checked = 'checked ';
                            $message = '<i>('.__('WordPress Language','gwp').')</i>';
                        }


                        ?>
                        <input <?php echo $checked; ?> type="checkbox" name="site-languages" id="<?php echo $id; ?>" value="<?php echo $id; ?>"/>
                        <label style="<?php echo $style; ?>" for="<?php echo $id; ?>"><?php echo $data['name'].' '.$message; ?></label>&nbsp;|
                        <?php
                        $star_point++;
                    }
                    ?>
                    <p style=" " class="confirm-message"><?php _e("Saved !!!","gwp"); ?></p>
                    <p style=" " class="wait-message"><?php _e("Wait a moment... Saving...","gwp"); ?></p>
                    <?php
                    submit_button(__('Set languages','gwp'));
                    ?>
                </form>
            </div>
        </div>
    <?php
    }

    /*
     * this function will display the settings to set the main
     * site language for the translations
     */
    public function setMainSiteLanguage()
    {
        $all_set_site_languages = get_option("gwp-user-settings");
        $all_set_site_languages = $all_set_site_languages['gwp-site-language'];
        $hidden_form = 'display: none';

        gwp_print($all_set_site_languages);

        if($all_set_site_languages != false)
            $hidden_form = 'display: block';
        ?>

        <div id="set-default-language" class="postbox " style="<?php echo $hidden_form; ?>">
            <div class="handlediv" title="Click to toggle"><br></div>
            <h3 class="hndle ui-sortable-handle"><span><?php _e('Set Default Language','gwp'); ?></span></h3>
            <div class="inside">
                <?php
                /*
                 * FORM ABOUT SETTING THE MAIN LANGUAGE FOR THE SITE
                 */

                ?>
                <form class="gwp-form-class" action="gwp_set_site_main_language">

                    <?php
                    foreach($all_set_site_languages as $id=>$data)
                    {
                        $style = '';
                        $checked = $message = '';
                        if($this->locale == $id)
                        {
                            $checked = 'checked ';
                            $message = '<i>('.__('WordPress Language','gwp').')</i>';
                        }


                        ?>
                        <input <?php echo $checked; ?> type="radio" name="set-site-languages" id="<?php echo $id; ?>" value="<?php echo $id; ?>"/>
                        <label style="<?php echo $style; ?>" for="<?php echo $id; ?>"><?php echo $data['name'].' '.$message; ?></label>&nbsp;|
                        <?php
                    }
                    ?>
                    <p style=" " class="confirm-message"><?php _e("Saved !!!","gwp"); ?></p>
                    <p style=" " class="wait-message"><?php _e("Wait a moment... Saving...","gwp"); ?></p>
                    <?php
                    submit_button(__('Set Main Language','gwp'));
                    ?>
                </form>
            </div>
        </div>

    <?php
        unset($all_set_site_languages);
    }

    /*
     * this function is for setting the layout of the
     * "shortcode" and of the widget which will return
     * to the front end the language switcher/s
     */
    public function setLanguageSwitchersLayout()
    {
        ?>
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
    <?php
    }


}