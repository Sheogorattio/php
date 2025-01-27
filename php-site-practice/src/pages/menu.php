<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" href="index.php?page=1">Home</a>
    </li>
    <?php
    if(isset($_SESSION['user_name']))
    {
    ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=2">Upload</a>
    </li>
    <?php
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=3">Gallery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=4">Registration</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=5">Messages</a>
    </li>
</ul>
