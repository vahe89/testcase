<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 24-Sep-17
 * Time: 4:23 AM
 */
//require PATH.'app/libs\Model.php';
class Dashboard_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        //echo 'Dashboard model';
    }
    function xhrInsert()
    {
        //$login = $_POST['login'];
        //$password = $_POST['password'];
        $text = $_POST['text'];
        //echo $text;
        //var_dump($text);
        try {
           $sth = $this->db->query(" INSERT INTO " . DB_TABLE2 . " (`id`,`text`) VALUES (NULL, '$text')");
            echo json_encode($text);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    function xhrGetListings()
    {
        $sth = $this->db->prepare(' SELECT * FROM '.DB_TABLE2 );
        //$sth->setFetchMode(PDO);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }
}