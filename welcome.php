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
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Big Time Bees  <a href="dashboard.php">Dashboard</a> </h1> 
    </div>
    <p>
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </p>
    <table class="table">
<thead>
    <tr>
        <h2>Top Rated Products</h2>
    </tr>

    </thead>
    <tbody>
            <tr>
            <?php 


            $sql = "SELECT p.naziv, AVG(c.ocjena) as prosjek, p.slika FROM obrt o, proizvod p, ocjena c 
WHERE o.certificiran=1 AND o.obrt_id=p.obrt_id AND p.proizvod_id=c.proizvod_id 
GROUP BY p.proizvod_id ORDER BY prosjek DESC LIMIT 15";
            $result = $link->query($sql);

            if ($result->num_rows > 0) {
     
            while($row = $result->fetch_assoc()) {
            ?>
                <td><?php echo $row['naziv'] . " <br>" . $row['prosjek']?> <br><img width="100" height="100" src="<?php echo $row["slika"] ?>"/></td>

            <?php
            }
            } else {
            echo "No results found.";
            }
            ?>

            </tr>
        </tbody>
    </table>

    <?php if ($_SESSION["role"]==0) { 
    
    
  
    }
    if ($_SESSION["role"]<=1) { 
        $moderatorid = $_SESSION['id'];
       

    
    
    
    
    
    
    
    }
    if ($_SESSION["role"]<=2) { 
        ?>
        <h2>Company Products</h2>
        <?php
   
        $sql = "SELECT naziv, opis, obrt_id, kontakt_informacije, certificiran FROM obrt WHERE certificiran = 1;";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
  
       
        while($row = $result->fetch_assoc()) {
            $i = $row['obrt_id'];
?>
  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <?php echo $row['naziv'];  ?>
        </button>
      </h5>
    </div>
    
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <?php  ?>
                        </tr>
                    
                        </thead>
                        <tbody>
                                <tr>
                                <?php 
                    
                    
                                $productsql = "SELECT * FROM proizvod WHERE obrt_id = $i";
                               

                                $productresult = $link->query($productsql);
                    
                                if ($productresult->num_rows > 0) {
                              
                                while($productrow = $productresult->fetch_assoc()) {
                                ?>
                                    <td><?php echo $productrow['naziv'] . " <br>" . $productrow['opis']?> <br><img width="100" height="100" src="<?php echo $productrow["slika"] ?>" /> <a href="product.php?id=<?php echo $productrow['proizvod_id']; ?>">Details</a> </td>
                    
                                <?php
                                }
                                } else {
                                echo "No products found.";
                                }
                                ?>
                    
                                </tr>
                            </tbody>
                        </table>


      </div>
    </div>
  </div>
  </div>
</div>  
    
    
<?php
            }
            } else {
            echo "No results found.";
            }

  
    }
    
    
    ?>
	

</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>