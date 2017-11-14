<?php
namespace System\tools\url;

class Url {
    // uri:  http://www.mysite.com/some-controller/some-method/
 
//echo uri();
// displays: /some-controller/some-method/
 
//echo uri(2);
// displays: some-method
 
// Pass true into 2nd paramater ($qs) to display Query String with URI
// uri:  http://www.mysite.com/some-controller/?foo=bar&bar=foo
 
//echo uri(NULL, true);
// displays: /some-controller/?foo=bar&bar=foo
    public function uri($segment=NULL, $qs=false){
        $uri = $_SERVER['REQUEST_URI'];
        if(!$qs || $segment !== NULL){
            if(strpos($uri, '?')){
                list($uri, $query) = explode('?', $uri);
            }
            if($segment !== NULL){
                if(is_string($segment)){
                    if($segment != 'last'){
                        return ( strlen($uri) >= strlen($segment) && substr($uri, 0, strlen($segment)) );
                    }
                }
                $str = trim($uri, '/');
                $segments = (strpos($str, '/')) ? explode('/', $str) : array($str);
                $ttl = count($segments);
                if(is_string($segment) && $segment == 'last'){
                    $seg = array_pop($segments);
                } elseif($segment <= $ttl){
                    if($segment < 0) $segment = $ttl - abs($segment) + 1;
                    $seg = $segments[$segment-1];
                } else {
                    return '';
                }
                
                return $seg;
            }
        }
        return $uri;
    }
}



