<?php include_once 'Db.php'; ?>
<div id="usersTable">
    <div class="row mt-1">
        <table class="table">
            <thead class="thead-light">

            <tr>
                <th scope="col">#</th>
                <th scope="col">Last name</th>
                <th scope="col">First name</th>
                <th scope="col">Email</th>
                <th scope="col">Details</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db = new Db();
            $rows = $db->select("SELECT * FROM users ORDER BY last_name");
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</th>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a class='btn btn-success' href='edituser.php?id=" . $row["id"] . "'><i class='fa fa-edit' title='edit'></i></a></td>";
                echo "<td><a class='btn btn-danger' href='#'><i onclick='deleteUser(" . $row["id"] . ")' class='fa fa-trash' title='delete'></i></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>