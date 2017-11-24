<?php
//require PATH.'app/libs\Model.php';
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function run()
    {
        Session::init();
        $errors = array();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (isset($_POST["username"]) && isset($_POST["password"]))
        {
            try {
                $sth = $this->db->prepare("SELECT * FROM users WHERE `username` = :username AND `password` = :password ");
                $sth->execute(array(':username' => $username,
                    ':password' => $password
                ));

            } catch (PDOException $e) {
                die($e->getMessage());
            }

            $count = $sth->rowCount();

            if ($count > 0) {
                $data = $sth->fetch();
                Session::set('user_id', $data['id']);
                Session::set('username', $username);
                Session::set('loggedIn', true);
                if (isset($_POST["remember"]))
                {
                    setcookie("id", $data['id'],time()+60*60*7);
                    setcookie("username", $username,time()+60*60*7);
                }
                header('location: ' . URL . 'dashboard');
            } else {
                array_push($errors, "Wrong username/password combination");
                header('location: ' . URL . 'login');
            }
        }
        $_SESSION['errors'] = $errors;
    }

}