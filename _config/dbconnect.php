<?php

class DBConnection{


    private $host;
    private $user;
    private $pass;
    private $db;

    public $conn;

    public function __construct(){
        $this->dbConnect();
    }

    function dbConnect(){

        $this->host="localhost";
        $this->user="root";
        $this->pass="";
        $this->db="imagine_db";

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn){
            die("Failed to connect: ". mysqli_connect_error());
        }else{
            return $this->conn;
        }
    }

    
}



?>