<?php
namespace System\template;

use Windwalker\Edge\Cache\EdgeFileCache;
use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeStringLoader;

class Template
{
    private $vars = array();
    public function __get($name)
    {
        return $this->vars[$name];
    }

    public function __set($name, $value)
    {
        if ($name == 'view_template_file') {
            throw new Exception("No puede haber una variable llamada 'view_template_file'");
        }
        $this->vars[$name] = $value;
    }

    public function render($view_template_file)
    {
        if (array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("No puede haber una variable llamada 'view_template_file'");
        } 
        extract($this->vars);
        ob_start();
        include($view_template_file);
        return ob_get_clean();
    }

    public function renderOfuscado($view_template_file)
    {
        if (array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("No puede haber una variable llamada 'view_template_file'");
        } 
        extract($this->vars);
        ob_start();
        include($view_template_file);
        $busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
        $reemplaza = array('>','<','\\1');
        return preg_replace($busca, $reemplaza, ob_get_clean());
    }
}

