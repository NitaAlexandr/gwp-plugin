<?php
/**
 * Created by PhpStorm.
 * User: anita
 * Date: 5/14/15
 * Time: 2:31 PM
 */

global $all_languages, $locale;
$locale_language = $locale;

delete_option("gwp-user-settings");

gwp_print($all_languages);

require_once GWP_PATH.'classes/init-page-forms.php';
$init_page_forms = new InitPageForms();

?>
<div class="wrap gwp-page-area">
    <div id="poststuff">



        <?php
        /*
         * this form will return the settings for
         * setting all site languages
         */
        $init_page_forms->setSiteLanguages();
        /*****************/

        /*
         * this form will return the settings for
         * setting main site language
         */
        $init_page_forms->setMainSiteLanguage();
        /*****************/

        /*
         * this form will return the settings for
         * setting the layout of the language switchers
         */
        $init_page_forms->setLanguageSwitchersLayout();
        /*****************/
        ?>


    </div>
</div>

<?php
