<?php
session_start();
include_once("pages/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
</head>
<header class="col-sm-12 col-md-12 col-lg-12">
    <?php include_once("pages/login.php");?>
</header>

<body>
<div class="container">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Travel Agency</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php include_once('pages/menu.php');?>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="row">
            <section class="col-12">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page == 1) include_once("pages/tours.php");
                    if ($page == 2) include_once("pages/comments.php");
                    if ($page == 3) include_once("pages/registration.php");
                    if ($page == 4) include_once("pages/admin.php");
                    if ($page == 5) include_once("pages/private.php");
                    if ($page == 6) include_once("pages/comments.php");
                }
                ?>
            </section>
        </div>
    </main>

    <footer class="text-center mt-4">
        <p>Step Academy &copy;</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
