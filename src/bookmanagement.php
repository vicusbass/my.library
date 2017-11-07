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
        $rows = $db->select("SELECT * FROM books");
        ?>
        <div class="row">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addBookForm"
                    aria-expanded="false" aria-controls="addBookForm">
                Add book
            </button>
        </div>
        <div class="row mt-1">
            <div class="collapse" id="addBookForm">
                <form>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authors" class="col-sm-2 col-form-label">Authors</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="authors" placeholder="Authors">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-1">
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Edition</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["authors"] . "</td>";
                    echo "<td>" . $row["year"] . "</td>";
                    echo "<td>" . $row["isbn"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'jsscripts.php'; ?>

</body>
</html>