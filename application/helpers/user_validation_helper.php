<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */




if ( ! function_exists('divide_unique_id'))
{
	function divide_unique_id($unique_id){
		$exp=explode('_',$unique_id);
        $code=substr($exp[0],0,-2);
        return $code;
	}
}
if ( ! function_exists('otp_generate'))
{
	function otp_generate(){
		$num="12345678901234567890";
        $shu=str_shuffle($num);
        $otp=substr($shu, 14);
        return $otp;
	}
}
/*
if ( ! function_exists('main_user_unique_id'))
{
	function main_user_unique_id(){
		$num="12345678901234567890";
        $shu=str_shuffle($num);
        $otp=substr($shu, 16);
        return $otp;
	}
}*/