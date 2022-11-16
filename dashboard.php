<?php
include("config.php");
session_start();
if($_SESSION["role"]==2){
    header("location: welcome.php");
}
?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees <a href="index.php" class="btn btn-primary">Home</a> </h1> 
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" type="text/css" href="dash.css" />
</head>
<body>
<div class="form">
<p>Company Dashboard.</p>
<p><a href="insert.php">Insert New Record</a></p>
<p><a href="view.php">View Records</a><p>
</div>

<div class="form">
<p>Product Dashboard.</p>
<p><a href="insert1.php">Insert New Record</a></p>
<p><a href="view1.php">View Records</a><p>
</div>
<?php
if($_SESSION["role"]==0){
?>
	<div class="form">
	<p>User Dashboard.</p>
	<p><a href="insert2.php">Insert New Record</a></p>
	<p><a href="view2.php">View Records</a><p>
	</div>
<?php
}
?>
</body>
</html>