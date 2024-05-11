<?php

namespace Core;

class Config
{
    public function config(): void
    {
        //url do projeto
        define('URL', 'http://localhost/baba-baby2/');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

    }
}