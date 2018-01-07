<?php include_once 'Db.php'; ?>
<?php
$db = new Db();
$connection = $db->connect();

if (isset($_POST['editUser']) && isset($_POST['first_name'])
    && isset($_POST['last_name']) && isset($_POST['email'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET first_name=?, last_name=?, email=? WHERE id=?";

    $statement = $connection->prepare($sql);
    if ($statement) {
        $statement->bind_param("sss", $first_name, $last_name, $email, $id);
        $statement->execute();
    } else {
        echo "<div>" . $statement->errno . $statement->error . "</div>";
    }
} else if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";

    $statement = $connection->prepare($sql);
    if ($statement) {
        $statement->bind_param("sss", $first_name, $last_name, $email);
        $statement->execute();
    } else {
        echo "<div>" . $statement->errno . $statement->error . "</div>";
    }
} else if (isset($_POST['deleteUser'])) {
    $idval = $_POST['deleteUser'];
    $query = "DELETE FROM users where id=$idval";

    $statement = $connection->prepare($query);
    if ($statement) {
        $statement->execute();
    } else {
        echo "<div>" . $statement->errno . $statement->error . "</div>";
    }
}
include 'userstable.php';
?>