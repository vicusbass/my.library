<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <div class="row">
            <button class="btn btn-outline-primary btn-space" type="button" data-toggle="collapse"
                    data-target="#addBookForm"
                    aria-expanded="false" aria-controls="addBookForm">
                Add book
            </button>
            <a class="btn btn-link btn-space" type="button" href="searchbook.php">
                Search book
            </a>
        </div>
        <div class="row mt-1 collapse" id="addBookForm">
            <div class="col-6">
                <form method="post" role="form" id="addBook" name="addBook" action="">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authors" class="col-sm-2 col-form-label">Authors</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="authors" id="authors" placeholder="Authors">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Edition (year)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="year" id="year" placeholder="Year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="copies" class="col-sm-2 col-form-label">Copies</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="copies" id="copies"
                                   placeholder="Number of copies">
                        </div>
                    </div>
                    <button type="submit" name="addBook" class="btn btn-primary">Save book</button>
                </form>
            </div>
        </div>
        <?php
        require('Db.php');
        if (isset($_POST['title'], $_POST['authors'], $_POST['isbn'], $_POST['year'], $_POST['copies'])) {
            $title = $_POST['title'];
            $authors = $_POST['authors'];
            $isbn = $_POST['isbn'];
            $year = $_POST['year'];
            $copies = $_POST['copies'];
            $sql = "INSERT INTO books (title, isbn, year, available, authors) VALUES ('$title', '$isbn', '$year', '$copies', '$authors')";
            $r = @mysqli_query($dbc, $sql);

            if (!$r) {
                echo "<div>" . mysqli_error($dbc) . "</div>";
            }
        }
        ?>
        <div class="row mt-1">
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Edition</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Available</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $q = "SELECT * FROM books";
                $rows = @mysqli_query($dbc, $q);
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["authors"] . "</td>";
                    echo "<td>" . $row["year"] . "</td>";
                    echo "<td>" . $row["isbn"] . "</td>";
                    echo "<td>" . $row["available"] . "</td>";
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