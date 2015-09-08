<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('echoChecked'))
{
	function echoChecked($v1,$v2)
	{
        if($v1 == $v2 ){
            echo ' checked = "checked" ';
        }
	}
}

if ( ! function_exists('echoSelected'))
{
	function echoSelected($v1,$v2)
	{
        if($v1 == $v2 ){
            echo ' selected = "selected" ';
        }
	}
}
if ( ! function_exists('isConnected'))
{
    function isConnected()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        $cne = $CI->session->userdata('cne');
        if(!empty($cne)){
            return true;
        }else{
            return false;
        }
    }
}

if ( ! function_exists('isAdmin'))
{
    function isAdmin()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        $admin_username = $CI->session->userdata('admin_username');
        if(!empty($admin_username)){
            return true;
        }else{
            return false;
        }
    }
}