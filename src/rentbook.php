<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        //if page is loaded by clicking on rent btn
        if ((isset($_GET['bookid'])) && (is_numeric($_GET['bookid']))) {
            require('../config/Db.php');
            $bookid = $_GET["bookid"];
            $userid = $_SESSION['id'];
            //check if the user does not have it already
            $q = "SELECT * FROM rentals WHERE (book_id = " . $bookid . ") AND (user_id = " . $userid . ")";
            $r = @mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) == 1) {
                echo "<h2>You already rented this book</h2>";
            } else {
                $q1 = "SELECT available FROM books WHERE id = " . $bookid;
                $r1 = @mysqli_query($dbc, $q1);
                if (mysqli_num_rows($r1) == 1) {
                    $book = mysqli_fetch_assoc($r1);
                    $available = $book['available'];
                    if ($available == 0) {
                        echo "<h2>No available books at the moment</h2>";
                    } else {
                        //decrease number of available books
                        $decreased = $available - 1;
                        $update_books = "UPDATE books SET available = " . $decreased . " WHERE id = " . $bookid;
                        $r2 = @mysqli_query($dbc, $update_books);
                        //add entry to rentals
                        $next_month = Date('y-m-d', strtotime("+30 days"));
                        $insert_rental = "INSERT INTO rentals (user_id, book_id, expiration_date) VALUES ('$userid','$bookid','$next_month')";
                        $r3 = @mysqli_query($dbc, $insert_rental);
                        if ($r2 && $r3) {
                            echo "<h2>You have the book for one month. Don't forget to return it!</h2>";
                        } else {
                            echo "<h2>Renting book failure</h2>";
                        }
                    }
                }
                mysqli_free_result($r1);
            }
            mysqli_free_result($r);

            mysqli_close($dbc);
        }

        ?>
    </div>
</main>

</body>
</html>