<?php
session_start();
include "function.php";

deleteUser($_GET['id']);
header("Location: admin.php");

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>