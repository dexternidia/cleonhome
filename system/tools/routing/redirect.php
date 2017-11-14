<?php
namespace System\tools\rounting;

use System\tools\session\Message;

class Redirect {

	public static function to($url)
	{
        header('Location: '.baseUrl.''.$url.'');
	}

	public static function send($url,$type,$message)
	{
		Message::send($type,$message);
	    header('Location: '.baseUrl.''.$url.'');	
	}

	public static function sendController($url,$type,$message)
	{
		$modulo = URI_MODULO;  
		Message::send($type,$message);
	    header('Location: '.baseUrl.''.$modulo.'/'.$url.'');	
	}

	public static function send2($url,$type,$message)
	{
		Message::send2($type,$message);
	    header('Location: '.baseUrl.''.$url.'');	
	}


	public static function sendQuestion($urlFrom,$urlConfirm,$type,$message)
	{
		Message::sendQuestion($urlConfirm,$type,$message);	
	    header('Location: '.baseUrl.''.$urlFrom.'');	
	}
}