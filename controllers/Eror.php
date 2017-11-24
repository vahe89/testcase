<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 21-Sep-17
 * Time: 9:01 AM
 */
//require PATH.'app/libs\Controller.php';
class Eror extends Controller
{
    function __construct()
    {
        parent::__construct();
       // echo "This page doesn't exist";

    }
    function index()
    {
        //$this->vew->msg = "This page doesn't exist";
        $this->vew->render('error/index');
       // echo "This page doesn't exist";
    }

}
