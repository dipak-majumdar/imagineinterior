<?php

// $_SESSION['redUrl'] = $_SERVER['PHP_SELF'];
// session_start();
// if ($_SESSION['logedin'] != true) {
//     header("Location: dashboard.php");
// }

if (!isset($_SESSION['logedin'])) {
    header("Location: index.php");
}


?>