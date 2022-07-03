
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "php_app";
    
    $conn = mysqli_connect($host, $user, $password, $db);
    if($conn === false){
        die("ERROR: Database cannot be connected!");
    }



?>