<?php 
require_once '../Connect/connect.php';

class User extends connect{
    public function register($name,$email,$password) {
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      $sql = 'insert into users (name,email,password,role_id) values (?,?,?,1)';
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$name,$email,$hash_password]);
    }
    public function login($email,$password) {
        $sql = 'select * from users where email =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user && password_verify($password,$user['password'])){
            return $user;
        }
        return false;
    }
    public function updateUser($name,$email,$phone,$address,$gender) {
        $sql = 'update users set name=?,email=?,phone=?,address=?,gender=? where user_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$email,$phone,$address,$gender,$_SESSION['user']['user_id']]);
    }
    public function getUserById($id) {
        $sql = 'select * from users where user_id =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function listUser() {
        $sql = "select * from `users`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteUser() {
        $sql = 'delete from users where user_id';
        $stmt = $this->connect()->prepare($sql);

        return $stmt->execute([$_GET['user_id']]);
    }
}