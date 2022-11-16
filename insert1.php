<?php
include("config.php");
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}
$status = "";

$modid = $_SESSION['id'];

$xquery = "SELECT * FROM obrt WHERE certificiran = 0 AND moderator_id = $modid LIMIT 1";
if ($result = $link->query($xquery)) {

 
    $row_cnt = $result->num_rows;
	if ($row_cnt >= 1) {
		echo "You are waiting for admin approval of your company.";
		exit;
	}
    $result->close();

}

if(isset($_POST['new']) && $_POST['new']==1){
	if($_REQUEST["name"]==""){
    header("location: insert1.php");
	
}
 if($_REQUEST["description"]==""){
    header("location: insert1.php");
	
} if($_REQUEST["image"]==""){
    header("location: insert1.php");
	
}
 if($_REQUEST["video"]==""){
    header("location: insert1.php");
	
}
	$modid = $_SESSION['id'];
	$companyquery = "SELECT obrt_id FROM obrt WHERE moderator_id = $modid";
	$companyresult = mysqli_query($link,$companyquery);
	while($row = mysqli_fetch_assoc($companyresult)) {
	
		$obrt_id = $row['obrt_id'];

	}
    $name =$_REQUEST['name'];
    $description = $_REQUEST['description'];
	$image = $_REQUEST['image'];
	$video = $_REQUEST['video'];
    $query="insert into proizvod
    (`naziv`,`opis`,`slika`,`video`,`obrt_id`) VALUES
    ('$name','$description','$image','$video', '$obrt_id')";
    mysqli_query($link,$query) or die(mysqli_error($link));;
    $status = "New Record Inserted Successfully.
    </br></br><a href='view1.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees </h1> 
<meta charset="utf-8">
<title>Make New Products</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view1.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Products New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="description" placeholder="Enter description" required /></p>
<p><input type="text" name="image" placeholder="Enter image url" required /></p>
<p><input type="text" name="video" placeholder="Enter video url" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
