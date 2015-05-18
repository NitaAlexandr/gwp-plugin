<?php

class GWP{

    private $pages = array(
        'gwp-main'=>array(
            'file'=> 'init.php',
        ),
        'gwp-string-translation'=>array(
            'file'=>'string_translation.php'
        ),
        'gwp-post-translation'=>array(
            'file'=>'post_translation.php'
        )
    );

    public function __construct(){

        include_once GWP_PATH.'files/definitions.php';
        load_plugin_textdomain( 'gwp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

        $this->include_classes();
        $this->include_files();

        add_action( 'admin_notices', array($this,'admin_notification') );
        add_action( 'admin_menu', array($this,'__create_admin_pages'));
        add_action( 'admin_enqueue_scripts', array($this,'__include_scripts'));
        add_action( 'admin_head', array($this,'__include_styles'));

    }


    /*
    * this function works for creating admin pages
    */
    function __create_admin_pages()
    {
        add_menu_page( 'Global WP', 'Global WP', 'manage_options','gwp-main',  array($this,'__include_files_admin_pages'), plugins_url( GWP_FOLDER_NAME.'/images/globe.png' ), 66 );
        add_submenu_page('gwp-main', 'String translation', 'String translation', 'manage_options', 'gwp-string-translation',  array($this,'__include_files_admin_pages') );
        add_submenu_page('gwp-main', 'Post translation', 'Post translation', 'manage_options', 'gwp-post-translation',  array($this,'__include_files_admin_pages') );
    }


    /*
     * this function works for including admin pages
     */
    function __include_files_admin_pages(){
//        gwp_print($_GET);
//        gwp_print($this->pages);

        $page =  GWP_PAGES_PATH.$this->pages[$_GET['page']]['file'];

        if(file_exists($page)){
            include $page;
        }
    }




    /*
    * this function including some files
    */
    private function include_files()
    {
        include GWP_PATH.'ajax/ajax.php';
        include_once GWP_FILES_PATH.'languages.php';
        include_once GWP_FILES_PATH.'functions.php';

        include_once GWP_PATH.'meta_boxes/posts-default.php';

    }

    /*
     * this function is including some classes
     */

    private function include_classes()
    {
    }

    function admin_notification(){
        /*
         * check if the Bootstrap Admin plugin is installed
         */
        /*if ( !is_plugin_active( 'bootstrap-admin/bootstrap-admin.php' ) ) {
            ?>
            <div class="error">
                <p><strong><?php _e( 'Warning !!!', 'gwp' ); ?></strong></p>
                <p><?php _e( 'For Global WP, the Bootsrap Admin plugin is required for the correct work!', 'gwp' ); ?></p>
            </div>
        <?php
        }*/
    }

    function  __include_scripts()
    {
        wp_register_script('gwp-plugin-application',GWP_URL.'js/gwp_plugin.js');
        wp_enqueue_script('gwp-plugin-application');
    }

    function  __include_styles()
    {
        wp_register_style('gwp-plugin-css',GWP_URL.'css/plugin.css');
        wp_enqueue_style('gwp-plugin-css');

    }
}