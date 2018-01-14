<?php
// Initialize the session
session_start();

// If session variable is not set or NOT an admin it will redirect to login page
if (!isset($_SESSION['isadmin']) || empty($_SESSION['isadmin']) || !isset($_SESSION['email']) || empty($_SESSION['email'])) {
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
            <li class="nav-item active">
                <a class="nav-link" href="/"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home <span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bookmanagement.php"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;
                    Book
                    management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="duebooks.php"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp; Due
                    books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp;
                    Users</a>
            </li>
        </ul>
        <a class="btn-danger" href="../logout.php"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp; Logout</a>
    </div>
</nav>