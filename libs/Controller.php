<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 19-Sep-17
 * Time: 11:16 AM
 */
//require_once 'Viu.php';
//require_once 'Model.php';
class Controller
{
    function __construct()
    {
        //echo 'Main controller<br />';
       // $this->view = new View();
        $this->vew = new Viu();
        //$this->model = new Model();
        //$this->spl_autoload_register()

    }
    public function loadModel($name)
    {
        //$path = URL.'models/'.$name.'_model.php';
        $path = PATH.'models'.DS.$name.'_Model.php';
        //echo $path;
        if (file_exists($path))
        {
            //require 'models/'.$name.'_model.php';
            //require '$path';
            //$modelName = ucfirst($name) .'_Model';
            $modelName = $name .'_Model';
            //echo $modelName;
            $this->model = new $modelName();
        }
    }



}