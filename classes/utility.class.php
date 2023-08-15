<?php

class Utility extends DBConnection{


    function currentUrl(){

        $currentUrl =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return $currentUrl;
        
    }


    /**
     * Custome PHP function ti generate seo friendly url
     * $string      = Required. The string which you want to convert to the SEO friendly URL.
     * $wordLimit   = Optional. Restrict words limit on SEO URL, default is 0 (no limit).
     */
    function generateSeoURL($string, $wordLimit = 0){ 
        $separator = '-'; 
         
        if($wordLimit != 0){ 
            $wordArr = explode(' ', $string); 
            $string = implode(' ', array_slice($wordArr, 0, $wordLimit)); 
        } 
     
        $quoteSeparator = preg_quote($separator, '#'); 
     
        $trans = array( 
            '&.+?;'                 => '', 
            '[^\w\d _-]'            => '', 
            '\s+'                   => $separator, 
            '('.$quoteSeparator.')+'=> $separator 
        ); 
     
        $string = strip_tags($string); 
        foreach ($trans as $key => $val){ 
            $string = preg_replace('#'.$key.'#iu', $val, $string); 
        } 
     
        $string = strtolower($string); 
     
        return trim(trim($string, $separator)); 
    }//eof




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


    function deleteFile($path){

        if (file_exists($path)) {
            $deleted = unlink($path);
            if ($deleted) {
                return true;
            }
        }else {
            echo "File Not Exists";
        }
        
    }
}
?>