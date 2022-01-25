<?php 

//Conditionally load CSS on a plugin settings page only
function wpsema_admin_styles($hook){
    wp_register_style(
        'wpsema-admin',
        WPSEMA_URL . 'admin/css/wpsema-admin-style.css',
        [],
        time()
    );
    wp_register_style(
        'bootstrap-min',
        WPSEMA_URL . 'admin/css/bootstrap.min.css',
        [],
        1
    );

    // if('toplevel_page_wpsema' == $hook || 'settings-page.php' == $pagenow){
        wp_enqueue_style('wpsema-admin');
        wp_enqueue_style('bootstrap-min');
//    }
}

add_action('admin_enqueue_scripts','wpsema_admin_styles');