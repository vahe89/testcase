<?php

class RingCentral extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
//        $ringCentral = new CallRingCentral();
//
//        $date_to_obj = new DateTime();
//        $date_to = $date_to_obj->format('Y-m-d H:i:s');
//
//        $date_from =$date_to_obj->modify('-2 day')->format('Y-m-d H:i:s');
//        $date_to = '2017-11-22T12:07:53.175Z';
//        $date_from = '2017-11-20T12:07:53.175Z';
//        $calls_result = $ringCentral->get_call_logs($date_from,$date_to);

        $model = new CallsLog_Model();
        $model->updateOperatorID();

    }

}