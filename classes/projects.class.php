<?php


class Projects extends DBConnection{

    /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function addProject($service_id, $child_service_id, $name, $dsc, $status, $added_by){	

        $name = addslashes(trim($name));
        $dsc  = addslashes(trim($dsc));

        $sql = "INSERT INTO `projects`
                            (`service_id`, `child_service_id`, `name`, `dsc`, `status`, `added_by`, `added_on`)
                            VALUES
                            ('$service_id', '$child_service_id', '$name', '$dsc', '$status', '$added_by', now())";

        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        $id =  $this->conn->insert_id;
        return $id;

    }//eof


    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function showProjects(){
        $data = array();
        $sql = "SELECT * FROM `projects`";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
        return $data;
    }//eof

    
    /**
     * retriving categories data for all services from `categories` table
     * @return array
     */
    function projectsByLimit($limit){
        $data = array();
        $sql = "SELECT * FROM `projects` ORDER BY `id` ASC LIMIT $limit";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
        return $data;
    }//eof

    function showProjectById($projectId){
        $data = array();
        $sql = "SELECT * FROM `projects` WHERE `id` = '$projectId'";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data = $result;
        }
        return $data;
    }//eof

    	
    function showProjectByChildServiceId($childServiceId){
        $data = array();
        $sql = "SELECT * FROM `projects` WHERE `child_service_id` = $childServiceId";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof


    function showProjectByServiceId($serviceId){
        $data = array();
        $sql = "SELECT * FROM `projects` WHERE `service_id` = $serviceId";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof

    
    function updateSingleData($id, $col, $value){
        $sql = "UPDATE `projects`
                SET
                `$col`          = '$value',
                `modified_on`        = now()
                WHERE
                `id`  	        = '$id'";
        $res = $this->conn->query($sql);

        return $res;

    }//eof



    /**
     * deleting services data from `services` table
     * @return boolean
     */
    function deleteProject($id){

        $retVal = $this->deleteProjectImage($id);
        var_dump($retVal);
        if ($retVal) {
            $sql = "DELETE FROM `projects` WHERE `id` = '$id'";
            $res = $this->conn->query($sql);
            return $res;
        }
    }//eof

    ##################################################################################
    #
    #                                  project_images
    #
    ##################################################################################


    function addProjectImage($projectId, $image, $added_by){	

        $sql = "INSERT INTO `project_images`
                            (`project_id`, `image`, `added_on`, `added_by`)
                            VALUES
                            ('$projectId', '$image', now(), '$added_by')";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // $id =  $this->conn->insert_id;
        return $res;

    }//eof




    function showProjectFeatureImage($projectId){
        $data = array();
        $sql = "SELECT * FROM project_images WHERE project_id = '$projectId' ORDER BY id DESC LIMIT 1";     
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data = $result;
        }
        return $data;
    }//eof



    function showProjectImageByPId($projectId){
        $data = array();
        $sql = "SELECT * FROM `project_images` WHERE `project_id` = $projectId";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_assoc()) {
            $data[] = $result;
        }
        return $data;
    }//eof


    /**
     * deleting services data from `services` table
     * @return boolean
     */
    function deleteProjectImage($projectId){
        $imageNames = $this->showProjectImageByPId($projectId);
        if (count($imageNames)>0) {
            foreach ($imageNames as $eachImage) {
                $filePath = '../../images/projects/'.$eachImage['image'];
                $unlinked = unlink($filePath);

                
                $nameOnly 		= pathinfo($eachImage['image'], PATHINFO_FILENAME);
                $fullNameOnly   = $nameOnly.'.webp';
                $filePath2 = '../../images/projects/'.$fullNameOnly;
                $unlinked = unlink($filePath2);


            }
            if ($unlinked) {   
                $sql = "DELETE FROM `project_images` WHERE `project_id` = '$projectId'";
                $res = $this->conn->query($sql);
                return $res;
            }else {
                return false;
            }
        }else {
            return true;
        }
    }//eof

    


    // function addProjectImage($service_id, $child_service_id, $name, $dsc, $status, $added_by){	

    //     $sql = "INSERT INTO `projects`
    //                         (`service_id`, `child_service_id`, `name`, `dsc`, `status`, `added_by`, `added_on`)
    //                         VALUES
    //                         ('$service_id', '$child_service_id', '$name', '$dsc', '$status', '$added_by', now())";

    //     // echo $sql.$this->conn->error;
    //     $res = $this->conn->query($sql);
    //     $id =  $this->conn->insert_id;
    //     return $id;

    // }//eof




    // /**
    //  * retriving categories data for all services from `categories` table
    //  * @return array
    //  */
    // function activeServices(){
    //     $data = array();
    //     $sql = "SELECT * FROM `projects` WHERE `status` <> 0";
    //     $res = $this->conn->query($sql);
    //     while ($result = $res->fetch_array()) {
    //         $data[] = $result;
    //     }
    //     return $data;
    // }//eof



    // /**
    //  * retriving userdata from table `user` by `user_id`
    //  * @param $id user_id
    //  * @return array
    //  */
    // function showServiceById($id){
    //     $data= array();
    //     $sql = "SELECT * FROM `projects` WHERE `id` = '$id'";
    //     $res = $this->conn->query($sql);
    //     $row = $res->num_rows;
    //     if ($row > 0 ) {
    //         while ($result = $res->fetch_array()) {
    //             $data = $result;
    //         }
    //     }
    //     return $data;

    // }//eof



    // /**
    //  * retriving userdata from table `user` by `user_id`
    //  * @param $id user_id
    //  * @return array
    //  */
    // function showCatByLimit($limit){

    //     $data= array();
    //     $sql = "SELECT name,id FROM `projects` LIMIT $limit";
    //     // echo $sql.$this->conn->error;exit;
    //     $res = $this->conn->query($sql);
    //     if ($res->num_rows > 0 ) {
    //         while ($result = $res->fetch_assoc()) {
    //             $data[] = $result;
    //         }
    //     }
    //     return $data;

    // }//eof



    // function updateService($id, $icon, $name, $dsc){
    //     $sql = "UPDATE `projects`
    //             SET
    //             `icon`          = '$icon',
    //             `name`          = '$name',
    //             `descreption`   = '$dsc',
    //             `edited`        = now()
    //             WHERE
    //             `id`  	        = '$id'";
    //             // echo $sql;
    //     $res = $this->conn->query($sql);

    //     return $res;

    // }//eof




    // function cancelService($id, $status){

    //     $sql = "UPDATE `projects` SET `status` = '$status', `edited` = now() WHERE `id` = '$id'";
    //     $res = $this->conn->query($sql);
    //     return $res;

    // }//eof


    // /**
    //  * deleting services data from `services` table
    //  * @return boolean
    //  */
    // function delCat($id){
    //     $sql = "DELETE FROM `services` WHERE `id` = '$id'";
    //     echo $sql;
    //     $res = $this->conn->query($sql);
    //     return $res;
    // }//eof

}


?>