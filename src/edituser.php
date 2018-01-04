<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>
<?php include_once 'Db.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <?php
        $db = new Db();
        $rows = $db->select("SELECT * FROM users WHERE id=" . $_GET["id"]);
        $first_name = $rows[0]["first_name"];
        $last_name = $rows[0]["last_name"];
        $email = $rows[0]["email"];
        ?>
        <? ob_start(); ?>
        <div class="row mt-1" id="editUser">
            <div class="col-6">
                <form method="put" role="form" id="editUserForm" name="editUser" action="useractions.php">
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
                    <div class="form-group row">
                        <div class="col-sm-10  col-sm-offset-2">
                            <input type="submit" name="submit" value="Save" class="btn btn-success"/>
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