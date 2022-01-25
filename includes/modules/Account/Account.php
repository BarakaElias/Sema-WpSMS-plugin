<?php
/**
 * @package WPSEMA
 */
if(!defined('ABSPATH')){
    die;
}

class Account{
    private $api_key;
    private $api_password;
    private $sender_id;
    private $options;
    private $text_encoding;
    protected $send_sms_url = 'https://api.sema.co.tz/api/SendSMS';
    protected $check_balance_url = 'https://api.sema.co.tz/api/CheckBalance';


    function __construct(){
        $options = get_option('wpsema_settings');
    }



    function api_key(){
        if(isset($options['api_id'])){
            $api_key = $options['api_id'];
        }
        echo $api_key;
    }

    function api_password(){
        if(isset($options['api_password'])){
            $api_password = $options['api_password'];
        }
        echo $api_password;
    }

    function sender_id(){
        if(isset($options['sender_id'])){
            $api_key = $options['sender_id'];
        }
        echo $sender_id;
    }
    protected function get_account_balance(){
        $arguments = array(
            "api_id"=>$api_key,
            "api_password"=>$api_password
        );
        $response = wp_remote_post($check_balance_url,$args=array($arguments));
        $body = wp_remote_retrieve_body($response);
		$bodyarr = json_decode($body, true);
        $data = $bodyarr['CurrenceCode']. ' '.$bodyarr['BalanceAmount'];
        echo $data;
    }

    protected function get_text_encoding(){
        echo $text_encoding;
    }

}