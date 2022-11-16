<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from obrt where obrt_id='".$id."'"; 
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$contact =$_REQUEST['contact'];
$update="update obrt set kontakt_informacije='".$contact."' where obrt_id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['obrt_id'];?>" />
<p><input type="text" name="contact" placeholder="Enter contact" 
required value="<?php echo $row['kontakt_informacije'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>