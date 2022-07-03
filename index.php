
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/signup.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Digital Transformation</title>
</head>
<body>
    <nav>
        <h1><a href="/">Digital Transformation</a></h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/data">Data</a></li>
            <?php if(!isset($_SESSION["id"])): ?>
            <li><a href="/signup">Sign up <i class="sign in alternate icon"></i></a></li>
            <?php else:?>
            <li><a href="/logout">Sign out <i class="sign out alternate icon"></i></a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section>
        <?php
            $request = $_SERVER['REQUEST_URI'];
            switch ($request) {
                case '/' :
                    require __DIR__ . '/routes/homepage.php';
                    break;
                case '/signup' :
                    (!isset($_SESSION["id"])) ? require __DIR__ . '/routes/signup.php' : require __DIR__ . '/routes/homepage.php' ;
                    break;
                case '/login' :
                    (!isset($_SESSION["id"])) ? require __DIR__ . '/routes/login.php' : require __DIR__ . '/routes/homepage.php' ;;
                    break;
                case '/logout' :
                        session_destroy();
                        header("Location:" . "/");
                        break;
                default:
                    http_response_code(404);
                    break;
            }
        
        ?>
    </section>
</body>
</html>

