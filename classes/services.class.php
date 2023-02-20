<?php


class Services extends DBConnection{

    

    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addService($name, $dsc, $icon, $childServices=0, $projectsNos=0){
        
        $sql = "INSERT INTO `services` (`name`, `descreption`, `icon`, `child_services`, `projects_nos`, `created`) VALUES ('$name', '$dsc', '$icon', '$childServices', '$projectsNos', now())";

        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // echo $res;
        return $res;

    }//eof



    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function showServices(){
        $data = array();
        $sql = "SELECT * FROM `services` ORDER BY id ASC";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof


    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function activeServices(){
        $data = array();
        $sql = "SELECT * FROM `services` WHERE `status` <> 0";
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
    function showServiceById($id){
        $data= array();
        $sql = "SELECT * FROM `services` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_assoc()) {
                $data = $result;
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
        $sql = "SELECT name,id FROM `services` LIMIT $limit";
        // echo $sql.$this->conn->error;exit;
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0 ) {
            while ($result = $res->fetch_assoc()) {
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
    function showServiceSingleData($col, $id){
        $data= array();
        $sql = "SELECT $col FROM `services` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            $result = $res->fetch_assoc();
            $data = $result;
        }
        return $data;

    }//eof


    
    function updateService($id, $icon, $name, $dsc){
        $sql = "UPDATE `services`
                SET
                `icon`          = '$icon',
                `name`          = '$name',
                `descreption`   = '$dsc',
                `edited`        = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof




    function updateServiceText($id, $name, $dsc){
        $sql = "UPDATE `services`
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


    function cancelService($id, $status){

        $sql = "UPDATE `services` SET `status` = '$status', `edited` = now() WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



     /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function incrServiceChild($serviceId){
        
        $sql = "UPDATE `services`
                SET
                child_services        = child_services+1,
                edited                = now()
                WHERE
                id  	              = '$serviceId'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof



    /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function incrServiceproject($serviceId){
        
        $sql = "UPDATE `services`
                SET
                projects_nos          = projects_nos+1,
                edited                = now()
                WHERE
                id  	              = '$serviceId'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof


    
    /**
     * deleting services data from `services` table
     * @return boolean
     */
    function serviceDelete($id){
        $sql = "DELETE FROM `services` WHERE `id` = '$id'";
        // echo $sql;
        $res = $this->conn->query($sql);
        return $res;
    }//eof




    #############################################################################################
    #                                                                                           #
    #                                       Child Services                                      #
    #                                                                                           #
    #############################################################################################


    
    /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function addChildService($parentId, $name, $dsc, $icon, $featureImage, $projectsNos=0){
        
        $sql = "INSERT INTO `child_services` 
                            (`parent_id`, `name`, `dsc`, `icon`, `feature_image`, `projects_nos`, `added_on`)
                    VALUES ('$parentId', '$name', '$dsc', '$icon', '$featureImage', '$projectsNos', now())";

        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // print_r($res);
        return $res;

    }//eof


    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function showChildServices(){
        $data = array();
        $sql = "SELECT * FROM `child_services` ORDER BY `parent_id` ASC";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof

    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function showChildServicesByLimit($limit){
        $data = array();
        $sql = "SELECT * FROM `child_services` ORDER BY `parent_id` ASC LIMIT $limit";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof


    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function activeChildServices(){
        $data = array();
        $sql = "SELECT * FROM `child_services` WHERE `status` <> 0 ORDER BY `parent_id` ASC ";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof


    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    // function allChildServices(){
    //     $data = array();
    //     $sql = "SELECT * FROM `child_services`";
    //     $res = $this->conn->query($sql);
    //     while ($result = $res->fetch_array()) {
    //         $data[] = $result;
    //     }
    //     return $data;
    // }//eof



    function childServiceById($childServiceId){
        $data = array();
        $sql = "SELECT * FROM `child_services` WHERE `id` = $childServiceId";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data = $result;
        }
        return $data;
    }//eof




    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function activeChildServicesByParent($parentId){
        $data = array();
        $sql = "SELECT * FROM `child_services` WHERE `parent_id` = '$parentId' AND `status` <> 0";
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
    function showChildServiceSingleData($col, $id){
        $data= array();
        $sql = "SELECT $col FROM `child_services` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            $result = $res->fetch_assoc();
            $data = $result;
        }
        return $data;

    }//eof




    function updateChildService($id, $parentId, $name, $dsc, $icon, $feature_image){
        $deleteable = $this->childServiceById($id);
        if ($deleteable['icon'] != $icon) {
            if ($icon != null) {
                $this->deleteChildImage($id, 'icon');
            }
        }
        if ($deleteable['feature_image'] != $feature_image) {
            if ($feature_image != null) {
                $this->deleteChildImage($id, 'feature_image');
            }
        }
        $sql = "UPDATE `child_services`
                SET
                `parent_id`     = '$parentId',
                `name`          = '$name',
                `dsc`           = '$dsc',
                `icon`          = '$icon',
                `feature_image` = '$feature_image',
                `modified_on`   = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof


    function updateChildStatus($id, $status){

        $sql = "UPDATE `child_services`
                SET
                `status` = '$status',
                `modified_on`   = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof
    

     /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function incrChildServiceProject($childServiceId){
        
        $sql = "UPDATE `child_services`
                SET
                projects_nos        = projects_nos+1,
                modified_on         = now()
                WHERE
                id  	            = '$childServiceId'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof



         /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function decrChildServiceProject($childServiceId){
        
        $sql = "UPDATE `child_services`
                SET
                projects_nos        = projects_nos-1,
                modified_on         = now()
                WHERE
                id  	            = '$childServiceId'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof



    /**
     * deleting services data from `services` table
     * @return boolean
     */
    function childServiceDelete($id){
        $sql = "DELETE FROM `child_services` WHERE `id` = '$id'";
        // echo $sql;
        $res = $this->conn->query($sql);
        if ($res) {
            $this->decrChildServiceProject($id);
        }
        return $res;
    }//eof



    function deleteChildImage($id, $colname){
        $deleteable = $this->childServiceById($id);
        if (count($deleteable)>0) {
            
            $filePath = '../../images/services/'.$deleteable[$colname];
            $unlinked = unlink($filePath);
            
            if ($unlinked) {
                return true;
            }else {
                return false;
            }
        }else {
            return true;
        }
    }//eof
}


?>