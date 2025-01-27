<?php
    session_start();
    if(!empty($_SESSION['login']))
    {
        echo "Hello, ".$_SESSION['login'].'&nbsp;';
        echo '<a href="logout.php">Logout</a>';
    }
    else{
        echo '<div style="display:flex;">
                <a href="signin.php">Log in</a>
                <span> / </span>
                <a href="signup.php"> Sign up</a>
            </div>';
    }
?>


