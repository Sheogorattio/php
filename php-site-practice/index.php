<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php Site</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/messages-style.css">
  </head>
  <body>
    <div class="container" >
        <div class="row">
            <header class="col-sm-12 col-md-12 col-lg-12">
               
            </header>         
        </div>
        <div class="row">
            <nav class="col-sm-12 col-md-12 col-lg-12">
                <?php
                session_start();
                include_once './vendor/autoload.php';
                setcookie('current_page', '1', time()+60*60*24*30, '/', httponly:true );
                    include_once('src/pages/menu.php');
                    include_once('src/pages/functions.php');
                    if(isset($_SESSION['user_name']))
                    {
                        echo '<div class="d-flex position-absolute top-0 end-0 m-3">
                                    Hello '.$_SESSION['user_name'].'!
                                </div>';
                    }
                    
                    else if(isset($_POST['lgnbtn']))
                    {
                      login($_POST['login'], $_POST['pass']);
                    }
                    else if(isset($_POST['regbtn']))
                    {   
                        header("Location: index.php?page=4");
                    }
                    else
                    {
                        ?>
                            <form action="" method="post" class="d-flex position-absolute top-0 end-0 m-3">
                                <div class="me-2">
                                    <input type="text" class="form-control" name="login" placeholder="Login">
                                </div>
                                <div class="me-2">
                                    <input type="password" class="form-control" name="pass" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="lgnbtn">Log in</button>
                                <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
                            </form>
                        <?php
                    } 
                ?>
            </nav> 
        </div>
        <div class="row">
            <section class="col-sm-12 col-md-12 col-lg-12">
                <?php
                    if(isset($_GET['page']))
                    {
                        $page =$_GET['page'];
                        if($page == 1) include_once('src/pages/home.php');
                        if($page == 2 && isset($_SESSION['user_name'])) include_once('src/pages/upload.php');
                        if($page == 3) include_once('src/pages/gallery.php');
                        if($page == 4) include_once('src/pages/registration.php');
                        if($page == 5) include_once('src/pages/messages.php');
                    }
                ?>
            </section>    
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>