<?php
    session_start();
     if(!empty($_SESSION['login']) && !empty($_SESSION["password"]))
     {
        session_destroy();
        if($_COOKIE['staySignedIn'])
        {
            setcookie("staySignedIn", "", 0);
        }
     }
     header("Location: index.php");
?>