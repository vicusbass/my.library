<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <div class="row mt-1" id="searchBookForm">
            <div class="col-6">
                <form action="" method="get">
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
                    <button type="submit" name="searchBook" class="btn btn-primary">Search</button>
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
                    <th scope="col">Available</th>
                    <th scope="col">Rent</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_GET['searchBook'])) {
                    require('../config/Db.php');
                    $isbn = mysqli_real_escape_string($dbc, $_REQUEST['isbn']);
                    $authors = mysqli_real_escape_string($dbc, $_REQUEST['authors']);
                    $title = mysqli_real_escape_string($dbc, $_REQUEST['title']);
                    $q = "SELECT * FROM books WHERE isbn LIKE '%" . $isbn . "%' AND authors LIKE '%" . $authors . "%' AND title LIKE '%" . $title . "%'";
                    $r = @mysqli_query($dbc, $q);
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["id"] . "</th>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["authors"] . "</td>";
                        echo "<td>" . $row["year"] . "</td>";
                        echo "<td>" . $row["isbn"] . "</td>";
                        echo "<td>" . $row["available"] . "</td>";
                        echo "<td><a class='btn btn-success' href='rentbook.php?bookid=" . $row["id"] . "'><i class='fa fa-cart-plus' title='rent'></i></a></td>";
                        echo "</tr>";
                    }

                    mysqli_free_result($r);
                    mysqli_close($dbc);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>