<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('sec')) {
    function sec($string) {
        return addslashes($string);
    }
}

if(!function_exists('_SESSION')){
    function _SESSION($key,$value = null){
        if($value === null){
            return Session::get($key);
        }else {
            Session::put($key,$value);
        }
    }
}

