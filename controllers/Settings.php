<?php
//require PATH.'app/libs\Controller.php';
class Settings extends Controller
{
    function __construct()
    {
        parent::__construct();
        //echo 'We are inside help <br />';

    }
    function index()
    {
        $this->vew->render('settings'.DS.'index');
    }

}