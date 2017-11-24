<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 19-Sep-17
 * Time: 11:08 AM
 */
class Bootstrap
{
    public function __construct()
    {
        //require 'controllers\Index.php';
        //$controller = new Index();
        $url = isset($_GET['url'])?$_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);
        //var_dump($url);
        //print_r($url);
        if (empty($url[0]))
        {
            //require 'controllers/Index.php';
            $controller = new Index();
            $controller->index();
            //return false;
            die();
        }
        //$file = 'controllers/'.$url[0].'.php';
        /*if (file_exists($file))
        {
            //require $file;
            //$controller = new ucfirst($url[0]());
            //$controller->index();
        }else{
            $this->error();
        }*/

        //require_once $file;
        $control = ucfirst($url[0]);
        $controller = new  $control;
        //var_dump($controller);
        //require_once 'libs/Controller.php';
        //$controller1 = new Controller();
        $controller->loadModel($url[0]);
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
                    //$controller->loadModel($url[0]);
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
        //require 'controllers/Eror.php';
        $controller = new Eror();
        $controller->index();
        die();
    }
}
/*$tokens = explode('/', rtrim($_SERVER['SCRIPT_FILENAME'], '/'));
       echo '<pre>';
       print_r($tokens);
       echo '</pre>';
       $controllerName = chop(ucfirst($tokens[4]), ".php");
       echo $controllerName . '<br />';
       echo 'controllers/' . $controllerName . '.php <br />';*/

//$control = new Controller();
//$tokensindex = chop($tokens[4], ".php");
//$tokensindex = "Index.php";
//echo $tokensindex . '<br />';
//$actionName = $tokensindex . 'Action';
//echo $actionName;
//1. router
//$tokens = explode('/',rtrim($_SERVER['REQUEST_URI'],'/'));
//$tokens = explode('/',rtrim($_SERVER['SCRIPT_NAME'],'/'));

//$tokens = explode('/',rtrim($_SERVER['PHP_SELF'],'/'));

//print_r($_SERVER);
//2. Dispatcher
//$controllerName = ucfirst($tokens[1]);
//$controllerName = $tokens[1];
//if (file_exists('controllers/' . $controllerName . '.php')) {

// require 'C:\xampp\htdocs\ModelViewController\controllers/' . $controllerName . '.php';
//require_once ('controllers/Index.php');
//require 'libs/Controller.php';
//require 'controllers/Index.php';
//require_once ('C:\xampp\htdocs/'.$controllerName.'/controllers/Index.php');
//$controller->$tokensindex.'Action';
//$controller = new Controller();

//$controller->$actionName();
//  } else {
//$controllerName1 = 'Error';
//$controller1 = new $controllerName1();
//$controller1->IndexError();
//require 'C:\xampp\htdocs\ModelViewController\controllers\Eror.php';
//$control = new Error();
//$control->IndexError();

// }