<?php

namespace Core;

class ConfigController
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    //private string $urlMetodo;
    //private string $urlParameter;
    private string $urlSlugController;
    private array $format;
    
    #nao enviou nada pela url acessa a home
    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //var_dump($this->url);
            $this->urlArray = explode("/", $this->url);
            //var_dump($this->urlArray);
            

            if((isset($this->urlArray[0]))){
                $this->urlController = $this->slugController($this->urlArray[0]);
                //$this->urlMetodo = $this->urlArray[1];
            }else{
                $this->urlController = $this->slugController("Home");
            }
        }else{
            $this->urlController = $this->slugController("Home");
        }
        //echo "Controller: {$this->urlController} - Metodo: {$this->urlMetodo}<br>";
    }

    private function clearUrl(){
        //eliminar as tag
        $this->url = strip_tags($this->url);
        //eliminar espacos em branco
        trim($this->url);
        //eliminar a /(barra) final
        $this->url = rtrim($this->url, "/");
        $this->url = strtr(utf8_decode($this->url));
    }

    private function slugController($slugController){
        //converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //converter - para espaco em branco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        
        return $this->urlSlugController;
    }

    public function loadPage(){
        //echo "Carregar a pg/controller<br>";
        $classLoad = "\\Sts\Controllers\\" . $this->urlController;
        $classPage = new $classLoad();
        $classPage->index();
    }
}