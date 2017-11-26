<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $error = false;
        $message = '';
        if(!empty($_POST) && isset($_POST['username']) && isset($_POST['password'])){
            $model =new Login_Model();
            $result = $model->login($_POST['username'],$_POST['password']);
            if($result['success']){
                header('location: dashboard');
                exit();
            }else{
                $error = true;
                $message = $result['message'];
            }
        }

        $this->view->render('login/index',['error'=>$error,'message'=>$message]);
    }
    function run()
    {
        $this->model->run();
    }



}