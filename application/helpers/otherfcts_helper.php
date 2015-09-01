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