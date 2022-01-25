<?php 

/**
 * @package WPSEMA
 */
namespace includes\Base;

 class WpsemaDeactivate{
     public static function deactivate(){
         flush_rewrite_rules();
     }
 }