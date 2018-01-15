<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        require('../../config/Db.php');
        $q = "SELECT rentals.id, users.id userid, users.last_name last_name, users.first_name first_name, books.id bookid, books.title title, books.authors authors, rentals.expiration_date expiration_date
FROM rentals
INNER JOIN users ON users.id=rentals.user_id
INNER JOIN books ON books.id=rentals.book_id
ORDER BY expiration_date DESC;";
        $rows = @mysqli_query($dbc, $q);
        ?>
        <div class="row">
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#addBookForm"
                    aria-expanded="false" aria-controls="addBookForm">
                Add book
            </button>
        </div>
        <div class="row mt-1">
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Expiration date</th>
                    <th scope="col">Return</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    $row_class = "";
                    if ($row["expiration_date"] < date("Y-m-d")) {
                        $row_class .= "table-danger";
                    };
                    echo "<tr class='" . $row_class . "'>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["authors"] . "</td>";
                    echo "<td>" . $row["expiration_date"] . "</td>";
                    echo "<td><a class='btn btn-success' href='returnbook.php?rentalid=" . $row["id"] . "&bookid=" . $row["bookid"] . "'><i class='fa fa-cart-plus' title='return'></i></a></td>";
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