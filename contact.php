<?php

    //start the session
    session_start();

    //define and initialize variables
    $fname = $firstname = $lname = $lastname = $subject = $email = $eaddress = $msg = "";
    $fnameEmpty = $lnameEmpty = $emailEmpty = $subjectEmpty = $msgEmpty = $errorEmail = $errorfName = $errorlName = "";

    //Action for contact form. When the user clicks send, validate form and redirect to confirmation page if message is sent successfully
    if (isset($_POST['send'])) {

        //FORM DATA VALIDATION
        $fname = $_POST["fname"];
        if (empty($_POST["fname"])) {
            $fnameEmpty = '*First name field cannot be empty.';
        } else if (!preg_match ("/^[a-zA-Z-' ]*$/", $fname)) {
            $errorfName = '*Name can only contain letters';
        } else {
            $firstname = $_POST["fname"];
        }
       
        $lname = $_POST["lname"];
        if (empty($_POST["lname"])) {
            $lnameEmpty = '*Last name field cannot be empty.';
        } else if (!preg_match ("/^[a-zA-Z-' ]*$/", $lname)) {
            $errorlName = '*Name can only contain letters';
        } else {
            $lastname = $_POST["lname"];
        }

        $stuEmailPattern = "^[_a-z0-9-]+(\.[a-z0-9-]+)*@stu.aa.edu.us^";
        $email = $_POST["email"];
        if (empty($_POST["email"])) {
            $emailEmpty = '*Email field cannot be empty.';
        } else if (!preg_match ($stuEmailPattern, $email)){
            $errorEmail = '*Please use your student email.';
        } else {
            $eaddress = $_POST["email"];
        }
        
        if (empty($_POST["subject"])) {
            $subjectEmpty = '*Please select a subject.';
        } else {
            $subject = $_POST["subject"];
        }
        
        if (empty($_POST["msg"])) {
            $msgEmpty = '*Please type a message so we can best assist you.';
        } else {
            $msg = $_POST["msg"];
        }

        if (!empty($firstname) && !empty($lastname) && !empty($eaddress) && !empty($subject) && !empty($msg)) {
            header('Location: confirmation.php'); //redirects to confirmation page once message is successfully sent
        }
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
        <title>AA Stud-Eat | Contact Us</title>
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

            .active {
                background-color: #ddf8d7 !important;
                height: 100% !important;
            }

            .logo {
                display: block;
                margin: auto;
            }

            @media (min-width: 1200px) {
                #studlogo {
                    padding-top: 170px;
                }
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

            #sendbtn:hover {
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
                text-align: center;
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
            }

            /*SECTIONS*/
            #sec1 {
                background-image: url("../images/contact1.png");
                background-repeat: no-repeat;
                background-size: cover;
                padding-bottom: 25px;
            }

            #sec2 {
                background-image: url("../images/contact2.png");
                background-repeat: no-repeat;
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
                        <li class="nav-item lead"><a class="nav-link" href="products.php">PRODUCTS</a></li>
                        <li class="nav-item lead"><a class="nav-link active" aria-current="page" href="contact.php">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!--Business information-->
        <section id="sec1">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../images/AnnonaAcademy nb.png" class="logo">
                    </div>
                    <div class="col">
                        <img id="studlogo" style="padding-bottom:60px" src="../images/Stud-eatLogo nb.png" class="logo">
                    </div>
                    <br>
                    <div class="col w-75 mx-auto" style="background-color: rgba(239, 233, 220, 0.55); padding-top:25px">
                        <h3>The Stud-Eat Programme at Annona Academy</h3>
                        <br>
                        <p>1971 University Boulevard
                            <br>Lynchburg, Virginia
                            <br>24515
                            <br><br>Tel: 434-200-7423/434-209-9155
                            <br> Em: studeat@aa.edu.us
                            <br><br>Socials:
                            <br><img src="../images/fb.png" style="width:20px; height:20px">&nbsp;studeataa
                            <br><img src="../images/ig.png" style="width:20px; height:20px">&nbsp;studeat_aa
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--Form Segment-->
        <section id="sec2">
            <div class="container" style="padding-bottom: 25px">
                <div class="row">
                    <div class="col w-75 mx-auto">
                        <!--Title-->
                        <h3 style="padding-top:25px">Contact Us</h3>
                        <!--Form-->
                        <form action="contact.php" method="post" style="background-color: rgba(239, 233, 220, 0.55); padding-left: 25px; padding-right: 25px;">
                            <div class="form-group">
                                <label for=fname>First Name:</label>
                                <input type="text" placeholder="e.g. John" class="custom-field form-control" id=fname name="fname">
                                <span class="help-block text-danger"><?php echo $fnameEmpty; ?></span>
                                <span class="help-block text-danger"><?php echo $errorfName; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=lname>Last Name:</label>
                                <input type="text" placeholder="e.g. Doe" class="custom-field form-control" id=lname name="lname">
                                <span class="help-block text-danger"><?php echo $lnameEmpty; ?></span>
                                <span class="help-block text-danger"><?php echo $errorlName; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=email>Email Address:</label>
                                <input type="email" placeholder="e.g. jdoe@stu.aa.edu.us" class="custom-field form-control" id=email name="email">
                                <span class="help-block text-danger"><?php echo $emailEmpty; ?></span>
                                <span class="help-block text-danger"><?php echo $errorEmail; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=subject>Subject:</label>
                                <select class="custom-field form-control" id="subj" name="subject">
                                    <option value="" disabled selected hidden>~Please Select~ &#8690;</option>
                                    <option value="makeOrder">Place an Order</option>
                                    <option value="suggestion">Make a Suggestion</option>
                                    <option value="allergy">Allergy Inquiry</option>
                                    <option value="other">Other</option>
                                </select>
                                <span class="help-block text-danger"><?php echo $subjectEmpty; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=msg>Message:</label>
                                <textarea class="custom-field form-control" id=msg name="msg"></textarea>
                                <span class="help-block text-danger"><?php echo $msgEmpty; ?></span>
                            </div><br>
                            <div class="d-grid gap-4 form-group text-center">
                                <input type="submit" class="btn btn-success" id=sendbtn name="send" value="Send">
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer style="height:40px; bottom:0; width: 100%; background-color:snow;">
            <p style="text-align:center;">©Annona Academy 2022</p>
        </footer>

        <!--JS functionality-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>