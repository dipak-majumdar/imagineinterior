

<?php


class Comments extends DBConnection{



    /**
     * inserting new user data into `user` table
     * @return boolean
     */
    function addComment($comment, $quesId, $commentBy){
        
        $comment = str_replace(">", "&gt", str_replace("<", "&lt", $comment));

        $sql = "INSERT INTO `comments` (`comment_content`, `ques_id`, `comment_by`, `added_on`) VALUES ('$comment', '$quesId', '$commentBy', now())";
        // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        return $res;
        // $id  = $this->conn->insert_id;
        // return $id;

    }//eof



    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function commentByQues($quesId){
        $data = array();
        $sql = "SELECT * FROM `comments` WHERE `ques_id` = '$quesId'";
        $res = $this->conn->query($sql);
        while ($result = $res->fetch_array()) {
            $data[] = $result;
        }
        return $data;
    }//eof




    /**
     * retriving categories data for all category from `categories` table
     * @return array
     */
    function recentQuestions(){
        $data = array();
        $sql = "SELECT * FROM `questions` ORDER BY added_on DESC LIMIT 6";
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
    function showQuesById($id){
        $data= array();
        $sql = "SELECT * FROM `questions` WHERE `id` = '$id'";
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
    function showQuesBycatId($catId){
        $data= array();
        $sql = "SELECT * FROM `questions` WHERE `cat_id` = '$catId'";
        $res = $this->conn->query($sql);
        $row = $res->num_rows;
        if ($row > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }//eof



    function updateQues($id, $sub, $dsc, $userId, $catId){
        $sql = "UPDATE `questions`
                SET
                `subject`       = '$sub',
                `description`   = '$dsc',
                `user_id`       = '$userId',
                `cat_id`        = '$catId',
                `modified_on`   = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql.$this->conn->error;
        $res = $this->conn->query($sql);
        // var_dump($res);
        return $res;

    }//eof



    function cancelQues($id, $status){

        $sql = "UPDATE `questions` SET `status` = '$status', `modified_on` = now() WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;

    }//eof


    /**
     * deleting category data from `catagories` table
     * @return boolean
     */
    function delQues($id){
        $sql = "DELETE FROM `questions` WHERE `id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    }//eof

    

}


?>