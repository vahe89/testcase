<?php

class RingCentral extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {

        $ringCentral = new CallRingCentral();
        $date_to_obj = new DateTime();
        $date_to_day = $date_to_obj->format('Y-m-d');
        $date_to_time = $date_to_obj->format('H:i:s');

        $date_to = $date_to_day.'T'.$date_to_time.'.000Z';

        $date_from_obj =$date_to_obj->modify('-2 day');
        $date_from_date = $date_from_obj->format('Y-m-d');
        $date_from_time = $date_to_obj->format('H:i:s');
        $date_from = $date_from_date.'T'.$date_from_time.'.000Z';

        $calls_result = $ringCentral->get_call_logs($date_from,$date_to);

        $model = new CallsLog_Model();
        $operators_model  = new Operators_Model();
        $operators = $operators_model->findAll();
        $model->operators = $operators;
        $i = 0;
        if(isset($calls_result->records) && !empty($calls_result->records)){
            foreach($calls_result->records as $item){

                if($model->insertItem($item)){
                    $i++;
                }

            }
        }
        echo "Added {$i} items";
        exit();



    }

}