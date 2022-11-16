<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "config.php";

$userid = $_SESSION['id'];
$productid = $_GET['productid'];
$rating = $_GET['rating'];
$today = date("Y-m-d H:i:s");

$sql = "INSERT INTO ocjena (korisnik_id, proizvod_id, ocjena, datum) VALUES ($userid, $productid, $rating, '$today')";

if ($link->query($sql) === TRUE) {
  header('Location: product.php?done=success&id=' . $productid);
} else {
  header('Location: product.php?done=fail&id=' . $productid);
}

$link->close();
?>