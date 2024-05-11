<?php

Class Core{

    function construct()
    {
        $this->run();
    }

    public function run()
    {
        if(isset($_GET['pag']))
        {
            $url = $_GET['pag'];
        }

        //possui informação apos dominio
        if(!empty($url))
        {
            $url = explode('/',$url);
            $controller = $url[0].'Controller';//classe
            array_shift($url);
            
            //se se o usuario mandou funcao
            if(isset($url[0]) && !empty($url[0]))
            {
                $metodo = $url[0];
                array_shift($url);
            }else //enviou somente classe
            {
                $metodo = 'index';
            }

            if(count($url)>0 )
            {
               $parametros = $url;
            }

        }else
        {
            $controller = 'Home';
            $metodo =  'index';
        }

        $caminho = 'baba-baby2\app\sts\Controllers'.$controller.'php';

        if(!file_exists($caminho) && method_exists($controller, $metodo))
        {
            $controller = "Home";
            $metodo = 'index';
        }

        $c = new $controller;

        call_user_func_array(array($c, $metodo), $parametros);



        


    }
}
$c = new Core();




?>