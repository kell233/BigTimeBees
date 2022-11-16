<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


$companyid = $_GET['id'];

require_once "config.php";

$userid = $_SESSION['id'];

$sql = "UPDATE obrt SET certificiran = '1' WHERE obrt_id = $companyid";
if ($link->query($sql) === TRUE) {
  header("Location:view.php");
} else {
  header("Location:view.php");
}


$link->close();
?>