<?php

    //start the session
    session_start();

    //function to show inaccessibility warning to logged out users
    function loggedOutAlert($msg){
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    //make page only accessible to logged in users
    if (isset($_COOKIE['uname'])) {
        $_SESSION['username'] = ($_COOKIE['uname']);
    } else {
        loggedOutAlert("Only logged in users can view this page!"); //call function created above
        echo "<script type='text/javascript'>location.href='index.php';</script>";//redirect logged out user
    }

    //connect to database
    $conn = new mysqli("localhost", "imani", "Eye8cerea!.", "studeat");
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //create table to store dish names and prices
    $createprod = "CREATE TABLE products (
                   id VARCHAR(2),
                   dish VARCHAR(255),
                   price DECIMAL(4,2),
                   PRIMARY KEY (id))";
    $conn->query($createprod);
    
    //insert data into table using prepare and bind method
    $insertprod = $conn->prepare("INSERT INTO products (id, dish, price) VALUES (?, ?, ?)");
    $insertprod->bind_param("ssd", $id, $dish, $price);

    $id = 'b1';
    $dish = 'Open Face Sandwiches';
    $price = 05.75;
    $insertprod->execute();

    $id = 'b2';
    $dish = 'Vegan Naan';
    $price = 04.75;
    $insertprod->execute();

    $id = 'b3';
    $dish = 'Full Vegan Continental';
    $price = 08.75;
    $insertprod->execute();
    
    $id = 'b4';
    $dish = 'Smoothie Bowl';
    $price = 07.75;
    $insertprod->execute();
    
    $id = 'b5';
    $dish = 'Fruit Salad (Customizable)';
    $price = 04.00;
    $insertprod->execute();
    
    $id = 'b6';
    $dish = 'Hot Beverages (Hot Chocolate, Tea)';
    $price = 03.75;
    $insertprod->execute();
                   
    $id = 'l1';
    $dish = 'Quinoa Salad';
    $price = 17.50;
    $insertprod->execute();
    
    $id = 'l2';
    $dish = 'Spaghetti Deluxe';
    $price = 13.40;
    $insertprod->execute();

    $id = 'l3';
    $dish = 'Tempeh Burger Combo';
    $price = 17.25;
    $insertprod->execute();
    
    $id = 'l4';
    $dish = 'Honey Cashew Cauliflower Meal';
    $price = 18.75;
    $insertprod->execute();
    
    $id = 'l5';
    $dish = 'Marble Cake Slices';
    $price = 12.40;
    $insertprod->execute();
    
    $id = 'l6';
    $dish = 'Fruit Smoothies (Full Fruit, Orange, Kiwi, Mango)';
    $price = 10.00;
    $insertprod->execute();
                   
    $id = 'd1';
    $dish = 'Garlic Soy Tofu Meal';
    $price = 14.50;
    $insertprod->execute();

    $id = 'd2';
    $dish = 'Tomato & Artichoke Macaroni';
    $price = 11.40;
    $insertprod->execute();
    
    $id = 'd3';
    $dish = 'Vegan Shepherds Pie';
    $price = 12.75;
    $insertprod->execute();
    
    $id = 'd4';
    $dish = 'Thai Basil Pancakes';
    $price = 09.75;
    $insertprod->execute();

    $id = 'd5';
    $dish = 'Empanadas';
    $price = 08.75;
    $insertprod->execute();
    
    $id = 'd6';
    $dish = 'Potato Pillows';
    $price = 04.75;
    $insertprod->execute();

    $insertprod->close();
                   
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
        <title>AA Stud-Eat | Products</title>
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
            }

            h2 {
                text-align: center;
                font-size: 45px;
                font-family: 'Cinzel Decorative', cursive;
            }

            h3 {
                text-align: center;
                font-size: 35px;
                font-family: 'Cinzel Decorative', cursive;
                padding-bottom: 20px;
            }

            h4 {
                text-align: center;
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
                padding-bottom: 30px;
            }

            p {
                text-align: left;
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
                padding-left: 1%;
            }

            .card-title {
                text-align: center;
                font-size: 20px;
                font-family: 'Raleway', sans-serif;
            }

            .card-text {
                text-align: center;
                font-size: 15px;
                font-family: 'Raleway', sans-serif;
                padding-top: 1%;
            }


            /*SECTIONS*/
            .card {
                background-color: #effdec;
                border-radius: 1rem;
                border: none; 
                display: block;
            }

            .card:hover {
                border-color: rgba(133, 191, 125);
                box-shadow: 0 0 100px rgba(133, 191, 125);
                transform: scale(1.2);
            }
            
            #sec1 {
                background-image: url("../images/prod1.png");
                background-repeat: no-repeat;
            }

            #sec2 {
                background-color: #D9AFD9;
                background-image: linear-gradient(28deg, #D9AFD9 0%, #97D9E1 41%, #f6edd9 87%);
            }

            #sec3 {
                background-image: url("../images/prod2.png");
                background-repeat: no-repeat;
            }

            #order {
                display: block;
                padding-bottom: 20px;
            }

            #orderbtn {
                font-family: 'Raleway', sans-serif;
                border: 1px solid #ddf8d7 !important;
                background: rgba(221, 248, 215, 0.75) !important;
                box-shadow: 3px 3px rgba(0, 0, 0, 0.5);
            }

            #orderbtn:hover {
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"><a class="nav-link" href="index.php">HOME</a></li>
                        <li class="nav-item lead"><a class="nav-link active" aria-current="page" href="products.php">PRODUCTS</a></li>
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
                <div class="col md-6 justify-content-center" style="padding-top:10%; padding-right: 2%">
                    <h1 style="padding-top: 5%">Hi, <?php echo $_SESSION['username']; ?>!</h1>
                    <h3>Here are our menu options!</h3>
                </div>
            </div>
        </section>

        <div style="background-color:snow;"><br></div>

        <!--Search form-->
        <?php include_once 'search.php';?>
        
        <section id="sec2">

            <!--Breakfast-->
            <h2 style="padding-top: 20px;">Breakfast</h2>
            <h4>Served from 7-9:30 A.M.</h4>
            <div class="container">
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast1.png" class="card-img-top" alt="Open Face Sandwiches">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b1'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b1'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast2.png" class="card-img-top" alt="Vegan Naan">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b2'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b2'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast3.png" class="card-img-top" alt="Full Vegan Continental">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b3'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b3'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast4.png" class="card-img-top" alt="Smoothie Bowl">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b4'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b4'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast5.png" class="card-img-top" alt="Fruit Salad (Customizable)">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b5'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b5'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/breakfast/bfast6.png" class="card-img-top" alt="Hot Beverages (Hot Chocolate, Tea)">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='b6'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='b6'");
                                    
                                    $bname = $sqlname->fetch_array()[0] ?? '';
                                    $bprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$bname</h5>";
                                    echo "<p class='card-text'>$$bprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Lunch-->
            <h2>Lunch</h2>
            <h4>Served from 12-3:00 P.M.</h4>
            <div class="container">
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/lunch/l1.png" class="card-img-top" alt="Quinoa Salad">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l1'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l1'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/lunch/l2.png" class="card-img-top" alt="Spaghetti Deluxe">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l2'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l2'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/lunch/l3.png" class="card-img-top" alt="Tempeh Burger Combo">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l3'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l3'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem;height: 28rem">
                            <img src="../images/lunch/l4.png" class="card-img-top" alt="Honey Cashew Cauliflower Meal">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l4'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l4'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/lunch/l5.png" class="card-img-top" alt="Marble Cake Slices">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l5'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l5'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/lunch/l6.png" class="card-img-top" alt="Fruit Smoothies (Full Fruit, Orange, Kiwi, Mango)">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='l6'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='l6'");
                                    
                                    $lname = $sqlname->fetch_array()[0] ?? '';
                                    $lprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$lname</h5>";
                                    echo "<p class='card-text'>$$lprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Dinner-->
            <h2>Dinner</h2>
            <h4>Served from 5-8:00 P.M.</h4>
            <div class="container">
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/dinner/d1.png" class="card-img-top" alt="Garlic Soy Tofu Meal">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d1'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d1'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/dinner/d2.png" class="card-img-top" alt="Tomato & Artichoke Macaroni">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d2'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d2'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/dinner/d3.png" class="card-img-top" alt="Vegan Shepherd's Pie">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d3'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d3'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem;height: 28rem">
                            <img src="../images/dinner/d4.png" class="card-img-top" alt="Thai Basil Pancakes">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d4'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d4'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/dinner/d5.png" class="card-img-top" alt="Empanadas">
                            <div class="card-body">
                                <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d5'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d5'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom: 25px;">
                        <div class="card mx-auto" style="width: 20rem; height: 28rem">
                            <img src="../images/dinner/d6.png" class="card-img-top" alt="Potato Pillows">
                            <div class="card-body">
                                    <?php 
                                    $sqlname = $conn->query("SELECT dish FROM products WHERE id='d6'");
                                    $sqlprice = $conn->query("SELECT price FROM products WHERE id='d6'");
                                    
                                    $dname = $sqlname->fetch_array()[0] ?? '';
                                    $dprice = $sqlprice->fetch_array()[0] ?? '';
                                    echo "<h5 class='card-title'>$dname</h5>";
                                    echo "<p class='card-text'>$$dprice</p>";
                                    $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Contact Page Link-->
        <section id="sec3">
            <div class="container" id="order">
                <div class="row">
                    <div class="col w-75 mx-auto">
                        <h2 style="padding-top: 20px; padding-bottom: 10px">Ready to order?</h2>
                        <a role="button" href="contact.php" class="btn d-grid col-9 mx-auto" id="orderbtn">Place Order!</a>
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