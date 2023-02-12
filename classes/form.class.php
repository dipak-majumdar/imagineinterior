<?php


class Form extends DBConnection{


    #################################################################################
    #                                                                               #
    #                                     Query Form                                #
    #                                                                               #
    #################################################################################
    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addQueryForm($name, $contactNo, $email, $designeFor, $budget){
        
        $sql = "INSERT INTO `query_form`
                        (`name`, `contact_no`, `email`, `design_for`, `budget`, `added_on`)
                VALUES ('$name', '$contactNo', '$email', '$designeFor', '$budget', now())";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function showQueryForms(){

        $data = array();
        $sql = "SELECT * FROM `query_form` ORDER BY added_on DESC";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;

    }//eof




    /**
     * retriving userdata from table `user` by `user_id`
     * @param $id user_id
     * @return array
     */
    function showQueryById($id){

        $data= array();
        $sql = "SELECT * FROM `query_form` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof


    function showQueriesByStatus($status){

        $data= array();
        $sql = "SELECT * FROM `query_form` WHERE `status` = '$status'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof



    function updateQueryData($id, $col, $colVal){
        $sql = "UPDATE `query_form`
                SET
                `$col`          = '$colVal',
                `modified_on`   = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // var_dump($res);
        return $res;

    }//eof



    /**
     * deleting category data from `catagories` table
     * @return boolean
     */
    function delQuery($id){
        $sql = "DELETE FROM `query_form` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    }//eof






    #################################################################################
    #                                                                               #
    #                                     Contact Form                              #
    #                                                                               #
    #################################################################################
    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addContactForm($name, $contactNo, $email, $message, $status){
        
        $sql = "INSERT INTO `contact_form`
                            (`name`, `contact_no`, `email`,	`message`, `status`, `added_on`)
                    VALUES ('$name', '$contactNo', '$email', '$message', '$status', now())";
                    // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        return $res;

    }//eof



    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function showContactForms(){

        $data = array();
        $sql = "SELECT * FROM `contact_form` ORDER BY added_on DESC";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
        return $data;

    }//eof




    /**
     * retriving userdata from table `user` by `user_id`
     * @param $id user_id
     * @return array
     */
    function showContactById($id){

        $data= array();
        $sql = "SELECT * FROM `contact_form` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof


    function showContactByStatus($status){

        $data= array();
        $sql = "SELECT * FROM `contact_form` WHERE `status` = '$status'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof



    function updateContactData($id, $col, $colVal){
        $sql = "UPDATE `contact_form`
                SET
                `$col`          = '$colVal',
                `modified_on`   = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // var_dump($res);
        return $res;

    }//eof



    /**
     * deleting category data from `catagories` table
     * @return boolean
     */
    function delContact($id){
        $sql = "DELETE FROM `contact_form` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    }//eof
    

}


?>