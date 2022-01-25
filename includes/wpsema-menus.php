<?php
function wpsema_settings_page(){
    add_menu_page(
        'Sema SMS',
        'Sema SMS',
        'manage_options',
        'wpsema',
        'wpsema_quicksms_subpage_markup',
        'dashicons-admin-comments',
        100
    );

    // add_submenu_page(
    //     'wpsema',
    //     __('Quick SMS','wpsema'),
    //     __('Quick SMS','wpsema'),
    //     'manage_options',
    //     'wpsema_quick_sms',
    //     'wpsema_quicksms_subpage_markup'
    // );
    add_submenu_page(
        'wpsema',
        __('SMS Templates','wpsema'),
        __('SMS Templates','wpsema'),
        'manage_options',
        'wpsema_sms_templates',
        'wpsema_template_subpage_markup'
    );
    add_submenu_page(
        'wpsema',
        __('Settings','wpsema'),
        __('Settings','wpsema'),
        'manage_options',
        'wpsema_settings',
        'wpsema_settings_subpage_markup'
    );
    add_submenu_page(
        'wpsema',
        __('Features','wpsema'),
        '',
        'manage_options',
        'wpsema_features',
        'wpsema_features_subpage_markup'
    );
}

add_action('admin_menu','wpsema_settings_page');


function wpsema_quicksms_subpage_markup(){
    //Double check user capabilities
    if(!current_user_can('manage_options')){
        return;
    }
    include(WPSEMA_DIR.'templates/admin/quicksms-page.php');
}


function wpsema_settings_subpage_markup(){
    //Double check user capabilities
    if(!current_user_can('manage_options')){
        return;
    }
    
    include(WPSEMA_DIR.'templates/admin/settings-page.php');
}

function wpsema_template_subpage_markup(){
    //Double check user capabilities
    if(!current_user_can('manage_options')){
        return;
    }
    
    include(WPSEMA_DIR.'templates/admin/templates-page.php');
}

function wpsema_features_subpage_markup(){
    if(!current_user_can('manage_options')){
        return;
    }
    include(WPSEMA_DIR.'templates/admin/features-settings-page.php');
}
