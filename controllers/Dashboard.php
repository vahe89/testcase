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
            header('location: login');
            exit;
        }
    }
    function index()
    {
        $model = new Operators_model();
        $this->view->render('dashboard/index',['operators_list'=>[]]);
    }
    function logout()
    {
        Session::destroy();
        header('location: /login');
        exit;
    }

    function edit(){
        $id = $_POST['id'];

        if($id){
            $model = new Operators_Model();
            $data = $model->findOne($id);
            $content =  $this->view->render('dashboard/edit_form',['data'=>$data],true);
         }

        echo $content;
        exit();
    }
    function update(){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        if($id){
             $model = new Operators_Model();
             if($model->updateItem($id,$name,$phone)){
                 echo 1;
             }else{
                 echo 0;
             }


        }
        exit();
    }

    function dataList(){
        $model = new Operators_model();
        $data = $model->findAll(false);
        $result['data'] = $data;

        $operators_list = json_encode($result, true);
        echo $operators_list;
        exit();
    }

    function dataLogsList(){

        $model = new CallsLog_Model();
        $data = $model->findAll(false);

        $result['data'] = $data;

        $logs_list = json_encode($result, true);
        echo $logs_list;
        exit();
    }



}