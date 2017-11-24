<?php
//require PATH.'app/libs\Controller.php';
//require 'C:\xampp\htdocs\ModelViewController\libs\Viu.php';
//require 'C:\xampp\htdocs\ModelViewController\models\Login_Model.php';
class UserImages extends Controller
{
    function __construct()
    {
        parent::__construct();
       //  echo '<br> images index<br />';

    }
    function index()
    {
        //$user_id = $_GET['user_id'];
        $this->model->imageDisplay();
        $this->vew->render('images'.DS.'index');
        //die();
        //echo '<br> images index<br />';
    }
  function display()
  {
      $this->model->display();
      $this->vew->render('images'.DS.'index');
  }
    function imageInsertEditDelete()
    {
        //$this->loadModel('login');
        //$user_id = $_GET['user_id'];
        $this->model->imageInsertEditDelete();
        //header("Refresh:0; url=".URL.'userImages');
        //echo '< META HTTP-EQUIV="Refresh" Content="0; URL='.URL.'userImages'>';
        /*echo "< META HTTP-EQUIV='Refresh' Content='0; URL=".URL."userImages/display?user_id='.$user_id.'>";
        exit;*/
       
    }


}