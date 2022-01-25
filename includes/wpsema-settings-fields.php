<?php 

function wpsema_settings(){

    //If some settings don't exist, then create them
    if(!get_option('wpsema_settings')){
        add_option('wpsema_settings');
    }



    //Define API ID and PASSWORD section 
    add_settings_section(
        //Unique identifier for the section
        'wpsema_account_section',
        //Section Title
        __('Account','wpsema'),
        //calback for an optional description
        'wpsema_account_section_callback',
        //Admin page to add section to
        'wpsema'
    );
    add_settings_field(
        //Unique identifier for field
        'wpsema_account_api_id',
        //Field title
        __('api ID','wpsema'),
        //Callback for field markup
        'wpsema_account_api_id_callback',
        //Page to go on
        'wpsema',
        //section to go in
        'wpsema_account_section'
    );
    add_settings_field(
        //Unique identifier for field
        'wpsema_account_api_password',
        //Field title
        __('api password','wpsema'),
        //Callback for field markup
        'wpsema_account_api_password_callback',
        //Page to go on
        'wpsema',
        //section to go in
        'wpsema_account_section'
    );
    add_settings_field(
        //Unique identifier for field
        'wpsema_account_sender_id',
        //Field title
        __('Sender ID or name','wpsema'),
        //Callback for field markup
        'wpsema_account_sender_id_callback',
        //Page to go on
        'wpsema',
        //section to go in
        'wpsema_account_section'
    );



    add_settings_section(
        //Unique identifier for the section
        'wpsema_text_encoding_section',
        //Section Title
        __('Text Encoding','wpsema'),
        //calback for an optional description
        'wpsema_text_encoding_section_callback',
        //Admin page to add section to
        'wpsema'
    );
    add_settings_field(
        'wpsema_text_encoding_radio',
        __('Select Text Encoding','wpsema'),
        'wpsema_text_encoding_radio_callback',
        'wpsema',
        'wpsema_text_encoding_section',
        [
            'option_one'=>'Text',
            'option_two'=>'Unicode',
            'option_three'=>'Flash Message',
            'option_four'=>'Unicode Flash Message'
        ]
    );
    



    register_setting(
        'wpsema_settings',
        'wpsema_settings'
    );
}









function wpsema_woocommerce_settings(){
     //If some settings don't exist, then create them
    if(!get_option('wpsema_woo_settings')){
        add_option('wpsema_woo_settings');
    }
    //TO ENABLE WOOCOMMERCE SMS
    add_settings_section(
        'wpsema_woocommerce_section',
        __('Woocommerce','wpsema'),
        'wpsema_woocommerce_section_callback',
        'wpsema_features'
    );
    add_settings_field(
        'wpsema_enable_woocommerce_checkbox',
        __('Enable WooCommerce SMS','wpsema'),
        'wpsema_enable_woocommerce_checkbox_callback',
        'wpsema_features',
        'wpsema_woocommerce_section',
        [
            'label'=>'Enabled'
        ]
    );

    //FOR OTP VERIFICATION
    add_settings_section(
        'wpsema_woo_otp_section',
        __('OTP Verification','wpsema'),
        'wpsema_woo_otp_section_callback',
        'wpsema_features'
    );
    add_settings_field(
        'wpsema_woo_otp_checkbox',
        __('OTP Verification on User Registration','wpsema'),
        'wpsema_enable_woo_otp_checkbox_callback',
        'wpsema_features',
        'wpsema_woo_otp_section',
        [
            'label'=>'Send a One Time Password when a new customer registers'
        ]
    );

    //Notify customers of new products
    add_settings_section(
        'wpsema_woo_notification_section',
        __('Notifications','wpsema'),
        'wpsema_woo_notification_section_callback',
        'wpsema_features'
    );
    add_settings_field(
        'wpsema_woo_notify_new_products_checkbox',
        __('New Product Notification','wpsema'),
        'wpsema_enable_woo_new_product_checkbx_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'label'=>'Send notification to customers about new products'
        ]
    );
    add_settings_field(
        'wpsema_woo_notify_new_products_message_template',
        __('Message','wpsema'),
        'wpsema_woo_notify_new_products_message_template_callback',
        'wpsema_features',
        'wpsema_woo_notification_section'
    );

    //SEND SMS TO ADMIN WHEN NEW ORDER IS PLACED
    add_settings_field(
        'wpsema_woo_notify_new_orders_to_admin_checkbox',
        __('New Order Notification','wpsema'),
        'wpsema_enable_woo_new_order_checkbx_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'label'=>'Send notification to admin about new orders'
        ]
    );

    //SEND SMS TO CUSTOMER ABOUT ORDER UPDATES
    add_settings_field(
        'wpsema_woo_notify_order_to_customer_checkbox',
        __('Order Updates to customers','wpsema'),
        'wpsema_enable_woo_new_order_to_customer_checkbx_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'label'=>'Send updates to customers about their orders'
        ]
    );
    add_settings_field(
        'wpsema_account_order_recieved_text',
        __('Order Recieved Message Template','wpsema'),
        'wpsema_order_recieved_text_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'option_one'=>"Do not send",
            'option_two'=>'Template Two',
            'option_three'=>'Template Three'
        ]
    );
    add_settings_field(
        'wpsema_account_order_cancelled_text',
        __('Order Cancelled Message Template','wpsema'),
        'wpsema_order_recieved_text_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'option_one'=>"Do not send",
            'option_two'=>'Template Two',
            'option_three'=>'Template Three'
        ]
    );

    add_settings_field(
        'wpsema_woo_notify_order_notes_to_customer_checkbox',
        __('Order Notes to customers','wpsema'),
        'wpsema_enable_woo_order_notes_to_customer_checkbx_callback',
        'wpsema_features',
        'wpsema_woo_notification_section',
        [
            'label'=>'Allow order notes to be sent to customers via SMS'
        ]
    );
   

    register_setting(
        'wpsema_woo_settings',
        'wpsema_woo_settings'
    );
}


add_action('admin_init','wpsema_settings');
add_action('admin_init','wpsema_woocommerce_settings');












function wpsema_account_section_callback(){
    esc_html_e('Setup your api keys here.','wpsema');
}
function wpsema_text_encoding_section_callback(){
    esc_html_e('Setup your text formatting here','wpsema');
}
function wpsema_account_api_id_callback(){
    $options = get_option('wpsema_settings');
    $custom_text = '';
    if(isset($options['api_id'])){
        $custom_text = esc_html($options['api_id']);
    }

    echo '<input class="form-control" type="text" id="wpsema_api_id" name="wpsema_settings[api_id]" value="'.$custom_text.'"/>';
}
function wpsema_account_api_password_callback(){
    $options = get_option('wpsema_settings');
    $custom_text = '';
    if(isset($options['api_password'])){
        $custom_text = esc_html($options['api_password']);
    }

    echo '<input class="form-control" type="password" id="wpsema_api_password" name="wpsema_settings[api_password]" value="'.$custom_text.'"/>';
}














function wpsema_account_sender_id_callback(){
    $options = get_option('wpsema_settings');
    $custom_text = '';
    if(isset($options['sender_id'])){
        $custom_text = esc_html($options['sender_id']);
    }

    echo '<input class="form-control" type="text" id="wpsema_sender_id" name="wpsema_settings[sender_id]" value="'.$custom_text.'"/>';
}
function wpsema_text_encoding_radio_callback($args){
    $options = get_option('wpsema_settings');
    $radio = '';
    if(isset($options['text_encoding'])){
        $radio = esc_html($options['text_encoding']);
    }



    $html = '<input class="form-check-input" type="radio" id="wpsema_settings_radio_one" name="wpsema_settings[text_encoding]" value="T"'.checked(1,$radio,false).'/>';
    $html .= '<label for="wpsema_settings_radio_one">'.$args['option_one'].'</label>&nbsp;';
    $html .= '<input class="form-check-input" type="radio" id="wpsema_settings_radio_two" name="wpsema_settings[text_encoding]" value="U"'.checked(2,$radio,false).'/>';
    $html .= '<label for="wpsema_settings_radio_two">'.$args['option_two'].'</label>&nbsp;';
    $html .= '<input class="form-check-input" type="radio" id="wpsema_settings_radio_three" name="wpsema_settings[text_encoding]" value="FS"'.checked(3,$radio,false).'/>';
    $html .= '<label for="wpsema_settings_radio_three">'.$args['option_three'].'</label>&nbsp;';
    $html .= '<input class="form-check-input" type="radio" id="wpsema_settings_radio_four" name="wpsema_settings[text_encoding]" value="UFS"'.checked(4,$radio,false).'/>';
    $html .= '<label for="wpsema_settings_radio_four">'.$args['option_four'].'</label>&nbsp;';

    echo $html; 
}


function wpsema_woocommerce_section_callback(){
    esc_html_e('Integrate your shop with SMS','wpsema');
}
function wpsema_enable_woocommerce_checkbox_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['enable_woo'])){
        $checkbox = esc_html($options['enable_woo']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_enable_woo" name="wpsema_woo_settings[enable_woo]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wp_settings_enable_woo">'.$args['label'].'</label>';

    echo $html;
}
function wpsema_woo_otp_section_callback(){
    esc_html_e('One Time Password (OTP) Verification','wpsema');
}
function wpsema_enable_woo_otp_checkbox_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['enable_woo_otp'])){
        $checkbox = esc_html($options['enable_woo_otp']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_enable_woo_otp" name="wpsema_woo_settings[enable_woo_otp]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wp_settings_enable_woo_otp">'.$args['label'].'</label>';

    echo $html;
}





function wpsema_woo_notification_section_callback(){
    esc_html_e('Notifications','wpsema');
}
function wpsema_enable_woo_new_product_checkbx_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['woo_notify_new_products'])){
        $checkbox = esc_html($options['woo_notify_new_products']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_woo_notify_new_products" name="wpsema_woo_settings[woo_notify_new_products]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wpsema_settings_woo_notify_new_products">'.$args['label'].'</label>';

    echo $html;
}

function wpsema_woo_notify_new_products_message_template_callback(){
    $options = get_option('wpsema_woo_settings');
    $textarea =''; $disabled='disabled';
    if(isset($options['notify_new_product_message'])){
        $textarea = esc_html($options['notify_new_product_message']);
    }
       
    echo '<textarea id="wpsema_new_prod_notify_textarea" name="wpsema_woo_settings[notify_new_product_message]" rows="5" cols="50">'.$textarea.'</textarea>';
}

function wpsema_enable_woo_new_order_checkbx_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['woo_notify_new_order'])){
        $checkbox = esc_html($options['woo_notify_new_order']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_woo_notify_new_order" name="wpsema_woo_settings[woo_notify_new_order]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wpsema_settings_woo_notify_new_order">'.$args['label'].'</label>';

    echo $html;
}

function wpsema_enable_woo_new_order_to_customer_checkbx_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['woo_notify_new_order'])){
        $checkbox = esc_html($options['woo_notify_order_update']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_woo_notify_order_update" name="wpsema_woo_settings[woo_notify_order_update]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wpsema_settings_woo_notify_order_update">'.$args['label'].'</label>';

    echo $html;
}
function wpsema_order_recieved_text_callback($args){
    $options = get_option('wpsema_woo_settings');
    $custom_text = '';
    if(isset($options['order_recieved_message'])){
        $custom_text = esc_html($options['order_recieved_message']);
    }

    $html = '<select id="wpsema_order_recieved_message" name="wpsema_woo_settings[order_recieved_message]">';

    $html .= '<option value="option_one"' . selected($custom_text,'option_one',false).'>'.$args['option_one'].'</option>';

    $html .= '<option value="option_two"' . selected($custom_text,'option_two',false).'>'.$args['option_two'].'</option>';

    $html .= '<option value="option_three"' . selected($custom_text,'option_three',false).'>'.$args['option_three'].'</option>';

    $html .= '</select>';

    echo $html;

}
function wpsema_enable_woo_order_notes_to_customer_checkbx_callback($args){
    $options = get_option('wpsema_woo_settings');
    $checkbox = '';
    if(isset($options['woo_order_note'])){
        $checkbox = esc_html($options['woo_order_note']);
    }

    $html = '<input type="checkbox" id="wpsema_settings_woo_order_note" name="wpsema_woo_settings[woo_order_note]" value="1"'.checked(1,$checkbox, false).'/>';
    $html .= '&nbsp';
    $html .= '<label for="wpsema_settings_woo_order_note">'.$args['label'].'</label>';

    echo $html;
}