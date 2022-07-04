
<?php
    include_once 'config.php';
    $username = "";
    $email = "";
    $password = "";
    $query_error = false;
    $isAlreadyExist = false;
    $insertQuery_error = False;
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = md5($password);

        $usernameHashed = mysqli_escape_string($conn, $username);
        $passwordHashed = mysqli_escape_string($conn, $cpassword);
        $emailHashed = mysqli_escape_string($conn, $email);

        $select_query = "SELECT * FROM users u
        WHERE u.username = '$usernameHashed' OR u.email = '$emailHashed'";
        if($result = mysqli_query($conn,$select_query)){
            if(mysqli_num_rows($result) > 0 ){
                $isAlreadyExist = true;
            }
            else{
                $query = "INSERT INTO users (username, email, password) 
                VALUES ('$usernameHashed', '$emailHashed', '$passwordHashed')";
                if(mysqli_query($conn, $query)){
                    header("Location:" .  "/login");
                }
                else{
                   $insertQuery_error = true;
                }
            }
        }
        else{
            $query_error = true;
        }
        
    }
?>


<div class="signup-container">
    <form action="" id="signup-form" method="POST">
        <?php if($query_error): ?>
        <div class="error"><i class="exclamation triangle icon"></i>ERROR: Database connection is lost!</div>
        <?php elseif($isAlreadyExist):?>
        <div class="error"><i class="exclamation triangle icon"></i>ERROR: Username/E-mail is already taken!</div>
        <?php endif;?>
        <div class="input-box <?php echo $isAlreadyExist ? 'red-line' : '' ?>">
            <label for="username">Username</label>        
            <input type="text" required="required" name="username" value=<?php echo $username ?>>
        </div>
        <div class="input-box <?php echo $isAlreadyExist ? 'red-line' : '' ?>">
            <label for="email">Email</label>        
            <input type="text" required="required" name="email" placeholder="...@siemens.com" value=<?php echo $email?>>
        </div>
        <div class="input-box">
            <label for="">Password</label>
            <input type="password" required="required" name="password" value=<?php echo $password?>>
        </div>
        <button type="submit" name="submit">SIGN UP</button>
        <a href="/login">Already have account? Log in.</a>
    </form>
    
</div>

