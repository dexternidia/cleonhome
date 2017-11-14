<?php
function Send($url,$type, $message)
{
	\System\tools\rounting\Redirect::sendController($url,$type,$message);
}

function Success($url,$message)
{
	\System\tools\rounting\Redirect::sendController($url,'success',$message);
}

function Error($url,$message)
{
	\System\tools\rounting\Redirect::sendController($url,'error',$message);
}

function Info($url,$message)
{
	\System\tools\rounting\Redirect::sendController($url,'info',$message);
}

function Arr($data)
{
	\System\tools\render\Arr::show($data);
}

function redirect($url)
{
	Redirect::to($url);
}

function Role($role)
{
	\System\tools\security\Permission::withRole($role);
}

function ManyRoles($roles)
{
    \System\tools\security\Permission::WithManyRoles($roles);
}

function View($data=Null)
{
    //motor de plantilla BLADE
    //\System\template\View::bladeView($data);
    //PHP TEXT PLAIN
	\System\template\View::view($data);
}

function Paginator($data,$num=20)
{
    return \System\tools\render\Arr::paginator($data,$num);
}

function Repo($data=Null)
{
	$modulo = URI_MODULO;  
	$controlador = ucfirst(URI_CONTROLADOR);  
	$cargarClase =  '\App\\'.$modulo.'\\repositories\\'.$controlador.'Repository';
	//llamamos a la clase
	$repository = new $cargarClase();
	$funcion = debug_backtrace()[1]['function'];
	return $repository->$funcion($data);
}

function RepoConfirm($data,$urlSuccess,$urlError)
{
	$modulo = URI_MODULO;  
	$controlador = ucfirst(URI_CONTROLADOR);  
	$cargarClase =  '\App\\'.$modulo.'\\repositories\\'.$controlador.'Repository';
	//llamamos a la clase
	$repository = new $cargarClase();
	$funcion = debug_backtrace()[1]['function'];

     $ingreso = $repository->$funcion($data);

    //la variable $ingreso debe devolver true o en su caso un mensaje diciendo el error resultante
    if (is_numeric($ingreso)) 
    {
        Success($urlSuccess.'/'.$ingreso, 'Exito..!');
    } 
    else 
    {
        Error($urlError, $ingreso);
    }
}

function Uri($num)
{
	return \System\tools\url\Url::uri($num);
}

function Token()
{
    return Token::field();
}

function variable_name( &$var, $scope=false, $prefix='UNIQUE', $suffix='VARIABLE' ){
    if($scope) {
        $vals = $scope;
    } else {
        $vals = $GLOBALS;
    }
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
        if($val === $new) $vname = $key;
    }
    $var = $old;
    return $vname;
}

function baseUrlRole()
{
    $test = new System\tools\session\Session;
    $has_session = session_status() == PHP_SESSION_ACTIVE;
    if(!$has_session == TRUE)
    {
        \System\tools\rounting\Redirect::sendController('','info','Sesión ya expiro, porfavor vuelva a loguearse.');
    }
    else
    {
        $usuario = \System\tools\session\Session::get(sessionNameDefault);
        $baseUrlRole = baseUrl.''.$usuario['role'].'/';
        return $baseUrlRole;
    }
}

function User()
{
    if (array_key_exists(sessionNameDefault, $_SESSION)) 
    {
        $usuario = \System\tools\session\Session::get(sessionNameDefault);
        $objecto = json_decode(json_encode($usuario), FALSE);
        $usuario = $_SESSION[sessionNameDefault];
        return $usuario;
    }
    else
    {
        \System\tools\rounting\Redirect::sendController('','info','Sesión ya expiro, porfavor vuelva a loguearse.');
    }
}

