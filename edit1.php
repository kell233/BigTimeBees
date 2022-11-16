<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from proizvod where proizvod_id='".$id."'"; 
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
| <a href="insert1.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$description =$_REQUEST['description'];
$image =$_REQUEST['image'];
$video =$_REQUEST['video'];
$update="update proizvod set naziv='".$name."',
opis='".$description."', slika='".$image."',
video='".$video."' where proizvod_id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='view1.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['proizvod_id'];?>" />
<p><input type="text" name="name" placeholder="Enter name" 
required value="<?php echo $row['naziv'];?>" /></p>
<p><input type="text" name="description" placeholder="Enter description" 
required value="<?php echo $row['opis'];?>" /></p>
<p><input type="text" name="image" placeholder="Enter image url" 
required value="<?php echo $row['slika'];?>" /></p>
<p><input type="text" name="video" placeholder="Enter video url" 
required value="<?php echo $row['video'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>