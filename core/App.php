<?php
final class App
{
    public $url_base;
    public $routes = [];

    public function __construct($url_base) {
        $this->url_base = $url_base;
    }

    public function set_rout($patern, $verbo, $classe, $metodo){

        $this->routes[] = [
            'pattern'=>$patern,
            'verbo'=>$verbo,
            'class'=>$classe,
            'metodo'=>$metodo
        ];
    }

    function call_controler_method_by_rout($rout){
        $instance = new $rout['class'];
        $instance->{$rout['metodo']}($rout['values']);
    } 

    public function show(){
        $this->call_controler_method_by_rout($this->get_rout_by_request());

    }

    public function get_rout_by_request(){
        $verbo = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        $url_relativa = str_replace($this->url_base, '',$url);

        foreach ($this->routes as $indice => $rout) {
             if($rout['verbo'] != $verbo){
                continue;
            }

            if (!preg_match($rout['pattern'], $url_relativa, $matches)) {
                continue;
            } 

            $rout['values'] = $matches;
            return $rout;
        }

        return [
            'class'=>'AppController', 
            'metodo'=>'get404',
            'values'=>[0=>$url_relativa]
        ];
    }

    function make_url($relativo){
        return "{$this->url_base}{$relativo}";
    }
}
