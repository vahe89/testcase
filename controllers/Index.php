<?php
//require PATH.'app/libs\Controller.php';
//require 'C:\xampp\htdocs\ModelViewController\libs\Viu.php';
class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
       // echo '<br> are in index<br />';

    }
    function index()
    {
        //echo 'inside index';
        $this->vew->render('index'.DS.'index');
    }
    function details()
    {
        $this->vew->render('index'.DS.'index');
    }

}