<?php


class Operators_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function findAll(){
        try {
            $sth = $this->db->prepare("SELECT * FROM operators");
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $data;
    }



}