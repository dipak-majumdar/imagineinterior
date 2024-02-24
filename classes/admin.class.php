

<?php

class Admin extends DBConnection{


    function addAdmin($fname, $lname, $username, $email, $pass){
        $fname      = addslashes($fname);
        $lname      = addslashes($lname);
        $username   = addslashes($username);
        $email      = addslashes($email); 
        $pass       = addslashes($pass);

        $sql = "INSERT INTO `admin` (`fname`, `lname`, `username`, `email`, `password`, `added_on`) VALUES ('$fname', '$lname', '$username', '$email', '$pass', now())";
        // echo $sql.$this->conn->error;
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


    function showAdminDetails($adminId){
        $data= array();
        $sql = "SELECT * FROM `admin_details` WHERE `admin_id` = '$adminId'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_assoc()) {
                $data = $result;
            }
        }
        return $data;

    }//eof


    
    public function updateAdminDetails($admin_id, $about, $job, $phone, $email, $twitter, $facebook, $instagram, $linkedin) {
        try {
            // Prepare SQL statement with placeholders
            $sql = "UPDATE admin_details
                        SET about = ?,
                            designation = ?,
                            phone = ?,
                            email = ?,
                            x = ?,
                            fb = ?,
                            insta = ?,
                            linkd = ?
                        WHERE admin_id = ?";
            
            // Prepare the statement
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bind_param("ssssssssi", $about, $job, $phone, $email, $twitter, $facebook, $instagram, $linkedin, $admin_id);
            
            // Execute the statement
            $stmt->execute();
            
            // Check for errors
            if ($stmt->errno !== 0) {
                throw new Exception("Error: " . $stmt->error);
            } else {
                return "Admin details updated successfully.";
            }
            
            // Close the statement
            $stmt->close();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    

}


?>