<?php


class CallsLog_Model extends Model
{

    public $operators;

    function __construct()
    {
        parent::__construct();
    }



    public function findAllOperators(){
      $sth = $this->db->prepare("SELECT * FROM operators");
      $sth->execute();
      $data = $sth->fetchAll(PDO::FETCH_CLASS);
      return $data;
    }

    public function insertItem($item){

        if(isset($item->to)){
            if(isset($item->to->phoneNumber)){
                $inbound_number = $item->to->phoneNumber;
            }else{
                return false;
            }
        }else{
            return false;
        }


        $outbound_number = (isset($item->from) && isset($item->from->phoneNumber)) ?$item->from->phoneNumber:$inbound_number;
        $duration = (isset($item->duration))?$item->duration:0;
        $call_time = $item->startTime;


        foreach($this->operators as $operator){
            $operator_id = null;
            $phone_numbers = preg_replace('/[^0-9]/', '', $operator->phone);

            $inbound_phone_number = preg_replace('/[^0-9]/', '', $inbound_number);

            if($phone_numbers == $inbound_phone_number ){
                $operator_id = $operator->id;
                $op_model = new Operators_Model();
                $oper = $op_model->findOne($operator_id);
                break;
            }
        }

        $sql = "INSERT INTO calls_log (`call_time`,`operator_id`,`inbound_number`,`outbound_number`,`duration`) values (:call_time,:operator_id,:inbound_number,:outbound_number,:duration)";
        $sth = $this->db->prepare($sql);
        $arr = array(
            'inbound_number'=>$inbound_number,
            'outbound_number'=>$outbound_number,
            'duration'=>$duration,
            'call_time'=>$call_time,
            'operator_id'=>$operator_id
        );

        $sth->execute($arr);

        if($operator_id){
            $now = new DateTime();
            $d_obj = new DateTime($call_time);
            $original_time = new DateTime($oper->last_call_time);
            $interval = $now->diff($d_obj);
            $diff_hour = $interval->h;

            if(!$oper->last_call_time || ($original_time->format('Y-m-d H:i:s')<$d_obj->format('Y-m-d H:i:s'))){
                $sub_sql = " last_call_time = '{$d_obj->format('Y-m-d H:i:s')}', ";
            }else{
                $sub_sql = '';
            }
            if($diff_hour <=6){

                $sql = "UPDATE operators SET {$sub_sql} calls_count_6=calls_count_6+1,calls_count_24=calls_count_24+1,calls_count_48=calls_count_48+1 WHERE id={$operator_id}";

                $sth = $this->db->prepare($sql);
                $sth->execute();
            }elseif($diff_hour <=24){
                $sql = "UPDATE operators SET {$sub_sql} calls_count_24=calls_count_24+1,calls_count_48=calls_count_48+1 WHERE id={$operator_id}";
                $sth = $this->db->prepare($sql);
                $sth->execute();
            }elseif($diff_hour <=48){
                $sql = "UPDATE operators SET {$sub_sql} calls_count_48=calls_count_48+1 WHERE id={$operator_id}";
                $sth = $this->db->prepare($sql);
                $sth->execute();
        }

        }
        return true;

    }

    public function getOperatorbyPhone($phone){
        $str = 'In My Cart : 11 12 items';
        preg_match_all('!\d+!', $str, $matches);
        print_r($matches);
    }

    public function findAll($obj = true){
        try {
            $sth = $this->db->prepare("SELECT o.name, cl.id,cl.call_time, cl.inbound_number,cl.outbound_number, cl.duration FROM calls_log as cl LEFT JOIN operators as o ON o.id=cl.operator_id");
            $sth->execute();
            if($obj){
                $data = $sth->fetchAll(PDO::FETCH_CLASS);
            }else{
                $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $data;
    }



}