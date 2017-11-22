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
        $rows = $db->select("SELECT * FROM users ORDER BY last_name");

        if (isset($_POST['submit'])) {

            try {
                $new_user = array(
                    "first_name" => $_POST['first_name'],
                    "last_name" => $_POST['last_name'],
                    "email" => $_POST['email'],
                );
                $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";

                $statement = $db->query_prepared($sql);
                $statement->bind_param("sss", implode(", ", array_keys($new_user)));
                $statement->execute();
            } catch (PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }

        }
        ?>
        <div class="row">
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#addUser"
                    aria-expanded="false" aria-controls="addUser">
                Add user
            </button>
        </div>
        <div class="row mt-1 collapse" id="addUser">
            <div class="col-6">
                <form method="post">
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save user</button>
                </form>
            </div>
        </div>
        <div class="row mt-1">
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
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