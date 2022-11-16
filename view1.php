<?php
include("config.php");
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}

$modid = $_SESSION['id'];
$companyquery = "SELECT obrt_id FROM obrt WHERE moderator_id = $modid";

$companyresult = mysqli_query($link,$companyquery);
while($row = mysqli_fetch_assoc($companyresult)) {
    $obrt_id = $row['obrt_id'];

}


if($_SESSION["role"]=="0"){
	$sel_query="SELECT p.naziv, AVG(c.ocjena) as prosjek, p.opis, p.slika, p.video FROM obrt o, proizvod p, ocjena c
WHERE o.obrt_id=p.obrt_id AND p.proizvod_id=c.proizvod_id 
GROUP BY p.proizvod_id ORDER BY prosjek DESC";	
}
if($_SESSION["role"]=="1"){
	$sel_query="SELECT p.naziv, AVG(c.ocjena) as prosjek, p.opis, p.slika, p.video FROM obrt o, proizvod p, ocjena c 
WHERE o.moderator_id=$modid AND o.obrt_id=p.obrt_id AND p.proizvod_id=c.proizvod_id 
GROUP BY p.proizvod_id ORDER BY prosjek DESC";	
}


?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees <a href="dashboard.php">Dashboard</a> </h1> 
<meta charset="utf-8">
<title>Product Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="insert1.php">Make new products</a> 
| <a href="logout.php">Logout</a></p>
<?php
if($_SESSION["role"]=="0"){
	?>
  <a href="date.php">Sort by date</a></p>
 <?php 
}
?>
  <h2>View Rated Products</h2>
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

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["naziv"]; ?></td>
<td align="center"><?php echo $row["opis"]; ?></td>
<td align="center"><img alt="Slika" width="50px" height="50px" src="<?php echo $row["slika"]; ?>"></td>
<td align="center">
 <video width="320" height="240" controls>
                <source src="<?php echo $row['video']; ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>

</td>
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

<h2>View All Company Products</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Product No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Image</strong></th>
<th><strong>Video</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
if($_SESSION["role"]=="0"){
	$sel_query="Select * from proizvod";
}
if($_SESSION["role"]=="1"){
	$sel_query="Select * from proizvod WHERE obrt_id = $obrt_id";	
}
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["naziv"]; ?></td>
<td align="center"><?php echo $row["opis"]; ?></td>
<td align="center"><img alt="Slika" width="50px" height="50px" src="<?php echo $row["slika"]; ?>"></td>
<td align="center">
 <video width="320" height="240" controls>
                <source src="<?php echo $row['video']; ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>

</td>

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

</div>
</body>
</html>
