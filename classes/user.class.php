

<?php

class User extends DBConnection{



    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addUser($fname, $lname, $username, $email, $pass, $status){
        
        $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `email`, `password`, `status`, `reg_time`) VALUES ('$fname', '$lname', '$username', '$email', '$pass', '$status', now())";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // var_dump($res);
        $id  = $this->conn->insert_id;
        return $id;

    }//eof



    /**
     * retriving userdata for all user from `user` table
     * @return array
     */
    function showUsers(){

        $sql = "SELECT * FROM `user`";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
            return $data;
        }else {
            return array();
        }

    }//eof



    /**
     * retriving userdata from table `user` by `user_id`
     * @param $id user_id
     * @return array
     */
    function showUsserById($id){
        $data= array();
        $sql = "SELECT * FROM `user` WHERE `user_id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof


    /**
     * retriving userdata from table `user` by `user_name`
     * @param $username username
     * @return array
     */
    function showUserByUserId($username){

        $data= array();
        $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof


    function cancelUser($id, $status){

        $sql = "UPDATE `user` SET `status` = '$status', `reg_time` = now() WHERE `user_id` = '$id'";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        return $res;

    }//eof
    

    function delUser($id){
        $sql = "DELETE FROM `user` WHERE `user_id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    }//eof

    

}


?>