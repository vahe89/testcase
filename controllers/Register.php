<?php
//require PATH.'app/libs\Controller.php';
//require 'C:\xampp\htdocs\ModelViewController\libs\Viu.php';
//require 'C:\xampp\htdocs\ModelViewController\models\Login_Model.php';
class Register extends Controller
{
    function __construct()
    {
        parent::__construct();
        // echo '<br> are in index<br />';

    }
    function index()
    {
        $this->vew->render('register'.DS.'index');
    }
    function register()
    {
        header('location: '.URL.'Dashboard');
    }
    function run()
    {

        //$model = new Login_Model();
       // $this->vew->model = Login_Model::run();
        //$this->loadModel('login');
        $this->model->run();
       //$this->vew->run = $model->run();
    }


}