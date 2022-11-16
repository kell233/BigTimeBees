<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

$companyname = $_POST['companyname'];
$companydescription = $_POST['companydescription'];
$companycontact = $_POST['companycontact'];
$userid = $_SESSION['id'];


$sql = "INSERT INTO obrt (moderator_id,naziv,opis,kontakt_informacije,certificiran) VALUES ('$userid', '$companyname', '$companydescription', '$companycontact', '0')";

if ($link->query($sql) === TRUE) {
  header('Location: welcome.php');
} else {
  header('Location: welcome.php');
}

$link->close();
?>