<?php
session_start();

session_destroy();

header("Location: index.php");

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>