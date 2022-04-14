<?php
    //start the session
    session_start();

    //connect to database
    $conn = new mysqli("localhost", "imani", "Eye8cerea!.", "studeat");
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //set session variables using cookie
    $_SESSION['username'] = htmlentities($_COOKIE['uname']);

    //create username variable for referencing
    $user = $_SESSION['username']; 

    //define and initialize variables
    $pword = $password = $oldpword = $newPassword = "";
    $pwordEmpty = $errorPword = $incorrectPword = "";

    //function to show password change notice
    function messageAlert($msg){
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    //Action for udpate form. When the user clicks save, validate form, modify database record and redirect to profile page if update is successful
    if (isset($_POST['save'])) {

        //FORM DATA VALIDATION
        $pword = $_POST["pword"];
        if (empty($_POST["pword"])) {
            $pwordEmpty = '*Password field cannot be empty.';
        } else if (strlen($pword)<8) {
            $errorPword = '*Password must contain a minimum of 8 characters.';
        } else {
            $password = $_POST["pword"];
        }

        if (!empty($password)) {

            //sql code for updating record (if new password)
            $newPassword = password_hash($password, PASSWORD_DEFAULT);
            $newpwordupdate = "UPDATE tbl_users SET pword='$newPassword' WHERE uname='$user'";

            //update record
            $conn->query($newpwordupdate);

            messageAlert("Password changed successfully."); //call function created above
            echo "<script type='text/javascript'>location.href='index.php';</script>";//redirects to profile page once update is successful
        }
    }
    $conn->close();
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
        <title>AA Stud-Eat | Profile</title>
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
                background: url("../images/update.png");
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
                border: 2px solid green !important;
            }

            button {
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
            }

            #backbtn {
                font-family: 'Raleway', sans-serif;
                border: 2px solid #198754 !important;
                background: #D1FAE0 !important;
            }

            #backbtn:hover {
                border-color: rgba(133, 191, 125);
                box-shadow: 0 0 100px rgba(133, 191, 125);
                transform: scale(1.2);
            }

            #updbtn:hover {
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
        </nav>

        <div>
            <br><br>
        </div>

        <!--Form Segment-->
            <div class="col d-flex justify-content-center">
                <div class="container">
                    <div class="box-wrapper">
                        <div class="box box-border">
                            <div class="box-body">
                                <!--Title-->
                                <h1>Change Password</h1>
                                <p>Please enter your new password. If you would like to keep your old password, enter your old password instead:</p>
                                <!--Form-->
                                <form action="pwordchange.php" method="post">
                                    <div class="form-group">
                                        <input type="password" placeholder="Password must be at least 8 characters long" class="custom-field form-control" id=pword name="pword">
                                        <span class="help-block text-danger"><?php echo $pwordEmpty; ?></span>
                                        <span class="help-block text-danger"><?php echo $errorPword; ?></span>

                                        <span class="help-block text-danger"><?php echo $incorrectPword; ?></span>
                                    </div><br>
                                    <div class="d-grid gap-4 form-group text-center">
                                        <input type="submit" class="btn btn-success" id=updbtn name="save" value="Save">
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
?>