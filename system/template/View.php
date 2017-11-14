<?php  
namespace System\template;

use Windwalker\Edge\Cache\EdgeFileCache;
use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Loader\EdgeStringLoader;
use System\template\Template;

class View
{
    public static function ver($vista, $array=Null)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                //echo $view->title;
            }
        }

        list($modulo, $controlador,$vista) = explode('/', $vista);

        $view->baseUrl = baseUrl;
        $view->content = $view->renderOfuscado('app/'.$modulo.'/views/'.$controlador.'/'.$vista.'.php');
        echo $view->renderOfuscado('app/'.$modulo.'/views/theme/'.$modulo.'.php');
        //app/auth/views/theme/auth

    }

    public static function theme($vista,$theme, $array=Null)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                //echo $view->title;
            }
        }

        $modulo = URI_MODULO;  
        $controlador = URI_CONTROLADOR;  

        $view->baseUrl = baseUrl;
        $view->content = $view->render('app/'.$modulo.'/views/'.$controlador.'/'.$vista.'.php');
        echo $view->render('app/'.$modulo.'/views/theme/'.$theme.'.php'); 
    } 

    public static function show($vista, $array=Null)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                //echo $view->title;
            }
        }

        $modulo = URI_MODULO;  
        $controlador = URI_CONTROLADOR;  

        $view->baseUrl = baseUrl;
        $view->content = $view->render('app/'.$modulo.'/views/'.$controlador.'/'.$vista.'.php');
        echo $view->render('app/'.$modulo.'/views/theme/'.$theme.'.php'); 
    } 


    public static function blade($vista, $array1=Null)
    {
        $array2 = array('baseUrl' => baseUrl);
        echo (new Edge(new EdgeFileLoader(array('app/'.URI_MODULO.'/views')), null, new EdgeFileCache('cache/views')))->render(URI_CONTROLADOR.'.'.$vista,array_unique( array_merge( $array1 , $array2 )));
    } 

    public static function bladeView($array1=Null)
    {
        $array2 = array('baseUrl' => baseUrl);
        $data = ($array1) ? $data = array_unique( array_merge( $array1 , $array2 )) : $data = $array2;
        $blade = new Edge(new EdgeFileLoader(array('app/'.URI_MODULO.'/views')), null, new EdgeFileCache('cache/views'));
        echo $blade->render(URI_CONTROLADOR.'.'.debug_backtrace()[2]['function'],$data);
    } 

    public static function go($array=Null)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                //echo $view->title;
            }
        }

        $modulo = URI_MODULO;  
        $controlador = URI_CONTROLADOR;  
        $vista = debug_backtrace()[1]['function'];

        $view->baseUrl = baseUrl;
        $view->content = $view->render('app/'.$modulo.'/views/'.$controlador.'/'.$vista.'.php');
        echo $view->render('app/'.$modulo.'/views/theme/'.$modulo.'.php'); 
    }

    public static function view($array=Null)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                //echo $view->title;
            }
        }

        $modulo = URI_MODULO;  
        $controlador = URI_CONTROLADOR;  
        $vista = debug_backtrace()[2]['function'];

        $view->baseUrl = baseUrl;
        $view->content = $view->render('app/'.$modulo.'/views/'.$controlador.'/'.$vista.'.php');
        echo $view->render('app/'.$modulo.'/views/theme/'.$modulo.'.php'); 
    }
}
