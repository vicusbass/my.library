<?php
require('Db.php');

if (isset($_POST['editUser']) && isset($_POST['first_name'])
    && isset($_POST['last_name']) && isset($_POST['email'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id='$id'";
    $r = @mysqli_query($dbc, $sql);
    if ($r) {
        header('Location: users.php');
    } else {
        echo "<div>" . mysqli_error($dbc) . "</div>";
    }
} else if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
    $r = @mysqli_query($dbc, $sql);

    if (!$r) {
        echo "<div>" . mysqli_error($dbc) . "</div>";
    }
} else if (isset($_POST['deleteUser'])) {
    $idval = $_POST['deleteUser'];
    $query = "DELETE FROM users where id=$idval";
    $r = @mysqli_query($dbc, $query);

    if (!$r) {
        echo "<div>" . mysqli_error($dbc) . "</div>";
    }
}
mysqli_close($dbc);
include 'userstable.php';
