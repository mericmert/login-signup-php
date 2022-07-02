<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li><a href="/">Data</a></li>
            <li><a href="/signup">Sign up</a></li>
        </ul>
    </nav>
    <section>
        <?php
            $request = $_SERVER['REQUEST_URI'];

            switch ($request) {
                case '/' :
                    require __DIR__ . '/routes/homepage.php';
                    break;
                case 'signup' :
                    require __DIR__ . '/routes/signup.php';
                    break;
                case '/login' :
                    require __DIR__ . '/routes/login.php';
                    break;
                default:
                    http_response_code(404);
                    require __DIR__ . '/routes/signup.php';
                    break;
            }
        
        ?>
    </section>
</body>
</html>