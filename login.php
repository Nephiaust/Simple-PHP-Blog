<?php
require_once 'includes.php';
require_once 'header.php';

// Set a temporary variable to track if there is a login error (e.g. username / password mismatch or missing in the login request.)
$login_error = false;

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);

// Lets check to see if the call was a HTTP POST request
//    If it is, display the admin page
//    If it is NOT, display the login page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Now to check if the username field is not empty, otherwise throw an error.
    if (empty(trim($_POST["username"]))) {
        $login_error = true;
    } else {
        // We have data for a username, now lets save it in a SQL safe string (e.g. automatically add escape characters, etc.)
        $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    }

    // Do the same for the password field.
    if (empty(trim($_POST["password"]))) {
        $login_error = true;
    } else {
        // And again save the password in a SQL safe string
        $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    }

    if ($login_error) {
        print $tpl->render('login-failed', array(
            'url_path' => $url_path
        ));
    } else {

        // Build the SQL statement to get the user details (so we can then verify the user exists AND that the password is valid)
        $sql = "SELECT `id`, `username`, `password`, `displayname` FROM users WHERE username = '$username'";

        // Request the data from the SQL server, process it AND count the number of rows.
        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_assoc($result);
        $row_count = mysqli_num_rows($result);

        // Check that the user only exists once in the SQL database AND that the password is matching.
        if ($row_count == 1 && password_verify($password, $row['password'])) {
            // This part we store some information in the PHP session information, so we can use it as a later time (e.g. the user ID)
            $_SESSION['displayname'] = $row['displayname'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION["loggedin"] = true;

            // Now we redirect the user to the admin portal.
            header("location: admin.php");
        } else {
            print $tpl->render('login-failed', array(
                'url_path' => $url_path
            ));
        }
    }
} else {
    print $tpl->render('login', array(
        'url_path' => $url_path
    ));
}

include("footer.php");
