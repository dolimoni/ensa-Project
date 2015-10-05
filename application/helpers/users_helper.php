<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('isConnected'))
{
    function isConnected()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        $cin = $CI->session->userdata('cin');
        if(!empty($cin)){
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
        if(isConnected()){
            $CI = & get_instance();  //get instance, access the CI superobject
            $role = $CI->session->userdata('role');
            if($role == "admin"){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}