<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees</h1>
    </div>
    <p>
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </p>
    <table class="table">
<?php
$productid=$_GET['id'];
if(isset($_GET["done"]) && $_GET["done"] == "success") {
    ?>
    <div class="alert alert-success" role="alert">
    <p>Successfully rated this product!</p>
    </div>

    <?php
}
if(isset($_GET["done"]) && $_GET["done"] == "fail") {
    ?>
    <div class="alert alert-danger" role="alert">
    <p>Failed to rate this product, you may have already rated it!</p>
    </div>

    <?php
}
?>
<table class="table">

<h2>Product Information</h2>
            <?php 


            $productsql = "SELECT * FROM proizvod WHERE proizvod_id = $productid";
           

            $productresult = $link->query($productsql);

            if ($productresult->num_rows == 1) {
            
            while($productrow = $productresult->fetch_assoc()) {
                $companyid = $productrow['obrt_id']
            ?>
                <?php echo $productrow['naziv'] . " <br>" . $productrow['opis']?> <br><img width="100" height="100" src="<?php echo $productrow["slika"]; ?>" />
                <br>
                <video width="320" height="240" controls>
                <source src="<?php echo $productrow['video']; ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                

            <?php
            }
            } else {
            echo "No product found for ID.";
            }
?>
<h2>Company Information</h2>
<?php
            $sql = "SELECT naziv, opis, obrt_id, kontakt_informacije, certificiran FROM obrt WHERE obrt_id = $companyid;";
            $result = $link->query($sql);
    
        if ($result->num_rows > 0) {
           
           
            while($row = $result->fetch_assoc()) {
                echo $row['naziv'];
                echo "<br>";
                echo $row['opis'];
                echo "<br>";
                echo $row['kontakt_informacije'];
                echo "<br>";


            }
        }
            ?>
			
<h2>Product Rating</h2>
<?php
$ratingsql = "SELECT * FROM ocjena WHERE korisnik_id =" . $_SESSION['id'] . " AND proizvod_id =" . $productid;
            $ratingresult = $link->query($ratingsql);
    
        if ($ratingresult->num_rows > 0) {
           
           
            while($row = $ratingresult->fetch_assoc()) {
				$orgDate = $row['datum'];
				$newDate = date("d.m.Y H:i:s ", strtotime($orgDate));

              echo "You rated this product " . $row['ocjena'] . " out of 5 on ". $newDate;


            }
        }
        else {
?>
            Rate This Product:
            <a href="rate.php?productid=<?php echo $productid; ?>&rating=1">1</a>
            <a href="rate.php?productid=<?php echo $productid; ?>&rating=2">2</a>
            <a href="rate.php?productid=<?php echo $productid; ?>&rating=3">3</a>
            <a href="rate.php?productid=<?php echo $productid; ?>&rating=4">4</a>
            <a href="rate.php?productid=<?php echo $productid; ?>&rating=5">5</a>
        <?php
        }
        ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>