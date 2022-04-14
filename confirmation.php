<?php

    //start the session
    session_start();
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

            .logo {
                display: block;
                margin: auto;
            }

            @media (min-width: 1200px) {
                #studlogo {
                    padding-top: 170px;
                }
            }

            /*FONTS*/
            h2 {
                text-align: center;
                font-size: 35px;
                font-family: 'Cinzel Decorative', cursive;
                padding-bottom: 20px;
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

            button {
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
            }

            #conf {
                display: block;
                padding-bottom: 20px;
            }

            #gohomebtn {
                font-family: 'Raleway', sans-serif;
                border: 1px solid #ddf8d7 !important;
                background: rgba(221, 248, 215, 0.75) !important;
                box-shadow: 3px 3px rgba(0, 0, 0, 0.5);
            }

            #gohomebtn:hover {
                border-color: rgba(133, 191, 125);
                box-shadow: 0 0 100px rgba(133, 191, 125);
                transform: scale(1.2);
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
        
        <!--Confirmation Message-->
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
                    <div class="container" id="conf">
                        <div class="row">
                            <div class="col w-75 mx-auto">
                                <h2 style="padding-top: 20px; padding-bottom: 10px">MESSAGE SUCCESSFULLY SENT!</h2>
                                <a role="button" href="index.php" class="btn d-grid col-9 mx-auto" id="gohomebtn">Return to Home &rArr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer style="height:40px; bottom:0; width: 100%; background-color:snow;">
            <p style="text-align:center;">©Annona Academy 2022</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>