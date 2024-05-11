<?php

namespace Core;


/**
 * RECEBE A URL E MANIPULA
 * CARREGAR A CONTROLLER
 */

class ConfigController extends Config
{
    /**VAR RECEBE A URL DO .HTACCESS */
    private string $url;
    /**VAR RECEBE A URL CONVERTIDA PARA ARRAY*/
    private array $urlArray;
    private string $urlController;
    //private string $urlMetodo;
    //private string $urlParameter;
    private string $urlSlugController;
    private array $format;
    

    /**
     * RECEBE A URL DO .HTACCESS
     * VALIDAR A URL
     */
    public function __construct()
    {
        $this->config();
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //var_dump($this->url);
            $this->urlArray = explode("/", $this->url);
            //var_dump($this->urlArray);
            

            if((isset($this->urlArray[0]))){
                $this->urlController = $this->slugController($this->urlArray[0]);
                //$this->urlMetodo = $this->urlArray[1];
            }else{
                $this->urlController = $this->slugController(CONTROLLERERRO);
            }
        }else{
            $this->urlController = $this->slugController(CONTROLLER);
        }
        //echo "Controller: {$this->urlController} - Metodo: {$this->urlMetodo}<br>";
    }


    /** 
     * retorna vazio
     * LIMPA A URL 
    */
    private function clearUrl(): void
    {
        //eliminar as tag
        $this->url = strip_tags($this->url);
        //eliminar espacos em branco
        trim($this->url);
        //eliminar a /(barra) final
        $this->url = rtrim($this->url, "/");
        $this->url = strtr(utf8_decode($this->url));
    }

    private function slugController($slugController): string
    {
        //converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //converter - para espaco em branco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        
        return $this->urlSlugController;
    }


    /**
     * CARREGA AS CONTROLLERS
     * INSTANCIA AS CLASSES
     * CARREGA O METODO INDEX
    */
    public function loadPage(){
        //echo "Carregar a pg/controller<br>";
        $classLoad = "\\Sts\Controllers\\" . $this->urlController;
        $classPage = new $classLoad();
        $classPage->index();
    }
}