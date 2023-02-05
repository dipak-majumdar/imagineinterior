

<?php

class Admin extends DBConnection{


    function addAdmin($fname, $lname, $username, $email, $pass){

        $sql = "INSERT INTO `admin` (`fname`, `lname`, `username`, `email`, `password`, `added_on`) VALUES ('$fname', '$lname', '$username', '$email', '$pass', now())";
        $res = $this->conn->query($sql);
        // return $res;
        $id  = $this->conn->insert_id;
        return $id;

    }//eof




    function showAdmins(){

        $sql = "SELECT * FROM `admin`";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
            return $data;
        }else {
            return 0;
        }

    }//eof



    function showAdminByEmail($email){
        $data= array();
        $sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof



    function showAdminByuser($username){
        $data= array();
        $sql = "SELECT * FROM `admin` WHERE `username` = '$username'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof


    

}


?>