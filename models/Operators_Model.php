<?php


class Operators_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function findAll($obj = true){
        try {
            $sth = $this->db->prepare("SELECT * FROM operators");
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

    public function findOne($id){
        try {
            $sth = $this->db->prepare("SELECT * FROM operators WHERE id=:id");

            $sth->execute(array(':id' => $id));
            $data = $sth->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $data;
    }

    public function updateItem($id,$name,$phone){
        $sql = "UPDATE operators SET `name` = '{$name}', `phone` = '{$phone}' WHERE id = $id";
        $stmt =  $this->db->prepare($sql);
      return $stmt->execute();


    }



}