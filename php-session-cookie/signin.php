<?php
    session_start();
?>
<form action="" method="POST">
    <h2>Log in</h2>
    <div>
        <span>Login:</span>
        <input type="text" name="login" value="">
    </div>
    <div>
        <span>Password:</span>
        <input type="password" name="password" value="">
    </div>
    <div>
        <span>Keep me signed in </span>
        <input type="checkbox" name="staySignedIn">
    </div>
    <input type="submit" value="Log in">
</form>
<?php
    if(!empty($_POST['login']) && !empty($_POST["password"]))
    {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        if(!empty($_POST['staySignedIn']))
        {
            setcookie("staySignedIn", $_POST['staySignedIn'], time()+(60*60*24*30), '/', httponly:true);
        }
        header("Location: index.php");
        exit();
    }
?>