<?php
return array(
    'View' 			=> \System\template\View::class,
    'Controller' 	=> \System\core\BaseController::class,
    'Session'		=> \rcastera\Browser\Session\Session::class,
    'Token'			=> \System\tools\security\Token::class,
    'Session'		=> \System\tools\session\Session::class,
    'Eloquent'		=> \DB\Database::class,
    'Message'		=> \System\tools\session\Message::class,
    'Arr'		    => \System\tools\render\Arr::class,
    'Redirect'      => \System\tools\rounting\Redirect::class,
    'Permission'	=> \System\tools\security\Permission::class,
    'Url'           => \System\tools\url\Url::class,
);
