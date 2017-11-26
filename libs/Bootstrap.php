<?php

class Bootstrap
{
    public function __construct()
    {

        $url = isset($_GET['url'])?$_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        if (empty($url[0]))
        {

            $controller = new Dashboard();
            $controller->index();
            die();
        }else{
            $control = ucfirst($url[0]);
            $controller = new  $control;

            $controller->loadModel($url[0]);
        }


        if (isset($url[2]))
        {
            if (method_exists($controller,$url[1]))
            {
                $controller->{$url[1]}($url[2]);
            }else{
                $this->error();
            }
        }else{
            if (isset($url[1])){
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }

        }else {
                $controller->index();
            }
        }


    }
    function error()
    {
        $controller = new Error();
        $controller->index();
        die();
    }
}
