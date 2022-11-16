<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "SELECT * from korisnik where korisnik_id='".$id."'"; 
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
session_start();
if($_SESSION["role"]!="0"){
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
| <a href="insert2.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$tip_id =$_REQUEST['tip_id'];
$korisnicko_ime =$_REQUEST['korisnicko_ime'];
$lozinka =$_REQUEST['lozinka'];
$ime =$_REQUEST['ime'];
$prezime =$_REQUEST['prezime'];
$email =$_REQUEST['email'];
$slika =$_REQUEST['slika'];
$update="update korisnik set tip_id='".$tip_id."', korisnicko_ime='".$korisnicko_ime."',lozinka='".$lozinka."',ime='".$ime."',prezime='".$prezime."',email='".$email."',slika='".$slika."'
where korisnik_id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='view2.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['korisnik_id'];?>" />
<select id="tip_id" name="tip_id" >

    <option value="0" <?php if ($row['tip_id']=="0"){ echo "selected"; } ?>>Admin</option>
    <option value="1" <?php if ($row['tip_id']=="1"){ echo "selected"; } ?>>Mod</option>
    <option value="2" <?php if ($row['tip_id']=="2"){ echo "selected"; } ?>>User</option>
  </select>
  
<p><input type="text" name="korisnicko_ime" placeholder="Enter korisnicko_ime" 
required value="<?php echo $row['korisnicko_ime'];?>" /></p>
<p><input type="text" name="lozinka" placeholder="Enter lozinka" 
required value="<?php echo $row['lozinka'];?>" /></p>
<p><input type="text" name="ime" placeholder="Enter ime" 
required value="<?php echo $row['ime'];?>" /></p>
<p><input type="text" name="prezime" placeholder="Enter prezime" 
required value="<?php echo $row['prezime'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name="slika" placeholder="Enter slika" 
required value="<?php echo $row['slika'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>