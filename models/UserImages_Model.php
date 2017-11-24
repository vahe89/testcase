<?php
//require PATH.'app/libs\Model.php';
class UserImages_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        //echo 111;
        //echo md5(knarik);
    }

    public function display()
    {
        $user_id = $_GET['user_id'];
        //echo 'Display';
       /* try {
        $sth = $this->db->query(' SELECT * FROM '.DB_TABLE2.' WHERE '.DB_TABLE2.'.`username` = '.$user_id );
        //$sth->setFetchMode(PDO);
        }catch (PDOException $e){
            die($e->getMessage());
        }
        $data = $sth->fetch();
        if ($sth == true) {
            Session::init();
            Session::set('image',$data['image']);
            Session::set('text',$data["text"]);
            //header("Refresh:0; url=".URL.'dashboard');
        }*/
        $sth = $this->db->query(' SELECT * FROM '.DB_TABLE2.' WHERE '.DB_TABLE2.'.`username` = '.$user_id );
       /* try {
            foreach ($sth as $row)
            {
                //$data = $sth->fetch();
                Session::set('image',$row['image']);
                Session::set('text',$row["text"]);
            }

        }catch (PDOException $e){
            die($e->getMessage());
        }*/
       //$sth->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sth->fetchAll();
       //var_dump($text_data);
            Session::init();
            //$_SESSION['data']=json_encode($text_data);
            //print_r(json_encode($_SESSION['data'],true));
            //Session::set('image',$data['image']);
            //Session::set('text',$data["text"]);
            Session::set('array',$data);
           // echo json_encode($text_data);
            //header("Refresh:0; url=".URL.'dashboard');
        }
    public function imageDisplay()
    {

        //if(isset($_POST["action"])) {
            $user_id = $_GET['user_id'];
            $sth = $this->db->query(' SELECT * FROM '.DB_TABLE2.' WHERE '.DB_TABLE2.'.`username` = '.$user_id );
            $data = $sth->fetchAll();
            Session::init();
            Session::set('array',$data);

            if ($_POST["action"] == "insert") {
                $text = $_POST['text'];
                //$user_id = $_GET['user_id'];
                $file = addslashes($_FILES['image']['tmp_name']);
                $file = file_get_contents($file);
                $file = base64_encode($file);
                //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $sth = $this->db->query(" INSERT INTO " . DB_TABLE2 . " (`id`, `image`, `text` ,`username`) VALUES (NULL,' $file ', '$text','$user_id') ");
                if ($sth == true) {
                    echo "Image Inserted Into database";
                    header("Refresh:0; url=" . URL . 'userImages');
                    //header('location:' .URL.'userImages?user_id='.$user_id);
                } else {
                    echo 'error';
                }
            }
            if ($_POST["action"] == "update") {

                //$user_id = $_GET['user_id'];
                $file = addslashes($_FILES['image']['tmp_name']);
                $file = file_get_contents($file);
                $file = base64_encode($file);
                $id = $_POST["image_id"];
                //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $sth = $this->db->query(" UPDATE  `images` SET `image`='$file' WHERE `images`.`id` = '$id' ");
                if ($sth == true) {
                    echo "Image Updated Into database";
                    header("Refresh:0; url=" . URL . 'userImages');
                    //header('location:' .URL.'userImages?user_id='.$user_id);
                } else {
                    echo 'error';
                }
            }
            if ($_POST["action"] == "delete") {
                $id = $_POST["image_id"];
                $sth = $this->db->query(" DELETE FROM " . DB_TABLE2 . " WHERE id = '$id' LIMIT 1 ");
                if ($sth == true) {
                    echo "Image Deleted from database";
                } else {
                    echo 'error';
                }

            }
        //}

    }
    public function imageInsertEditDelete()
    {

        if ($_POST["action"] == "insert") {
            $user_id = $_GET['user_id'];
            $text = $_POST['text'];
        $file = addslashes($_FILES['image']['tmp_name']);
        $file = file_get_contents($file);
        $file = base64_encode($file);
        //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $sth = $this->db->query(" INSERT INTO ".DB_TABLE2." (`id`, `image`, `text` ,`username`) VALUES (NULL,' $file ', '$text','$user_id') ");
        if ($sth == true) {
            echo "Image Inserted Into database";
            //header("Refresh:0; url=" . URL . 'userImages/display?user_id='.$user_id);
            //header("Refresh:0; url=".URL.'userImages');
            //header('location:' .URL.'userImages?user_id='.$user_id);
        } else {
            echo 'error';
        }
        }
        if ($_POST["action"] == "update") {

                $file = addslashes($_FILES['image']['tmp_name']);
                $file = file_get_contents($file);
                $file = base64_encode($file);
                $text = $_POST['text'];
                $id = $_POST["image_id"];
                //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $sth = $this->db->query(" UPDATE  `images` SET `image`='$file', `text`='$text' WHERE `images`.`id` = '$id' ");
                if ($sth == true) {
                    echo "Image Updated Into database";
                    //header("Refresh:0; url=" . URL . 'userImages/display?user_id='.$user_id);
                    //header('location:' .URL.'userImages?user_id='.$user_id);
                } else {
                    echo 'error';
                }
        }
        if ($_POST["action"] == "delete") {
            $id = $_POST["image_id"];
            $sth = $this->db->query(" DELETE FROM ".DB_TABLE2." WHERE id = '$id' LIMIT 1 ");
            if ($sth == true) {
                echo "Image Deleted from database";
                //header("Refresh:0; url=" . URL . 'userImages/display?user_id='.$user_id);
            } else {
                echo 'error';
            }

        }
        //header("Refresh:0; url=" . URL . 'userImages/display?user_id='.$user_id);
        //exit;

    }


}