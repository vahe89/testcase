<?php
//require PATH.'app/libs\Model.php';
class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        //echo 111;
        //echo md5(knarik);
    }
    public function run()
    {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $password1 = $_POST['password1'];
            //echo "$login<br />";
            //echo "$password<br />";
        if ($password !== $password1){
            echo "Please repeat the same password";
            exit();
        }
        if (empty($username)||empty($password))
        {
            echo "Username and password are mandatory";
            exit();
        }
            try {
                // $sth = $this->db->query("SELECT `id` FROM ".DB_TABLE." WHERE `username` = '$username' AND `password` = '$password' " );
                $sth = $this->db->prepare(" INSERT INTO ". DB_TABLE1 ." (`id`, `username`, `password`, `first_name`, `last_name`) VALUES (NULL, :username  , :password, :firstname, :lastname  )");
                $sth->execute(array(':username' => $username,
                    ':password' => $password,
                    ':firstname' => $first_name,
                    ':lastname' => $last_name
                ));
               /* $sthh = $this->db->prepare("SELECT id FROM " . DB_TABLE1 . " WHERE `username` = :username AND `password` = :password ");
                $sthh->execute(array(':username' => $username,
                    ':password' => $password
                ));*/
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            //var_dump($sth) ;

            //$data = $sth->fetchAll();
            //print_r($data);
//        $data = $sthh->fetch();
        if ($sth == true) {

            Session::init();
            Session::set('loggedIn',true);
           // Session::set('id',$data['id']);
            Session::set('username',$username);
            Session::set('password',$password);
            Session::set('firstname',$first_name);
            Session::set('lastname',$last_name);
            echo "Registered Successfully";
            if (isset($_POST["remember"]))
            {
                setcookie("username", $username,time()+60*60*2);
                setcookie("password", $password,time()+60*60*2);
            }
            header("Refresh:1.2; url=".URL.'dashboard');
           // header('location: ' . URL . 'dashboard');
        }else {
            echo "ERROR";
        }

    }
}