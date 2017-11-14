<?php
namespace System\tools\security;

use System\tools\render\Arr;
use System\tools\rounting\Redirect;
use System\tools\session\Session;

class Permission {
  public $param;

  public function __construct($param) {
    $this->param = $param;
	if($this->param)
	{
        $session = new Session();
        if ($session->isRegistered()) {
            if($session->isExpired()) 
            {
                Redirect::to('');
            } 
            else 
            {
                $usuario = (object) Session::get(sessionNameDefault);
                if($usuario->role != $this->param)
                {
                    Redirect::to('');
                }
            }
        } 
        else
        {
            Redirect::to('');
        }
	}
  }

	public static function withRole($role)
	{
    	if($role)
    	{
	        $session = new Session();
	        if ($session->isRegistered()) {
	            if($session->isExpired()) 
	            {
	                Redirect::to('');
	            } 
	            else 
	            {
	                $usuario = (object) Session::get(sessionNameDefault);
	                if($usuario->role != $role)
	                {
	                    Redirect::to('');
	                }
	            }
	        } 
	        else
	        {
	            Redirect::to('');
	        }
    	}
	}

	public static function WithManyRoles($roles)
	{
    	if($roles)
    	{
	        $session = new Session();
	        if ($session->isRegistered()) {
	            if($session->isExpired()) 
	            {
	                Redirect::to('');
	            } 
	            else 
	            {
	                $usuario = (object) Session::get(sessionNameDefault);
	                if(!in_array($usuario->role, $roles))
	                {
	                    Redirect::to('');
	                }
	            }
	        } 
	        else
	        {
	            Redirect::to('');
	        }
    	}
		//Arr::show($roles);
	}

	public static function withoutRole()
	{
        $session = new Session();
        if ($session->isRegistered()) {
            if($session->isExpired()) 
            {
                Redirect::to('');
            } 
        } 
        else
        {
            Redirect::to('');
        }
	}
}
