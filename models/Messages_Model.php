<?php


class Messages_Model
{
    public function replaceVars($data, $text){
        $allowed_vars = self::getAllowedvars();

        foreach($data as $key=>$var){
            $variable = $allowed_vars[$key];
            switch ($variable['type']){
                case 'string':
                     $replacemenet = (!empty($var))?$var:$variable['on_empty'];
                    break;
                case 'datetime':
                    $replacemenet = (!empty($var))?date('m/d/Y',strtotime($var)):$variable['on_empty'];
                    break;
                case 'phone':
                    $phone_numbers = preg_replace('/[^0-9]/', '',$var);
                    if(!empty($phone_numbers)){

                        $replacemenet = self::format_phone_us($phone_numbers);

                    }else{
                        $replacemenet = $variable['on_empty'];
                    }

                    break;
                    default;
                     $replacemenet = (!empty($var))?$var:$variable['on_empty'];
                    break;
            }

            foreach($variable['items'] as $var_item){
                $text = str_replace($var_item,$replacemenet,$text);
            }

        }

        return $text;

    }

    public static function getAllowedvars(){
        $var_types = array();
        $var_types['name'] = array('type'=>'string','on_empty'=>'Not Set', 'items'=>array('{name}','{#name}','{$name}','[name]','[#name]') );
        $var_types['phone'] = array('type'=>'phone','on_empty'=>'Not Set', 'items'=>array('{phone}','{#phone}','{$phone}','[phone]','[#phone]') );
        $var_types['last_call'] = array('type'=>'datetime','on_empty'=>'Not Set', 'items'=>array('{last_call}','{#last_call}','{$last_call}','[last_call]','[#last_call]') );
        return $var_types;

    }

    public  static function format_phone_us($phone) {


        $length = strlen($phone);
        switch($length) {
            case 7:
                return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
                break;
            case 10:
                return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
                break;
            case 11:
                return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
                break;
            default:
                return $phone;
                break;
        }
    }
}