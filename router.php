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
                    (!isset($_SESSION["id"])) ? require __DIR__ . '/routes/login.php' : require __DIR__ . '/routes/homepage.php' ;
                    break;
                case '/documents' :
                    (!isset($_SESSION["id"])) ? require __DIR__ . '/routes/login.php' : require __DIR__ . '/routes/documents.php' ;
                    break;
                case '/logout' :
                        session_destroy();
                        header("Location:" . "/");
                        break;
                default:
                    http_response_code(404);
                    header("Location:" . "/");
                    break;
            }
 ?>