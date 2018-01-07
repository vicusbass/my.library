<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        require('Db.php');
        $id = $_GET["id"];
        $q = "SELECT first_name, last_name, email FROM users WHERE id='$id'";
        $r = @mysqli_query($dbc, $q);
        $row = mysqli_fetch_array($r, MYSQLI_NUM);

        $first_name = $row[0];
        $last_name = $row[1];
        $email = $row[2];
        ?>
        <? ob_start(); ?>
        <div class="row mt-1" id="editUser">
            <div class="col-6">
                <form method="post" role="form" id="editUser" name="editUser" action="useractions.php">
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value=<?= $first_name; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value=<?= $last_name; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value=<?= $email; ?>>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value=<?= $id; ?>>
                    <div class="form-group row">
                        <div class="col-sm-10  col-sm-offset-2">
                            <input type="submit" name="editUser" value="Save" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <? echo ob_get_clean(); ?>
    </div>
</main>

</body>
</html>