<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>
<div class="page-header">
    <h1>Hi, <b><?php echo $_SESSION['email']; ?></b>. Welcome to our site.</h1>
</div>
<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>