<?php
/**
 * @package WPSEMA
 */
if(!defined('ABSPATH')){
    die;
}
require_once './../Account/Account.php';


class WooSema extends Account{
    private $isEnabled;
    private $allowVerifyWithOtp;
    private $allowSendNewProductNotification;
    private $allowSendNewProductNotificationMessage;
    private $allowSendNewOrderNotificationToAdmin;
    private $allowSendOrderUpdates;
    private $allowOrderNotes;


    function __construct(){
        $this->getWooSemaOptions();
    }

    //Enable Woocommerce SMS
    function enableWooSMS(){
        $isEnabled = "1";
    }
    //Disable Woocommerce SMS
    function disableWooSMS(){
        $isEnabled = "0";
    }



    
    function sendOrderNote(){
        if("1" == $allowOrderNotes){
        add_action('','sema_send_sms_on_new_order_note',10,1);
        }
    }
    function sema_send_sms_on_new_order_note($email_args){
        $order = wc_get_order($email_args['order_id']);
        $note = $email_args['customer_note'];
        $phone = $my_order->get_billing_phone();
        $letter = $phone[0];
                    if('0' === $letter){
                            $good = substr($phone, 1);
                            $phone = '255'.$good;
                    }elseif ('+' === $phone[0]) {
                            $phone = substr($phone, 1);
                    }
        $shopname = get_option('woocommerce_email_from_name');
        sema($phone, $note);
    }





    function sema($phone, $default_sms_message){
        $url = Account::send_sms_url;//'https://api.sema.co.tz/api/SendSMS';
        $username = Account::get_api_key();
        $password = Account::get_api_password();

        $response = wp_remote_get($url.'?api_id='.$username.'&api_password='.$password.'&sms_type=P&encoding=T&phonenumber='.$phone.'&sender_id=Info&textmessage='.$default_sms_message);

        if(is_wp_error($response)){
            $error_message = $response->get_error_message();
            return 'Something went worng:'.$error_message;
            exit;
        }

}





















































    //GET WOOCOMMERCE OPTIONS
    function getWooSemaOptions(){
        $options = get_option('wpsema_woo_settings');
        if(isset($option['enable_woo'])){
            $isEnabled = $option['enable_woo'];
        }
        if(isset($option['enable_woo_otp'])){
            $allowVerifyWithOtp = $option['enable_woo_otp'];
        }
        if(isset($option['woo_notify_new_products'])){
            $allowSendNewProductNotification = $option['woo_notify_new_products'];
        }
        if(isset($option['woo_notify_new_order'])){
            $allowSendNewOrderNotificationToAdmin = $option['woo_notify_new_order'];
        }
        if(isset($option['woo_notify_new_order_update'])){
            $allowSendOrderUpdates = $option['woo_notify_new_order_update'];
        }
        if(isset($option['woo_order_note'])){
            $allowOrderNotes = $option['woo_order_note'];
        }
    }
}