

<?php

class Contact extends DBConnection{


    function addContact($name, $email, $contact_no, $message, $send_by){

        $sql = "INSERT INTO `contacts` (`name`, `email`, `contact_no`, `message`, `send_by`, `added_on`)
                VALUES ('$name', '$email', '$contact_no', '$message', '$send_by', now())";
        $res = $this->conn->query($sql);
        // return $res;
        $id  = $this->conn->insert_id;
        return $id;

    }//eof




    function showContacts(){

        $sql = "SELECT * FROM `contacts`";
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



    /********************************************************************************************
     *                                                                                          *
     *                              id mail status added_on                                     *
     * 	                                                                                        *
     ********************************************************************************************/


     function addSubscriber($email){
        try {
            $sql = "INSERT INTO `subscribers` (mail, status, added_on)
                    VALUES ('$email', '1', now())";
            $res = $this->conn->query($sql);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }//eof



    function disableSubscriber($mail){

        $mail = addslashes(trim($mail));
        $sql = "UPDATE `subscribers` SET status = '0' WHERE mail = '$mail';
                VALUES ('$mail, '1', now())";
        $res = $this->conn->query($sql);
        return $res;

    }//eof
}


?>