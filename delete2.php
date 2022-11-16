
<?php
require('config.php');
session_start();
if($_SESSION["role"]!="0"){
    header("location: welcome.php");
}
$id=$_REQUEST['id'];
$query = "DELETE FROM korisnik WHERE korisnik_id=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: view2.php"); 
?>