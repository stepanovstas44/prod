<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function debug_print($data, $ex = false ) {

    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if ($ex) {
        exit('Exit');
    }
}

class Attach_assets  {

    public static function attach_js($data) {
        foreach($data as $item) {
            echo "<script type='text/javascript' src='".base_url('assets/'.$item).".js' ></script>";
        }
    }

    public static function attach_css($data) {
        foreach($data as $item) {
            echo "<link href='".base_url('assets/'.$item).".css' rel='stylesheet' type='text/css'/>";
        }
    }

    public static function attach_keys($data) {
        echo '<meta content="keywords" name="'.$data.'"/>';
    }

    public static function attach_desc($data) {
        echo '<meta content="description" name="'.$data.'description"/>';
    }

    public static function attach_title($data) {
        echo '<title>'.$data.'</title>';
    }

}