<?php 

function wpsema_options(){
   $options = [];
   $options['api_id'] = "aa";
   $options['api_password'] = "password";
    if(!get_option('wpsema_option')){
        add_option('wpsema_option',$options);
    }

}
add_action('admin_init','wpsema_options');



