<?php
    include_once 'config.php';
    $username = "";
    $password = "";
    $query_error = false;
    $invalid_credentials = false;
    if(isset($_POST["submit"])){
        $username =  $_POST["username"];
        $password =  $_POST["password"];
        $cpassword = md5($password);
        $query = "SELECT id FROM users u
        WHERE u.username = '$username' AND u.password = '$cpassword'";        
        if($result = mysqli_query($conn, $query)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $_SESSION["id"] = $row["id"];
                header("Location:" . "/");
            }
            else{
                $invalid_credentials = true;
            }
        }
        else{
            $query_error = true;
        }
    }

?>



<div class="login-container">
    <form action="" id="login-form" method="POST">
        <?php if($query_error): ?>
        <div class="error"><i class="exclamation triangle icon"></i>ERROR: Database connection is lost!</div>
        <?php elseif($invalid_credentials):?>
        <div class="error"><i class="exclamation triangle icon"></i>ERROR: Invalid Credentials!</div>
        <?php endif;?>
        <div class="input-box <?php echo $invalid_credentials ? 'red-line' : '' ?>">
            <label for="username">Username</label>        
            <input type="text" required="required" name="username" value=<?php echo $username?>>
        </div>
        <div class="input-box <?php echo $invalid_credentials ? 'red-line' : '' ?>">
            <label for="">Password</label>
            <input type="password" required="required" name="password" value=<?php echo $password?>>
        </div>
        <button type="submit" name="submit">LOG IN</button>
        <a href="/signup">Don't you have any account? Sign up.</a>
    </form>
</div>
