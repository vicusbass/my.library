<?php
require('../config/Db.php');
$email = $password = $confirm_password = $first_name = $last_name = "";
$email_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($dbc, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = 'Please confirm password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password != $confirm_password) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = 'Please add first name.';
    } else {
        $first_name = trim($_POST['first_name']);
    }

    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = 'Please add last name.';
    } else {
        $last_name = trim($_POST['last_name']);
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($dbc, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_password, $param_first_name, $param_last_name);

            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_first_name = $first_name;
            $param_last_name = $last_name;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                die('stmt error: ' . mysqli_stmt_error($stmt));
            }
        } else {
            die('mysqli error: ' . mysqli_error($dbc));
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<div class="container">
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 class="form-signin-heading">Please fill in your new account details</h2>
        <div class="form-group">
            <label>Email:<sup>*</sup></label>
            <input type="text" name="email"
                   class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $email; ?>">
            <div class="invalid-feedback"><?php echo $email_err; ?></div>
        </div>
        <div class="form-group">
            <label>First name:<sup>*</sup></label>
            <input type="text" name="first_name"
                   class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $first_name; ?>">
            <div class="invalid-feedback"><?php echo $first_name_err; ?></div>
        </div>
        <div class="form-group">
            <label>Last name:<sup>*</sup></label>
            <input type="text" name="last_name"
                   class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $last_name; ?>">
            <div class="invalid-feedback"><?php echo $last_name_err; ?></div>
        </div>
        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password"
                   class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $password; ?>">
            <div class="invalid-feedback"><?php echo $password_err; ?></div>
        </div>
        <div class="form-group">
            <label>Confirm Password:<sup>*</sup></label>
            <input type="password" name="confirm_password"
                   class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $confirm_password; ?>">
            <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>