<?php
include("config.php");
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}
$status = "";

$modid = $_SESSION['id'];



if(isset($_POST['new']) && $_POST['new']==1){
	$modid = $_SESSION['id'];
	$companyquery = "SELECT obrt_id FROM obrt WHERE moderator_id = $modid";
	$companyresult = mysqli_query($link,$companyquery);
	while($row = mysqli_fetch_assoc($companyresult)) {
		
		$obrt_id = $row['obrt_id'];

	}
    $companyid =$_REQUEST['companyid'];
    $fromdate = $_REQUEST['fromdate'];
	$newfromDate = date("Y-m-d H:i:s ", strtotime($fromdate));

	
	$todate = $_REQUEST['todate'];
		$newtoDate = date("Y-m-d H:i:s ", strtotime($todate));

	

	
    $query="SELECT p.naziv, AVG(c.ocjena) as prosjek, p.opis, p.slika, p.video FROM obrt o, proizvod p, ocjena c 
WHERE o.obrt_id=$companyid AND o.obrt_id=p.obrt_id AND p.proizvod_id=c.proizvod_id AND c.datum BETWEEN '$newfromDate' AND '$newtoDate'
GROUP BY p.proizvod_id ORDER BY prosjek DESC";
?>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees <a href="dashboard.php">Dashboard</a> </h1> 
<h2>Sorted Products</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Product No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Image</strong></th>
<th><strong>Video</strong></th>
<th><strong>Avg. rating</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;

$result = mysqli_query($link,$query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["naziv"]; ?></td>
<td align="center"><?php echo $row["opis"]; ?></td>
<td align="center"><?php echo $row["slika"]; ?></td>
<td align="center"><?php echo $row["video"]; ?></td>
<td align="center"><?php echo $row["prosjek"]; ?></td>
<td align="center">
<a href="edit1.php?id=<?php echo $row["proizvod_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete1.php?id=<?php echo $row["proizvod_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; }
 ?>
</tbody>
</table>


<?php



}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Rated Products by Date</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view1.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Products by date</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="companyid" placeholder="Company ID" required /></p>
<p><input type="text" name="fromdate" placeholder="From Date" required /></p>
<p><input type="text" name="todate" placeholder="To Date" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>

<h2>View Companies</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Company No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Contact</strong></th>
<th><strong>Edit</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from obrt;";

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["naziv"]; ?></td>
<td align="center"><?php echo $row["opis"]; ?></td>
<td align="center"><?php echo $row["kontakt_informacije"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["obrt_id"]; ?>">Edit</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
