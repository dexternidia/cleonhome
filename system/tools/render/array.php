<?php
namespace System\tools\render;

use Strana\Paginator;

class Arr {

    public function __construct()
    {
        	
    }
    
    public static function reduce($data)
    {
		return	array_reduce((array) $data, 'array_merge', array());
    }

    public static function show($data)
    {
		return	\Krumo::dump($data);
    }

    public static function paginator($data,$num = 10)
    {
		return (new Paginator)->perPage($num)->make(Arr::reduce($data));
    }

    public function infiniteScroll($data)
    {
        return (new Paginator)->infiniteScroll()->perPage(10)->make(Arr::reduce($data));
    }
}