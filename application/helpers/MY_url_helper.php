<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('img_url'))
{
    function img_url()
    {
        $CI =& get_instance();
        return $CI->config->item('img_path');
    }
}


if ( ! function_exists('get_key'))
{
    function get_key()
    {
        $CI =& get_instance();
        return $CI->config->item('key');
    }
}

