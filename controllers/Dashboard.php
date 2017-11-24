<?php

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false && 1==0)
        {
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
    }
    function index()
    {
        $model = new Operators_model();
        $operators_list = $model->findAll();
        $this->view->render('dashboard'.DS.'index',['operators_list'=>$operators_list]);
    }
    function logout()
    {
        Session::destroy();
        header('location: '.URL.'login');
        exit;
    }


}