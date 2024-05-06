<?php

namespace Core;

class ConfigController
{
    private string $url;
    private string $urlController;
    private string $urlMetodo;

    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            var_dump($this->url);
        }else{
            $this->urlController = "home";
            $this->urlMetodo = "index";
        }
        echo "Controller: {$this->urlController} - Metodo: {$this->urlMetodo}";
    }
}