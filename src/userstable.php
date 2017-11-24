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
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>