<?php


class CallsLog_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function updateOperatorID(){
        $sth = $this->db->prepare("SELECT * FROM calls_log where operator_id IS NULL");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_CLASS);

        $operators = $this->findAllOperators();

        foreach($data as $call_item){
            foreach($operators as $op_item){
                if($op_item->phone == $call_item->inbound_number){

                }
            }
        }
        echo"<pre>";print_r($data);die;
    }

    public function findAllOperators(){
      $sth = $this->db->prepare("SELECT * FROM operators");
      $sth->execute();
      $data = $sth->fetchAll(PDO::FETCH_CLASS);
      return $data;
    }



}