<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        //if page is loaded by clicking on rent btn
        if ((isset($_GET['rentalid'])) && (is_numeric($_GET['rentalid'])) &&
            (isset($_GET['bookid'])) && (is_numeric($_GET['bookid']))) {
            require('../../config/Db.php');
            $bookid = $_GET["bookid"];
            $rentalid = $_GET["rentalid"];
            $q = "SELECT * FROM rentals WHERE (book_id = " . $bookid . ") AND (id = " . $rentalid . ")";
            $r = @mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) == 0) {
                echo "<h2>Rental entry not found</h2>";
            } else {
                $q1 = "SELECT available FROM books WHERE id = " . $bookid;
                $r1 = @mysqli_query($dbc, $q1);
                if (mysqli_num_rows($r1) == 1) {
                    $book = mysqli_fetch_assoc($r1);
                    $available = $book['available'];
                    //increase number of available books
                    $increased = $available + 1;
                    $update_books = "UPDATE books SET available = " . $increased . " WHERE id = " . $bookid;
                    $r2 = @mysqli_query($dbc, $update_books);
                    //remove entry from rentals
                    $delete_rental = "DELETE FROM rentals WHERE id = " . $rentalid;
                    $r3 = @mysqli_query($dbc, $delete_rental);
                    if ($r2 && $r3) {
                        echo "<h2>Book returned to library</h2>";
                    } else {
                        echo "<h2>Returning book failure</h2>";
                    }
                }
            }
            mysqli_free_result($r);
            mysqli_free_result($r1);
            mysqli_close($dbc);
        }

        ?>
    </div>
</main>

</body>
</html>