<?php
$page =0;
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
?>

<ul class="nav nav-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==1) ? 'active' : ''; ?>" href="./index.php?page=1">Tours</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==2) ? 'active' : ''; ?>" href="./index.php?page=2">Comments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==3) ? 'active' : ''; ?>" href="./index.php?page=3">Registration</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==4) ? 'active' : ''; ?>" href="./index.php?page=4">Admin Forms</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==5) ? 'active' : ''; ?>" href="./index.php?page=5">Private</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($page==6) ? 'active' : ''; ?>" href="./index.php?page=6">Comments</a>
    </li>
</ul>
