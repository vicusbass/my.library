<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>
<main role="main" class="container">
    <div class="starter-template">
        <div class="row mt-1" id="searchBookForm">
            <h1>Hi, <b><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></b>. Welcome to our
                library.
            </h1>
        </div>
    </div>
</main>
</body>
</html>