<?php

class CallRingCentral
{
    private $access_token;
    private $account_id;
    private $token_type;

    public static $LOGIN_URL = "http://tools.grandtetonprofessionals.com/get_rc_auth.php?p=i8ik65";
    public static $API_URL  = "https://platform.ringcentral.com/restapi/";



    public function __construct(){

        $connect_to = $this->call('GET','',false,false);
        $data_obj = json_decode($connect_to);

        $this->access_token = $data_obj->access_token;
        $this->account_id = $data_obj->owner_id;
        $this->token_type = ucfirst($data_obj->token_type);

    }

    public function get_call_logs($date_from,$date_to){
        $method = 'GET';
        $url = "v1.0/account/{$this->account_id}/call-log?view=Simple&dateFrom={$date_from}&dateTo={$date_to}";
        $calls_log_data_json = $this->Call($method,$url,false);

        $calls_log_data_obj = json_decode($calls_log_data_json);
        echo"<pre>";print_r($calls_log_data_obj);die;
    }

    private function call($method, $url, $data = false, $autorized = true)
    {
        $curl = curl_init();

        $headr = array();
        if($autorized){
            $url = self::$API_URL.$url;
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            $headr[] = 'Authorization: '.$this->token_type.' '.$this->access_token;

            curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
        }else{
            $url = self::$LOGIN_URL;
        }
        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

}