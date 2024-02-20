<?php

require_once 'encrypt.inc.php';

class Login extends DBConnection{


    function adminLogin($user, $pass){

        $sql = "SELECT * FROM `admin` WHERE `username` = '$user' OR `email` = '$pass'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            $result = $res->fetch_assoc();
            
            $decryptedPasss = md5_decrypt($result['password'], ADMIN_PASS);

            if ($decryptedPasss == $pass) {
                
                session_start();
                $_SESSION['logedin']    = true;
                $_SESSION['username']   = $result['username'];
                $_SESSION['email']      = $result['email'];
                $_SESSION['userid']     = $result['id'];
                
                header("Location: dashboard.php");
                exit;
            }else {
                return "Incorrect Password";
            }
        }else {
            return "Invalid username or email";
        }

    }

    /**
     * retriving userdata for all user from `user` table
     * @return array
     */
    function userLogin($login_email, $login_pass){

        $sql = "SELECT * FROM `user` WHERE email = '$login_email'";
        $res = $this->conn->query($sql);
        $numRows = $res->num_rows;
        if ($numRows ==1) {
            while($result = $res->fetch_array()){

                if (password_verify($login_pass, $result['password'])) {
                    session_start();
                    $_SESSION['loggedin']  = true;
                    $_SESSION['userEmail'] = $login_email;
                    $_SESSION['userName']  = $result['fname'];
                    $_SESSION['user_id']   = $result['user_id'];
                    //echo "loggedin ".$row['user_name'];

                    if (isset($_SESSION['return-page'])) {
                        header("Location: ".$_SESSION['return-page']);
                        exit;
                    }else {
                        header("Location: ../index.php");
                        exit;
                    }
                }
                else{
                    return "Incorrect Password";
                    //header("Location: /php/PHP Form/index.php");
                }
            }

        }else{
            return "Invalid Username/Email";
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