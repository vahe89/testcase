<?php

class Message extends Controller
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
        $model = new Messages_Model();

        $operators_model = new Operators_Model();
        $operators_list = $operators_model->findAll();
        $this->view->render('messages/index',['operators'=>$operators_list]);
    }

    function popup(){
        $operator_id = $_POST['operator_id'];
        if($operator_id > 0){
            $model = new Messages_Model();
            $op_model = new Operators_Model();
            $operator = $op_model->findOne($operator_id);
            $data['name'] = $operator->name;
            $data['phone']=$operator->phone;
            $data['last_call']=$operator->last_call_time;
            $text = $model->replaceVars($data,$_POST['message']);
            echo $text;
        }else{
            echo 'Please select operator';
        }

        exit;
    }
}