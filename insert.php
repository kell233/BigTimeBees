<?php
include("config.php");
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
	
}

$modid = $_SESSION['id'];
$xquery = "SELECT * FROM obrt WHERE moderator_id = '$modid'";
if ($result = $link->query($xquery)) {

    
    $row_cnt = $result->num_rows;
	if ($row_cnt >= 1) {
		echo "You already made a company.";
		exit;
	}
    $result->close();

}



$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
   if($_REQUEST["name"]==""){
    header("location: insert.php");
	
}
 if($_REQUEST["description"]==""){
    header("location: insert.php");
	
}
 if($_REQUEST["contact"]==""){
    header("location: insert.php");
	
}
    $name =$_REQUEST['name'];
    $description = $_REQUEST['description'];
	$contact = $_REQUEST['contact'];
    $moderator_id = $_SESSION["id"];
    $ins_query="insert into obrt
    (`naziv`,`opis`,`kontakt_informacije`,`moderator_id`, `certificiran`) VALUES
    ('$name','$description','$contact', '$moderator_id', 0)";
    mysqli_query($link,$ins_query)
    ;
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees </h1> 
<meta charset="utf-8">
<title>Make New Company</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Company New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="description" placeholder="Enter description" required /></p>
<p><input type="text" name="contact" placeholder="Enter contact" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
