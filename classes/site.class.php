<?php


class SiteInfo extends DBConnection{



    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addSiteData($name, $dsc){
        
        $sql = "INSERT INTO `site_info` (`name`, `descreption`, `created`) VALUES ('$name', '$dsc', now())";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



    function updateSiteAddress($contact1, $contact2, $email, $address1, $address2, $city, $state, $pin,
    $country){

        $contact1       = addslashes(trim($contact1));
        $contact2       = addslashes(trim($contact2));
        $email          = addslashes(trim($email));
        $address1       = addslashes(trim($address1));
        $address2       = addslashes(trim($address2));
        $city           = addslashes(trim($city));
        $state          = addslashes(trim($state));
        $pin            = addslashes(trim($pin));
        $country        = addslashes(trim($country));
        
        $sql = "UPDATE `site_info`
                SET
                `contact1`      = '$contact1',
                `contact2`      = '$contact2',
                `email`         = '$email',
                `address1`      = '$address1',
                `address2`      = '$address2',
                `city`          = '$city',
                `state`         = '$state',
                `pin`           = '$pin',
                `country`       = '$country'
                WHERE 
                `id`        = 1";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



    function updateSiteData1($col1, $data1){
        
        $sql = "UPDATE `site_info`
                SET
                `$col1`     = '$data1'
                WHERE 
                `id`        = 1";
        $res = $this->conn->query($sql);
        return $res;

    }//eof


    function updateSiteData2($col1, $data1, $col2, $data2){
        
        $sql = "UPDATE `site_info`
                SET
                `$col1`     = '$data1',
                `$col2`     = '$data2'
                WHERE 
                `id`        = 1";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function showSiteInfo(){
        $data = array();
        $sql = "SELECT * FROM `site_info`";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data = $result;
        }
        return $data;
    }//eof


    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function activeCategories(){
        $data = array();
        $sql = "SELECT * FROM `catagories` WHERE `status` <> 0";
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
    function showCatById($id){
        $data= array();
        $sql = "SELECT * FROM `catagories` WHERE `id` = '$id'";
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
     * retriving userdata from table `user` by `user_id`
     * @param $id user_id
     * @return array
     */
    function showCatByLimit($limit){

        $data= array();
        $sql = "SELECT name,id FROM `catagories` LIMIT $limit";
        // echo $sql.$this->conn->error;exit;
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0 ) {
            while ($result = $res->fetch_assoc()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof



    function updateCat($id, $name, $dsc){
        $sql = "UPDATE `catagories`
                SET
                `name`          = '$name',
                `descreption`   = '$dsc',
                `edited`        = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof



    function cancelCat($id, $status){

        $sql = "UPDATE `catagories` SET `status` = '$status', `edited` = now() WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;

    }//eof


    /**
     * deleting category data from `catagories` table
     * @return boolean
     */
    function delCat($id){
        $sql = "DELETE FROM `catagories` WHERE `id` = '$id'";
        echo $sql;
        $res = $this->conn->query($sql);
        return $res;
    }//eof

    

}


?>