<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        require('../config/Db.php');
        $email = $_SESSION['email'];
        $userid = $_SESSION['id'];
        $q = "SELECT rentals.id, books.title title, books.authors authors, rentals.expiration_date expiration_date
FROM rentals 
INNER JOIN books ON books.id=rentals.book_id
WHERE rentals.user_id=$userid
ORDER BY expiration_date DESC;";
        $rows = @mysqli_query($dbc, $q);
        ?>
        <div class="row mt-1">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Expiration date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["title"] . "</th>";
                    echo "<td>" . $row["authors"] . "</td>";
                    echo "<td>" . $row["expiration_date"] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($dbc);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>