
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "digital_transformation";
    
    $conn = mysqli_connect($host, $user, $password, $db);
    if($conn === false){
        die("ERROR: Database cannot be connected!");
    }



?>