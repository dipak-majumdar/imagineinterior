<?php

session_start();
//session_unset();
session_destroy();
//$page = $_SERVER['REQUEST_URI'];
header("Location: ../index.php");

?>