<?php
require_once '../Connect/connect.php';

class Coupon extends connect
 {
 public function listCoupon(){
    $sql = "select * from `coupons`";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
 public function addCoupon($name,$coupon_type,$coupon_code,$start_date,$end_date,$quantity,$status,$coupon_value){
    $sql = 'insert into coupons(name,coupon_type,coupon_code,start_date,end_date,quantity,status,coupon_value,created_at,updated_at)
    values(?,?,?,?,?,?,?,?,now(),now())';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$name,$coupon_type,$coupon_code,$start_date,$end_date,$quantity,$status,$coupon_value]);
 }
 public function editCoupon(){
    $sql = 'select * from coupons where coupon_Id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$_GET['coupon_Id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
 }
 public function updateCoupon($name,$coupon_type,$coupon_code,$start_date,$end_date,$quantity,$status,$coupon_value){
   $sql = 'update coupons set name = ?,coupon_type = ?,coupon_code = ? ,start_date = ? ,end_date = ?,quantity = ? , status = ?,coupon_value = ?,updated_at = now() where coupon_Id = ?';
   $stmt = $this->connect()->prepare($sql);
   return $stmt->execute([$name,$coupon_type,$coupon_code,$start_date,$end_date,$quantity,$status,$coupon_value,$_GET['coupon_Id']]);
 }
 public function deleteCoupon(){
    $sql = 'delete from coupons where coupon_Id';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$_GET['coupon_Id']]);
 }

 }
