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

if ( ! function_exists('sendEmail'))
{
    function sendEmail($to,$subject,$message)
    {
        $CI = & get_instance();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'modisoft1@gmail.com',// Change this to admin Email
            'smtp_pass' => 'casamoha',// Change this to admin pass
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");

        $CI->email->from('modisoft1@gmail.com', "Administration ENSA Safi");
        $CI->email->to($to); 

        $CI->email->subject($subject);
        $CI->email->message($message);  

        $result = $CI->email->send();
        return $result;
        /*
        //TODO with cpanel account
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://webmail.essaidim.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@essaidim.com',// Change this to admin Email
            'smtp_pass' => c@s@m@h@',// Change this to admin pass
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");

        $CI->email->from('noreply@essaidim.com', "Cocacolalist Team");
        $CI->email->to($to); 

        $CI->email->subject($subject);
        $CI->email->message($message);  

        $result = $CI->email->send();
        */
    }
}