<?php
require('Db.php');
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
    
    // Check input errors before inserting in database
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err)) {
        
        // Prepare an insert statement
        // $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";
        $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($dbc, $sql)) {
            echo "into";
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_password, $param_first_name, $param_last_name);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            echo $param_email;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: users.php");
            } else {
                die( 'stmt error: '.mysqli_stmt_error($stmt) );
                echo "Something went wrong. Please try again later.";
            }
        } else {
            echo($stmt);
            die('mysqli error: '.mysqli_error($dbc));
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
<main role="main" class="container">
    <div class="starter-template">
    <div class="row mt-1" id="searchBookForm">
            <div class="col-6">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email:<sup>*</sup></label>
                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                <label>First name:<sup>*</sup></label>
                <input type="text" name="first_name"class="form-control" value="<?php echo $first_name; ?>">
                <span class="help-block"><?php echo $first_name_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <label>Last name:<sup>*</sup></label>
                <input type="text" name="last_name"class="form-control" value="<?php echo $last_name; ?>">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
        </div>
        </div>
    </div>    
</main>
</body>
</html>