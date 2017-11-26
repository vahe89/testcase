<?php
//require PATH.'app/libs\Model.php';
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function login($username,$password)
    {
        Session::init();
        $errors = array();

            try {
                $sth = $this->db->prepare("SELECT * FROM users WHERE `username` = :username");
                $sth->execute(array(':username' => $username));

            } catch (PDOException $e) {
                die($e->getMessage());
            }

           $data = $sth->fetch();
            if (!empty($data)) {

                if(password_verify ($password,$data['password'])){
                    Session::set('user_id', $data['id']);
                    Session::set('username', $data['username']);
                    Session::set('loggedIn', true);

                    setcookie("id", $data['id'],time()+60*60*7);
                    setcookie("username", $username,time()+60*60*7);
                    return array('success'=>true,'message'=>'');
                }else{
                    return array('success'=>false,'message'=>'Password is not correct!');
                }


            } else {
                return array('success'=>false,'message'=>'Username not found!');

            }

        $_SESSION['errors'] = $errors;
    }

}