<?php
//require PATH.'app/libs\Controller.php';
//require 'C:\xampp\htdocs\ModelViewController\libs\Viu.php';
//require 'C:\xampp\htdocs\ModelViewController\models\Login_Model.php';
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        // echo '<br> are in index<br />';

    }
    function index()
    {
        $this->vew->render('login'.DS.'index');
    }
    function run()
    {
        $this->model->run();

    }
    function profile()
    {
        $this->model->profile();
        header("Refresh:0; url=" . URL . 'dashboard');
    }


}