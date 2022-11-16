<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}


require_once "config.php";


$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
  
    if(empty($username_err) && empty($password_err)){
      
        $sql = "SELECT korisnik_id, tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika FROM korisnik WHERE korisnicko_ime = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;
            
          
            if(mysqli_stmt_execute($stmt)){
              
           
                mysqli_stmt_store_result($stmt);
                
            
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                

                    mysqli_stmt_bind_result($stmt, $id, $role, $username, $hashed_password, $firstname, $lastname, $email, $slika);

                    if(mysqli_stmt_fetch($stmt)){

                        if($password == $hashed_password){
                         
                            session_start();
                            
                     
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;  
                            $_SESSION["role"] = $role;
                            $_SESSION["firstname"] = $firstname;                             
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["email"] = $email;
                            $_SESSION["slika"] = $slika;

                            header("location: welcome.php");
                        } else{
                        
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

        
            mysqli_stmt_close($stmt);
        }
    }
    
  
    mysqli_close($link);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1><b>Welcome to Big Time Bees</b></h1>
    </div>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            
        </form>
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
				while(($row = $result->fetch_assoc())) {
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
    </div>    
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?php
$ip = file_get_contents("http://ipecho.net/plain"); //GET EXTERNAL IP BECAUSE XAMPP
#$ip = $_SERVER['REMOTE_ADDR'];
#echo $ip;
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$city = $details->city; 
$externalip = $details->ip; 
$region = $details->region; 
$country = $details->country;
$loc = $details->loc; 
$org = $details->org; 
$postal = $details->postal; 
$timezone = $details->timezone; 
echo "You are visiting from " . $city . " " . $externalip . " " . $region . " " . $country . " " . $loc . " " . $org . " " . $postal . " " . $timezone;
?>
</html>