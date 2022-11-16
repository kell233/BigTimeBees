<?php
include("config.php");
session_start();
if($_SESSION["role"]!="0"){
    header("location: welcome.php");
}
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
	 if($_REQUEST["tip_id"]==""){
    header("location: insert2.php");
	
}
 if($_REQUEST["korisnicko_ime"]==""){
    header("location: insert2.php");
	
} if($_REQUEST["lozinka"]==""){
    header("location: insert2.php");
	
}
 if($_REQUEST["ime"]==""){
    header("location: insert2.php");
	
}
if($_REQUEST["prezime"]==""){
    header("location: insert2.php");
	
} if($_REQUEST["email"]==""){
    header("location: insert2.php");
	
}
 if($_REQUEST["slika"]==""){
    header("location: insert2.php");
	
}
	$tip_id = $_REQUEST['tip_id'];
	$korisnicko_ime = $_REQUEST['korisnicko_ime'];
	$lozinka = $_REQUEST['lozinka'];
    $ime = $_REQUEST['ime'];
	$prezime = $_REQUEST['prezime'];
	$email= $_REQUEST['email'];
	$slika= $_REQUEST['slika'];
    $query="insert into korisnik
    (`tip_id`,`korisnicko_ime`,`lozinka`,`ime`,`prezime`,`email`,`slika`) VALUES
    ('$tip_id', '$korisnicko_ime','$lozinka', '$ime','$prezime', '$email','$slika')";
    mysqli_query($link,$query)or die ( mysqli_error($link));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view2.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees </h1> 
<meta charset="utf-8">
<title>Make New user</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view2.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Users New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
  <select id="tip_id" name="tip_id">
    <option value="0">Admin</option>
    <option value="1">Mod</option>
    <option value="2">User</option>
  </select>
<p><input type="text" name="korisnicko_ime" placeholder="Enter korisnicko_ime" required /></p>
<p><input type="text" name="lozinka" placeholder="Enter lozinka" required /></p>
<p><input type="text" name="ime" placeholder="Enter ime" required /></p>
<p><input type="text" name="prezime" placeholder="Enter prezime" required /></p>
<p><input type="text" name="email" placeholder="Enter email" required /></p>
<p><input type="text" name="slika" placeholder="Enter slika" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
