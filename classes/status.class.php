<?php
class Status extends DBConnection{

    function getStatusName($id){
        $sql = "SELECT *FROM status WHERE id = $id";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0) {
            $data = $res->fetch_object();
            return $data->name;
        }
        return '';
    }
}

?>