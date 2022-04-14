<?php
    session_start();
    $_SESSION['username'] = htmlentities($_COOKIE['uname']);
    
    //connect to database
    $conn = new mysqli("localhost", "imani", "Eye8cerea!.", "studeat");
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //delete user account using prepared statement and bind
    $delrec = $conn->prepare("DELETE FROM tbl_users WHERE uname = ?");
    $delrec->bind_param("s", $currentuser);

    $currentuser = $_SESSION['username'];
    $delrec->execute();

    $conn->close();

    session_destroy();
    setcookie("uname", "", time() - 3600);
    header('Location: index.php');
?>