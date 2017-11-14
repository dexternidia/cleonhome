<?php
namespace System\tools\security;

class Token {

    public function __construct()
    {
        	
    }

    public static function field()
    {
    	$token_id = self::id();
		$token = self::get();
		$var = '<input type="hidden" name="'.$token_id.'" value="'.$token.'" />';
		echo $var;
    }

	public static function id() {
	        if(isset($_SESSION['token_id'])) { 
	        		$token_id = $_SESSION['token_id']; 
	                return $token_id;
	        } else {
	                $token_id = self::random(10);
	                $_SESSION['token_id'] = $token_id;
	                return $token_id;
	        }
	}

	public static function get() {
	        if(isset($_SESSION['token_value'])) {
	        		$token = $_SESSION['token_value']; 
	                return $token;
	        } else {
	                $token = hash('sha256', self::random(500));
	                $_SESSION['token_value'] = $token;
	                return $token;
	        }
	}


	public static function check($method)
	{
		$token_id = self::id();
		$token = self::get();

		if ($method == 'post') 
		{
			if(isset($_POST[$token_id]) && ($_POST[$token_id] == $token)) 
			{
				return TRUE;
			} 
			else 
			{
				return FALSE;  
			}
		}
	}
	
	public function random($len) {
 	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($len/strlen($x)) )),1,$len);
	}
}