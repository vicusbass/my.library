<?php include_once 'Db.php'; ?>
<?php
$db = new Db();
if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";

    $connection = $db->connect();
    $statement = $connection->prepare($sql);
    if ($statement) {
        $statement->bind_param("sss", $first_name, $last_name, $email);
        $statement->execute();
    } else {
        echo "<div>" . $statement->errno . $statement->error . "</div>";
    }
}
if(isset($_POST['submit'])){
    $idval=$_POST['submit'];
    $query="DELETE FROM users where id=$idval";
    $connection = $db->connect();
    $statement = $connection->prepare($query);
    if ($statement) {
        $statement->execute();
    } else {
        echo "<div>" . $statement->errno . $statement->error . "</div>";
    }
}
include 'userstable.php';
?>