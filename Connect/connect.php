<?php
//ket noi voi co so du lieu
class connect
{
    private $conn;
    public function connect()
    {
        if($this->conn === null) {
        $serverName = 'localhost';
        $userName = 'root';
        $passWord = '';
        $myDB = 'thietkewebsite';
        try {
            $this->conn = new PDO("mysql:host=$serverName;dbname=$myDB", username: $userName, password: $passWord);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        } catch (\Throwable $th) {
            echo 'ket noi voi co so du lieu failed' . $th->getMessage();
            return null;
        }
    }
    return $this->conn;
    }
}

//oop trong lap trinh