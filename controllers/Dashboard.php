<?php

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false)
        {
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }

        $this->vew->js1 = array('views'.DS.'dashboard'.DS.'js'.DS.'default.js');
        $this->vew->js = array('views'.DS.'dashboard'.DS.'js'.DS.'default.js');
    }
    function index()
    {
        $this->vew->render('dashboard'.DS.'index');
    }
    function logout()
    {
        Session::destroy();
        header('location: '.URL.'login');
        exit;
    }

    function xhrInsert()
    {
        $this->model->xhrInsert();
    }

    function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }



}