

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


    
    // public function updateAdminDetails($admin_id, $fname, $lname, $about, $job, $phone, $twitter, $facebook, $instagram, $linkedin) {
    //     try {
    //         // Prepare SQL statement with placeholders
    //         $sql = "UPDATE admin_details
    //                     SET about = ?,
    //                         designation = ?,
    //                         x = ?,
    //                         fb = ?,
    //                         insta = ?,
    //                         linkd = ?
    //                     WHERE admin_id = ?";
            
    //         // Prepare the statement
    //         $stmt = $this->conn->prepare($sql);
            
    //         // Bind parameters
    //         $stmt->bind_param("ssssssi", $about, $job, $twitter, $facebook, $instagram, $linkedin, $admin_id);
            
    //         // Execute the statement
    //         $stmt->execute();
            
    //         // Check for errors
    //         if ($stmt->errno !== 0) {
    //             throw new Exception("Error: " . $stmt->error);
    //         } else {
    //             return "Admin details updated successfully.";
    //         }
            
    //         // Close the statement
    //         $stmt->close();
    //     } catch (Exception $e) {
    //         return "Error: " . $e->getMessage();
    //     }
    // }
    

    public function updateAdminDetails($admin_id, $fname, $lname, $about, $job, $phone, $twitter, $facebook, $instagram, $linkedin) {
        try {
            // Start transaction
            $this->conn->begin_transaction();
    
            // Update admin_details table
            $sql_details = "UPDATE admin_details
                            SET about = ?,
                                designation = ?,
                                x = ?,
                                fb = ?,
                                insta = ?,
                                linkd = ?
                            WHERE admin_id = ?";
            $stmt_details = $this->conn->prepare($sql_details);
            $stmt_details->bind_param("ssssssi", $about, $job, $twitter, $facebook, $instagram, $linkedin, $admin_id);
            $stmt_details->execute();
            
            // Check for errors
            if ($stmt_details->errno !== 0) {
                throw new Exception("Error updating admin_details: " . $stmt_details->error);
            }
    
            // Update admin table
            $sql_admin = "UPDATE admin
                          SET fname = ?,
                              lname = ?,
                              mob_no = ?
                          WHERE id = ?";
            $stmt_admin = $this->conn->prepare($sql_admin);
            $stmt_admin->bind_param("sssi", $fname, $lname, $phone, $admin_id);
            $stmt_admin->execute();
    
            // Check for errors
            if ($stmt_admin->errno !== 0) {
                throw new Exception("Error updating admin: " . $stmt_admin->error);
            }
    
            // Commit transaction
            $this->conn->commit();
    
            // Close statements
            $stmt_details->close();
            $stmt_admin->close();
    
            return "Admin Details Updated Successfully.";
        } catch (Exception $e) {

            // Rollback transaction on error
            $this->conn->rollback();
            return "Error: " . $e->getMessage();

        }
    }

    // function selectFeaturedAdmin() {
    //     try {
    //         // Prepare SQL statement
    //         $sql = "SELECT * FROM admin_details WHERE featured = 1";
    
    //         // Execute the query
    //         $result = $this->conn->query($sql);
    
    //         // Check if there are any results
    //         if ($result->num_rows > 0) {
    //             // Fetch associative array
    //             $featuredAdmins = array();
    //             while ($row = $result->fetch_assoc()) {
    //                 $featuredAdmins[] = $row;
    //             }
    //             // Free result set
    //             $result->free_result();
    //             return $featuredAdmins;
    //         } else {
    //             return "No featured admin found.";
    //         }
    //     } catch (Exception $e) {
    //         return "Error: " . $e->getMessage();
    //     }
    // }
    
    function selectFeaturedAdmin() {
        try {
            // Prepare SQL statement
            $sql = "SELECT ad.*, a.fname, a.lname, a.mob_no, a.email 
                    FROM admin_details ad 
                    JOIN admin a ON ad.admin_id = a.id 
                    WHERE ad.featured = 1";
    
            // Execute the query
            $result = $this->conn->query($sql);
    
            // Check if there are any results
            if ($result->num_rows > 0) {
                // Fetch associative array
                $featuredAdmins = array();
                while ($row = $result->fetch_assoc()) {
                    $featuredAdmins[] = $row;
                }
                // Free result set
                $result->free_result();
                return $featuredAdmins;
            } else {
                return "No featured admin found.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    

}


?>