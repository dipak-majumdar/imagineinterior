<?php

class Utility{


    function currentUrl(){

        $currentUrl =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return $currentUrl;
        
    }


    /**
     * inserting new user data into `child_services` table
     * @return boolean
     */
    function updateSingleValue($table, $col, $value, $id){
        
        $sql = "UPDATE `$table`
                SET
                `$col`          = '$value',
                `updated_on`    = now()
                WHERE
                `id`  	        = '$id'";
                // echo $sql;
        $res = $this->conn->query($sql);

        return $res;

    }//eof




    function dataRowNumById($table, $col, $colval){
        $sql = "SELECT COUNT(*) FROM $table WHERE $col = '$colval'";
        $res = $this->conn->query($sql);
        return $res;
    }//eof


}
?>