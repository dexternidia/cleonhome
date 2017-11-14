<?php
namespace System\tools\session;

use App\Usuario;
/**
* 
*/
class User
{
	static function data()
	{
	    //$test = new \System\tools\session\Session;
	    //$test = new System\tools\session\Session;
	    $current_user = \System\tools\session\Session::get('current_user');

	    $usuario = Usuario::find($current_user['id']);
	    //$has_session = session_status() == PHP_SESSION_ACTIVE;
	    if(empty($usuario))
	    {
	        \System\tools\rounting\Redirect::sendController('','info','Sesión ya expiro, porfavor vuelva a loguearse.');
	    }
	    else
	    {
	        return $usuario;
	    }
	}
}


