<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("location: ../login.php");
    exit;
}
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Library.io</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems"
            aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarItems">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo($_SERVER['PHP_SELF'] == '/index.php' ? ' active' : ''); ?>">
                <a class="nav-link" href="index.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home
                    <span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo($_SERVER['PHP_SELF'] == '/searchbook.php' ? ' active' : ''); ?>">
                <a class="nav-link" href="searchbook.php"><i class="fa fa-search fa-fw" aria-hidden="true"></i>&nbsp;
                    Search book</a>
            </li>
            <li class="nav-item <?php echo($_SERVER['PHP_SELF'] == '/duebooks.php' ? ' active' : ''); ?>">
                <a class="nav-link" href="duebooks.php"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp; Due
                    books</a>
            </li>
        </ul>
        <a class="btn-danger" href="logout.php"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp; Logout</a>
    </div>
</nav>