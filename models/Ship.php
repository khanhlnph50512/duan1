<?php
require_once '../Connect/connect.php';

class Ship extends connect{
    public function getAllShip(){
        $sql = 'select * from ships';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getShipById($id){
        $sql = "SELECT * FROM ships WHERE ship_Id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}