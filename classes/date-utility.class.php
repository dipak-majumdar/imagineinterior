<?php

class DateUtility{


    function numDate($rawDate){

        $rawDate = strtotime($rawDate);
        $date = date("d-m-Y h:s a", $rawDate);
        return $date;
        
    }

    function shortTextDate($rawDate){

        $rawDate = strtotime($rawDate);
        $date = date("d M Y", $rawDate);
        return $date;
        
    }

}
?>