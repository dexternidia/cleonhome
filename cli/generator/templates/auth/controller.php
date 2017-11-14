<?php
namespace App\${modulo}\controllers;

use App\Usuario;
use App\${modulo}\models\${controller}Model;
use Controller,View,Token,Session,Arr,Message,Redirect;

class ${controller} extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
	    $session = new Session();

	    // Check if the session registered.
	    if ($session->isRegistered()) {
	        // Check to see if the session has expired.
	        // If it has, end the session and redirect to login.
            $usuario = (object) Session::get('current_user');
            $url = $usuario->role.'/principal';
            Redirect::to($url);
            
	        if($session->isExpired()) 
	        {
	            $session->end();
	        	View::ver('auth/login/index');
	        } 
	        else 
	        {
	            // Keep renewing the session as long as they keep taking action.
	            $session->renew();
	            $usuario = (object) Session::get('current_user');
	            $url = $usuario->role.'/principal';
	            Redirect::to($url);
	        }
	    } 
	    else 
	    {
	        View::ver('auth/login/index');
	    }
    }
    
    public function verificar()
    {
		extract($_POST);
		$usuario = Usuario::where('email',$username)->first();
		if($usuario)
		{
			$iguales = password_verify($password, $usuario->password);
			if($iguales)
			{
	            $session = new Session();

	            // You can define what you like to be stored.
	            $user = array(
	                'id'	=> $usuario->id,
	                'name'  => $usuario->name,
	                'email' => $usuario->email,
	                'role'		=> $usuario->role	
	            );

	           	$session->register(120); // Register for 2 hours.
	            $session->set('current_user', $user);
	            //header('location: '.baseUrl.'admin/pensionados');
	            Redirect::to('auth/login/index');
			}
			else
			{
	            Redirect::send('auth/login','error','Contraseña incorrecta.');
			}
		}
		else
		{
            Redirect::send('auth/login','error','Usuario incorrecto.');
		}
		//Arr::show($usuario);
    }

    public function clave()
    {
		$password = password_hash('carlos2017', PASSWORD_DEFAULT);
		echo $password;
	}

	public function sesion()
	{
		$usuario = Session::get('current_user');
		//echo $usuario['role'];
		echo $usuario->role;
		//Arr::show(Session::get('usuario'));
	}

	public function logout()
	{
		Session::end();
		Redirect::to('');
	}
}