<?php
final class App
{
    public $url_base;
    public $routes = [];

    public function __construct($url_base) {
        $this->url_base = $url_base;
    }

    public function set_rout($url, $verbo, $classe, $metodo){
        $rout_key = App::make_rout_key($url, $verbo);

        $this->routes[$rout_key] = [
            'class'=>$classe,
            'metodo'=>$metodo
        ];
    }

    static function make_rout_key($url, $verbo){
        return $verbo . ':'. $url;
    }

    function call_controler_method_by_rout($rout){
        $instance = new $rout['class'];
        $instance->{$rout['metodo']}();
    } 

    public function show(){
        $verbo = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        $url_relativa = str_replace($this->url_base, '',$url);
        $rout_key = App::make_rout_key($url_relativa, $verbo);

      
        if(!isset($this->routes[$rout_key])){
            $this->call_controler_method_by_rout([
                'class'=>'AppController', 
                'metodo'=>'get404'
            ]);
            return;
        }

        $this->call_controler_method_by_rout($this->routes[$rout_key]);
    }
}
