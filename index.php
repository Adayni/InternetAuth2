<?php

    //start the session
    session_start();

    //set session variables from registration or login form input
    if (isset($_COOKIE['uname'])) {
        $_SESSION['username'] = htmlentities($_COOKIE['uname']);
    } else {
        $_SESSION['username'] = 'Guest';
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
        <title>Stud-EAT | Annona Academy</title>
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

            /*FONTS*/
            h1 {
                text-align: center;
                font-size: 65px;
                font-family: 'Cinzel Decorative', cursive;
                padding-right: 1%;
            }

            h2 {
                text-align: center;
                font-size: 40px;
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

            #sec2 p{
                text-align: center !important;
                font-size: 30px;
            }

            ul {
                font-family: 'Raleway', sans-serif;
                font-size: 20px;
            }

            /*SECTIONS*/
            #sec1 {
                background-image: url("../images/bg1.png");
                background-repeat: no-repeat;
                padding-bottom: 25px;
            }

            #logbtn {
                font-family: 'Raleway', sans-serif;
                border: 1px solid #ddf8d7 !important;
                background: rgba(221, 248, 215, 0.75) !important;
                box-shadow: 3px 3px rgba(0, 0, 0, 0.5);
            }

            #logbtn:hover {
                border-color: rgba(133, 191, 125);
                box-shadow: 0 0 100px rgba(133, 191, 125);
                transform: scale(1.2);
            }

            #sec2 {
                background-image: url("../images/bg2.png");
                background-repeat: no-repeat;
                padding-bottom: 15px;
                padding-top: 35px;
            }

            #sec3 {
                background-image: url("../images/bg3.png");
                background-repeat: no-repeat;
                padding-top: 35px;
                padding-bottom: 25px;
            }

            #sec4 {
                background-image: url("../images/bg4.png");
                background-repeat: no-repeat;
                padding-top: 35px;
                padding-bottom: 25px;
            }

            #sec5 {
                background-image: url("../images/bg5.png");
                background-repeat: no-repeat;
                padding-top: 35px;
                padding-bottom: 25px;
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
                        <li class="nav-item lead"><a class="nav-link active" aria-current="page" href="index.php">HOME</a></li>
                        <li class="nav-item lead"><a class="nav-link" href="products.php">PRODUCTS</a></li>
                        <li class="nav-item lead"><a class="nav-link" href="contact.php">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Section 1: Greeting-->
        <section id="sec1">
            <div class="row">
                <div class="col md-6 d-flex justify-content-center">
                    <img src="../images/AnnonaAcademy nb.png">
                </div>
                <div class="col md-6 justify-content-center" style="padding-top:15%;">
                    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
                    <div class="d-grid gap-2 col-9 mx-auto">
                        <!--Display register and login buttons for logged out users and display logout button for logged in users-->
                        <?php
                            if ($_SESSION['username'] === 'Guest'){
                                echo '<a role="button" href="register.php" class="btn" id="logbtn">Register</a>';
                                echo '<a role="button" href="login.php" class="btn" id="logbtn">Login</a>';
                            } else {
                                echo '<a role="button" href="pwordchange.php" class="btn" id="logbtn">Change Password</a>';
                                echo '<a role="button" href="logout.php" class="btn" id="logbtn">Logout</a>';
                                echo '<a role="button" href="delete.php" class="btn" id="logbtn">Delete Account</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <div style="background-color:snow;"><br></div>

        <!--Section 2: Logo and Tagline-->
        <section id="sec2">
            <h3 class="text-center" style="font-size:55px;">Our Vegan Catering Programme</h3>
            <img src="../images/Stud-eatLogo nb.png" class="mx-auto d-block" style="padding-top: 40px; padding-bottom: 40px; height:30%; width:30%;">
            <p><b>Providing healthy meals for you!</b></p>
        </section>

        <div style="background-color:#ddf8d7;"><br></div>

        <!--Section 3: About Us-->
        <section id="sec3">
            <h2>About the Initiative</h2>
            <p>As a Seventh-Day Adventist school, we, here at Annona Academy, believe in the principles of health, including optimal nutrition,
                regular exercise, adequate water, lots of sunlight, strict adherence to temperance, fresh air, rest, and trust in God.
            <br><br>In the line of nutrition, Stud-Eat is a programme designed to ensure that all of our students here at Annona Academy have access to healthy meal options.
                <br><i>"It is a mistake to suppose that muscular strength depends on the use of animal food. The needs of the system can be better supplied, and more vigorours health
                    can be enjoyed without its use. The grains, with fruit, nuts, and vegetables, contain all the nutritive properties necessary to make good blood. These elements
                    are not so well or so fully supplied by a flesh diet. Had the use of flesh been essential to health and strength, animal food would have been included in the diet 
                    appointed man in the beginning."</i>
                <br><cite>~ Child Guidance, 384.1</cite>, by Ellen White
                <br><br>We provide a variety of options at all the major meal times of the day, breakfast, lunch and dinner. Be sure to register and login with your student credentials 
                to be able to view the menu on our Products page. Meals can be pre-ordered and collected from any of the dining halls on campus. Meals will not, however, be delivered 
                to dormitories or off-campus locations.
            </p>
        </section>

        <div style="background-color:snow;"><br></div>

        <!--Section 4: Further Information-->
        <section id="sec4">
            <h2>Our Meals</h2>
            <p>Our meal plans are carefully curated to produce holistic meals that contain adequate portions of each of the necessary food groups:
                <br><ul>
                    <li>Whole Grains</li>
                    <li>Legumes, Nuts and Seeds</li>
                    <li>Fruits</li>
                    <li>Vegetables</li>
                    <li>Fats and Oils</li>
                </ul>
            </p>
            <p>As a vegan-centred initiative, all meals are prepared:
                <br><ul>
                    <li>Meat Free</li>
                    <li>Dairy Free (no milk, eggs)</li>
                </ul>
            </p>
            <p><br>N.B. Gluten and sugar free alternatives are available for every meal<br>
            </p>

            <h2 style="padding-top: 15px;"> - Allergy Information - </h2>
            <p>If you are allergic to any common foods, please select your meals carefully as meals may contain, and are produced in an environment that handles soy, peanuts, tree nuts, sesame and wheat.
            </p>
        </section>

        <!--Footer-->
        <footer style="width: 100%; background-color:snow;">
            <p style="text-align:center;">©Annona Academy 2022</p>
        </footer>

        <!--JS functionality-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>