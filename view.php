<?php
include("config.php");
header('Content-Type: text/html; charset=utf-8');
session_start();
if($_SESSION["role"]=="2"){
    header("location: welcome.php");
}

$modid = $_SESSION['id'];

if($_SESSION["role"]=="0"){
    $sel_query="Select * from obrt;";
}
elseif($_SESSION["role"]=="1"){
	$sel_query="Select * from obrt WHERE moderator_id = $modid";	
}





?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees </h1> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Company Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="insert.php">Make a new company</a> 
| <a href="logout.php">Logout</a></p>

<?php
if($_SESSION["role"]=="0"){
	$approvalquery="Select * from obrt WHERE certificiran = 0";	
	  ?>
	  <h2>Companies that Need Approval</h2>
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
	$result = mysqli_query($link,$approvalquery);
	while($row = mysqli_fetch_assoc($result)) { ?>
	<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["naziv"]; ?></td>
	<td align="center"><?php echo $row["opis"];?></td>
	<td align="center"><?php echo $row["kontakt_informacije"]; ?></td>
	<td align="center">
	<a href="edit.php?id=<?php echo $row["obrt_id"]; ?>">Edit</a>
	</td>
	<?php
	if($_SESSION["role"]=="0"){
		?>
	<td align="center">
	<a href="approve.php?id=<?php echo $row["obrt_id"]; ?>">Approve</a>
	</td>
	<td align="center">
	<a href="block.php?id=<?php echo $row["obrt_id"]; ?>">Block</a>
	</td>
	<?php
	}
?>
</tr>
<?php $count++; } ?>
</tbody>
</table>
  <?php
}
?>


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
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["naziv"]; ?></td>
<td align="center"><?php echo $row["opis"];?></td>
<td align="center"><?php echo $row["kontakt_informacije"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["obrt_id"]; ?>">Edit</a>
</td>
<?php
if($_SESSION["role"]=="0"){
	?>
<td align="center">
<a href="approve.php?id=<?php echo $row["obrt_id"]; ?>">Approve</a>
</td>
<td align="center">
<a href="block.php?id=<?php echo $row["obrt_id"]; ?>">Block</a>
</td>
<?php
}
?>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
