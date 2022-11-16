<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'iwa_2019');
define('DB_PASSWORD', 'foi2019');
define('DB_NAME', 'iwa_2019_sk_projekt');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf8');
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>