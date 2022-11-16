<?php
include("config.php");
session_start();
if($_SESSION["role"]!="0"){
    header("location: welcome.php");
}
?>
<!DOCTYPE html>
<html>
<head>
 <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees</h1> 
<meta charset="utf-8">
<title>User Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="insert2.php">Make new user</a> 
| <a href="logout.php">Logout</a></p>
<h2>View users</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Korisnik_id</strong></th>
<th><strong>Tip_id</strong></th>
<th><strong>Korisnicko_ime</strong></th>
<th><strong>Lozinka</strong></th>
<th><strong>Ime</strong></th>
<th><strong>Prezime</strong></th>
<th><strong>Email</strong></th>
<th><strong>Slika</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;

$sel_query="Select * from korisnik;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["tip_id"]; ?></td>
<td align="center"><?php echo $row["korisnicko_ime"]; ?></td>
<td align="center"><?php echo $row["lozinka"]; ?></td>
<td align="center"><?php echo $row["ime"]; ?></td>
<td align="center"><?php echo $row["prezime"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><img alt="Slika" width="50px" height="50px" src="<?php echo $row["slika"]; ?>"></td>
<td align="center">
<a href="edit2.php?id=<?php echo $row["korisnik_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete2.php?id=<?php echo $row["korisnik_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
