<?php
require_once 'includes.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);   // Creates the tpl object so we can reuse it
$intFunctions = new internalFunctions;          // Creates the internalFunction object so we can call various functions (e.g. sending the header & footer)

// Check if the user is logged in
if (!checkedLoggedIn()){
    $intFunctions->callHeader(2,SITE_URL . 'login.php');
    print $tpl->render('login', array(
        'url_path' => SITE_URL,
        'Login_Required' => true
    ));
    $intFunctions->callFooter();
    die();
}

$intFunctions->callHeader();                    // Call for the header

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $slug = slug($title);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

    $sql = "INSERT INTO posts (title, description, slug,posted_by, date) VALUES('$title', '$description', '$slug', '$posted_by', '$date')";
    mysqli_query($dbcon, $sql) or die(print $tpl->render('post_new', array('ErrorMessage' => mysqli_connect_error(), 'NewPostFailed' => $true)));

    $permalink = "p/" . mysqli_insert_id($dbcon) . "/" . $slug;

    print $tpl->render('post_new', array(
        'url_path' => SITE_URL,
        'permalink' => $permalink,
        'NewPostSuccessful' => $true
    ));
} else {
    print $tpl->render('post_new', array(
        'url_path' => SITE_URL,
        'NewPost' => $true
    ));
}

$intFunctions->callFooter();
