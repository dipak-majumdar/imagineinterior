<?php
require_once "../../_config/dbconnect.php";

require_once "../../classes/form.class.php";


$Form   = new Form();



// ========== Site logo Upload ==========
if (isset($_POST['update'])) {
    $updated = $Form->updateQueryData($_POST['id'], 'status', 1);
    if (!$updated) {
        echo 'false';
    }
}


?>