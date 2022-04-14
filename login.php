<?php

    //start the session
    session_start();

    //define and initialize variables
    $username = $password = "";
    $invalidError = "";

    //Action for login form. When the user clicks login, validate form and redirect to home page if login is successful
    if (isset($_POST['login'])) {
        
        //FORM DATA VALIDATION
        $username = $_POST["username"];
        $password = $_POST["pword"];
        
        //connect to database
        $conn = new mysqli("localhost", "imani", "Eye8cerea!.", "studeat");
        //check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //check to see if credentials appear in database
        $sqluname = $conn->query("SELECT uname FROM tbl_users WHERE uname='$username'");                   
        $sqlpword = $conn->query("SELECT pword FROM tbl_users WHERE uname='$username'");

        $verif = $sqlpword->fetch_array()[0] ?? '';

        $nameresult = $sqluname;
        $pwordresult = password_verify($password, $verif);

        if ($nameresult && $pwordresult) {
            //create cookie for variable access on other pages
            $cookie_name = "uname";
            $cookie_value = $username;
            setcookie("uname", $username, time() + (86400 * 30), "/");
            header('Location: index.php'); //redirects to home page once login is successful
        } else {
            $invalidError = 'Invalid username or password';
        }$conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!--Framework-Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

        <!--Title and Favicon-->
        <title>AA Stud-Eat | Login</title>
        <link rel="icon" href="../images/AnnonaAcademy nb.png">

        <!--Added Styles-->
        <style>

            html, body {
                width: 100%;
                height: 100%;
                margin: 0 auto;
                padding: 0;
                overflow-x: hidden;
            }

            body {
                background: url("../images/bg6.png");
                background-repeat: no-repeat;
            }

            .active {
                background-color: #ddf8d7 !important;
                height: 100% !important;
            }

            .container {
                border: 2px;
                background-color: rgba(255, 250, 250, 0.85);
            }

            label {
                font-size: 12px;
                font-family: 'Raleway', sans-serif;
                padding-top: 2px;
                padding-bottom: 2px;
            }

            .custom-field {
                background: transparent !important;
                border: none !important;
                border-bottom: 2px solid green !important;
            }

            button {
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
            }

            #loginbtn:hover {
                box-shadow: 0 0 100px green;
                transform: scale(1.1);
            }

            /*FONTS*/
            h1 {
                text-align: center;
                font-size: 65px;
                font-family: 'Cinzel Decorative', cursive;
                padding-top: 5%;
            }

            h2 {
                text-align: center;
                font-size: 35px;
                font-family: 'Cinzel Decorative', cursive;
                padding-bottom: 20px;
            }

            h3 {
                text-align: center;
                font-size: 35px;
                font-family: 'Cinzel Decorative', cursive;
            }

            p {
                text-align: left;
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
                padding-left: 1%;
            }

        </style>

    </head>

    <body>

        <!--navigation bar-->
        <nav class="navbar navbar-expand-lg navbar-light nav-tabs" style="background-color:snow";>
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../images/Stud-eatLogo nb.png" alt="Stud-eat Logo" width="120" height="45">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"><a class="nav-link" href="index.php">HOME</a></li>
                        <li class="nav-item lead"><a class="nav-link" href="register.php">REGISTER</a></li>
                        <li class="nav-item lead"><a class="nav-link active" aria-current="page" href="login.php">LOGIN</a></li>
                        <li class="nav-item lead"><a class="nav-link" href="products.php">PRODUCTS</a></li>
                        <li class="nav-item lead"><a class="nav-link" href="contact.php">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <br><br>
        </div>

        <div class="row">
            <!--Form Segment-->
            <div class="col-md-6" style="padding-left: 3%;">
            <div>
                <br><br><br>
            </div>
                <div class="container">
                    <div class="box-wrapper">
                        <div class="box box-border">
                            <div class="box-body">
                                <!--Title-->
                                <h1>Login</h1>
                                <!--Form-->
                                <form action="login.php" method="post">
                                <span class="help-block text-danger"><?php echo $invalidError; ?></span>
                                    <div class="form-group">
                                        <label for=username>Username:</label>
                                        <input type="text" placeholder="e.g. JohnDoe" class="custom-field form-control" id=username name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for=pword>Password:</label>
                                        <input type="password" placeholder="Minimum of 8 characters" class="custom-field form-control" id=pword name="pword">
                                    </div><br>
                                    <div class="d-grid gap-4 form-group text-center">
                                        <input type="submit" class="btn btn-success" id=loginbtn name="login" value="Login">
                                    </div><br>
                                    <div class="form group text-center" style="padding-bottom: 1px;">
                                        <p style="text-align:center;">New to Stud-Eat? <a href="register.php">Register here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Logo-->
            <div class="col md-6 d-flex justify-content-center">
                <img src="../images/AnnonaAcademy nb.png">
            </div>
        </div>

        <div>
            <br>
        </div>

        <!--Footer-->
        <footer style="height:40px; bottom:0; width: 100%; background-color:snow;">
            <p style="text-align:center;">©Annona Academy 2022</p>
        </footer>

        <!--JS functionality-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>