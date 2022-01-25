<?php 

/**
 * @package WPSEMA
 */
namespace includes\Base;
 class WpsemaActivate{
     public static function activate(){
         flush_rewrite_rules();
     }
 }