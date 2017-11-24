<?php
//require PATH.'app/libs\Model.php';
class UserEdit_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function edit()
	{

        $id = $_GET['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        try{
            $sth = $this->db->query(" UPDATE `users` SET `username` = '$username', `password` = '$password', `first_name` = '$first_name', `last_name` = '$last_name' WHERE `users`.`id` = '$id'");

        }catch (PDOException $e){
            die($e->getMessage());
        }
        //$sth = $this->db->query('UPDATE `users` SET `username` = '.$username.', `password` = '.$password.', `first_name` = '.$first_name.', `last_name` = '.$last_name.' WHERE users.`id` = '.$id);
        //var_dump($sthh);
        //var_dump($sth);
        if ($sth == true) {

            Session::init();
            Session::set('loggedIn',true);
            // Session::set('id',$id]);
            Session::set('username',$username);
            Session::set('password',$password);
            Session::set('firstname',$first_name);
            Session::set('lastname',$last_name);
            header("Refresh:0; url=".URL.'dashboard');
        }else {
            echo "ERROR";
        }

	}


}