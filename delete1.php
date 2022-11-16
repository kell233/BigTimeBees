
<?php
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}
require('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM proizvod WHERE proizvod_id=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: view1.php"); 
?>