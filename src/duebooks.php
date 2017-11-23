<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<?php include 'Db.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        $db = new Db();
        $rows = $db->select("SELECT rentals.id, users.last_name last_name, users.first_name first_name, books.title title, books.authors authors, rentals.expiration_date expiration_date
FROM rentals
INNER JOIN users ON users.id=rentals.user_id
INNER JOIN books ON books.id=rentals.book_id
ORDER BY expiration_date DESC;");
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
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["authors"] . "</td>";
                    echo "<td>" . $row["expiration_date"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>