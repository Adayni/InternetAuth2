<?php

    //connect to database
    $conn = new mysqli("localhost", "imani", "Eye8cerea!.", "studeat");
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //declaration and initialization of variables
    $searchResult = "";

    //Action for registration form. When the user clicks register, validate form and redirect to home page if registration is successful
    if (isset($_POST['search'])) {

        $dishname = $_POST["dname"];
        $cost = $_POST["price"];
        $selectqry = $conn->query("SELECT dish, price FROM products WHERE dish like '%$dishname%' AND price <= $cost") or die ("Invalid input resulting in search failure. Please press the back button on your browser.");

        $count = $selectqry->num_rows;
        if ($count == 0 || $dishname == NULL || $cost == NULL) {
            $searchResult = "No results found";
        } else {
            while($row = $selectqry -> fetch_array()) {
                $dname = $row["dish"];
                $cp = $row["price"];

                $searchResult .= 
                "<div style='padding-bottom: 20px'>".
                    "<table>".
                        "<tr>".
                            "<th>"."Dish"."</th>".
                            "<th>"."Price"."</th>".
                        "</tr>".
                        "<tr>".
                            "<td>".$dname."</td>".
                            "<td>".$cp."</td>".
                        "</tr>".
                    "</table>".
                "</div>";
            }
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

            body {
                background: url("../images/search.png");
                background-repeat: no-repeat;
            }

            .active {
                background-color: #ddf8d7 !important;
                height: 100% !important;
            }

            label {
                font-size: 14px;
                font-family: 'Raleway', sans-serif;
                font-weight: bold;
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

            #searchbtn:hover {
                box-shadow: 0 0 100px green;
                transform: scale(1.1);
            }

            table, th, td {
                border: 1px solid black;
                width: 50%;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }

            /*FONTS*/
            h1 {
                text-align: center;
                font-size: 65px;
                font-family: 'Cinzel Decorative', cursive;
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

        <!--Form-->
        <div class="col">
            <div class="container justify-content-center" style="border: 2px; background-color: rgba(255, 250, 250, 0.5); margin-top: 25px">
                <div class="box-wrapper">
                    <div class="box box-border">
                        <div class="box-body">
                            <a href=products.php style="color:black !important"><h1 style="padding-top: 2%">~Search~</h1></a>
                            <form action="search.php" method="post">
                                <div class="form-group">
                                    <label for=fname>Dish:</label>
                                    <input type="text" placeholder="Search for a dish..." class="custom-field form-control" name="dname">
                                </div>
                                <div class="form-group">
                                    <label for=fname>Price:</label>
                                    <input type="text" placeholder="Maximum price (e.g. 10.00)" class="custom-field form-control" name="price">
                                </div><br>
                                <div class="d-grid gap-4 form-group text-center">
                                    <input type="submit" class="btn btn-success" id=searchbtn name="search" value="Search">
                                </div><br>
                                <?php
                                    echo($searchResult);
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <br>
        </div>

        <!--JS functionality-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>