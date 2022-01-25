<?php
/**
 * @package WPSEMA
 */
/*
Plugin Name: Sema Bulk SMS
Description: Allows you to send Bulk SMS from your wordpress website
Version: 1.0.0
Contributors: AimFirms
Author: Baraka Elias
Author URI: https://barakaelias.com
License: GPLv2 or later
Text Domain: wpsema
*/

//If this file is called directly, abort.
if(!defined('WPINC')){
    die;
}
define( 'WPSEMA_DIR', plugin_dir_path( __FILE__ ) );
define('WPSEMA_URL',plugin_dir_url(__FILE__));

use Includes\activate;
use Includes\deactivate;


class WPSEMA{
    function register(){
        include(plugin_dir_path(__FILE__).'includes/wpsema-styles.php');
        include(plugin_dir_path(__FILE__).'includes/wpsema-menus.php');
        include(plugin_dir_path(__FILE__).'includes/wpsema-settings-fields.php');
        $filter_name = "plugin_action_links_" . plugin_basename(__FILE__);
        add_filter($filter_name,array($this,'wpsema_add_settings_link'));
    }
    function wpsema_add_settings_link($links){
        $settings_link = '<a href="admin.php?page=wpsema_settings">' . __('Settings','wpsema') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }
    function activate(){
        require_once WPSEMA_DIR.'includes/base/wpsema-activate.php';
        WpsemaActivate::activate();

    }
    function deactivate(){

    }
    
}
if(class_exists('WPSEMA')){
    $wpsema = new WPSEMA();
    $wpsema->register();
}




//activation hook
register_activation_hook(__FILE__,array($wpsema,'activate'));
//deactivation hook
require_once WPSEMA_DIR.'includes/base/wpsema-deactivate.php';
register_deactivation_hook(__FILE__,array($wpsema,'deactivate'));



//Create Plugin Options
include(plugin_dir_path(__FILE__) . 'includes/wpsema-options.php');


