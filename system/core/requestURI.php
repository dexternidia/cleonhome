<?php
$stringUrl = $_SERVER['REQUEST_URI'];
$findme   = '?';
$pos = strpos($stringUrl, $findme);
if ($pos === false) {
	$control = $stringUrl;
} else {
	list($control,$parametros) = explode('?', $_SERVER['REQUEST_URI']);
}

//Separando la cadena de la ruta en dos partes, la ruta para el modulo/clase/metodo y los parametros.

$requestURI = explode( '/', $control );
// Eliminamos los espacios del principio y final
// y recalculamos los índices del vector.
$requestURI = array_values( array_filter( $requestURI ) );

//comprobamos si la baseUrl esta configurada.
//de no estarlo dara error.
if(baseUrl)
{
	//Verificando si la ruta MODULO -> CONTROLADOR -> METODO
	//esta completa.
	if(isset($requestURI[1]) and isset($requestURI[2]))
	{
		//Modulo de hmvc
		$modulo = $requestURI[1];

		//controlador adentro de la carperta d e dicho modulo
		$controlador = $requestURI[2];

		//el metodo de ese controlador
		if (isset($requestURI[3])) 
		{
			$metodo = $requestURI[3];
		}
		else 
		{
			$metodo = '';
		}
		
		if (isset($requestURI[4])) {
			$parametro = $requestURI[4];
		} else {
			$parametro = '';
		}
		//DEFINIENDO RUTA DE VISTA
		define('URI_MODULO', $modulo);	
		define('URI_CONTROLADOR', $controlador);	
		
		$nombreControlador = $controlador;
		//list($nombreControlador,$ext) = explode('.', $controlador);

		$nombreClase = ucfirst($nombreControlador);

		//colocamos la ruta completa de la clase haciendo uso de los namespace
		$cargarClase =  '\App\\'.$modulo.'\\controllers\\'.$nombreClase.'';

		//llamamos a la clase
		$controller = new $cargarClase();

		//Si no se pasa un tercer parametro URI entonces se sobre entiende de que 
		//el metodo a llamar es INDEX
		$method = $_SERVER['REQUEST_METHOD'];
		
		if (!$metodo) {
			switch ($method) {
			  case 'PUT':
				$id = $metodo;
				$params = array($id);
				$metodo = 'update';
			    break;
			  case 'POST':
				$metodo = 'store';
			    break;
			  case 'GET':
			  	if (!isset($requestURI[4])) 
			  	{
			  		$metodo = 'index';
			  	}
			  	else
			  	{
			  		if ($requestURI[4] == 'create') {
			  		//$metodo = 'create';
			  		}
			  	}

				$metodo = 'index';
			    break;
			  case 'HEAD':
				$metodo = 'update';
			    break;
			  case 'DELETE':
				$metodo = 'delete';
			    break;
			  case 'OPTIONS':
				$metodo = 'optons';  
			    break;
			  default:
			    handle_error($request);  
			    break;
			}
		}

		if($metodo){
			
			switch ($method) {
			  case 'GET':
			  	if($metodo=='create')
			  	{
			  		$metodo = $metodo;
			  	}
			  	else
			  	{
			  		$num = is_numeric($metodo);
			  		if($num == true)
			  		{
			  			if($parametro and $parametro == 'edit')
			  			{
				  			$id = $metodo;
				  			$params = array($id);
				  			$metodo = 'edit';
			  			}
			  			else
			  			{
							if ($parametro and $parametro == 'delete') {
					  			$id = $metodo;
					  			$params = array($id);
					  			$metodo = 'destroy';
							}	
							else
							{
					  			$id = $metodo;
					  			$params = array($id);
					  			$metodo = 'show';
							}


			  			}
			  		} 
			  		else 
			  		{
			  			$metodo = $metodo;	
			  		}
			  	}
			    break;
			  case 'POST':
				$id = $metodo;
				$params = array($id);
				$num = is_numeric($metodo);
				if (!$metodo) {
					$metodo = 'store';
				} 
				else 
				{
					if($num == true)
					{
						if (!$parametro) 
						{
							$metodo = 'update';
						}
						else
						{
							if ($requestURI[4] == 'delete') {
								$metodo = 'destroy';
							}	
							else
							{
								$metodo = $metodo;
							}
						}
					} 
					else 
					{
						$metodo = $metodo;	
					}
				}
			    break;
			  default:
			    handle_error($request);  
			    break;
			}
		}

		//pone vacio los aprametros para los metodos que no tengan.
		if(!isset($params)){$params = array();}
		//llamamos al metodo

		if($method == 'POST')
		{
			if (!Token::check('post')) {
			    ob_start();
			    include('resources/systemMessages/TokenInvalid.php');
			    echo ob_get_clean();
			}
			else
			{
				call_user_func_array(array(__NAMESPACE__ .$cargarClase, $metodo),$params);
			}
		}
		else
		{
			call_user_func_array(array(__NAMESPACE__ .$cargarClase, $metodo),$params);
		}
		
	}
	else
	{
		/*
		Constantes para controlador default
		*/
		$controladorDefault = ClaseDefault;
		$metodoDefault = metodoDefault;

		//Verificamos si se configuro el controlador default que puede ser por ejemplo el login o alguna clase de verificador de roles.
		if($controladorDefault and $metodoDefault)
		{
			//llamamos al metodo.
			$controladorDefault::$metodoDefault();
		}
		else
		{
		    ob_start();
		    include('resources/systemMessages/controllerDefault.php');
		    echo ob_get_clean();
		}
	}
}
else
{
	//echo "Error, cofigure el baseUrl en config/config.php";
    ob_start();
    include('resources/systemMessages/baseUrl.php');
    echo ob_get_clean();
}