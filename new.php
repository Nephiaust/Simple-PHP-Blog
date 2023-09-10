<?php
require_once 'includes.php';
require_once 'header.php';
require_once 'functions/security.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);

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
        'url_path' => $url_path,
        'permalink' => $permalink,
        'NewPostSuccessful' => $true
    ));
} else {
    print $tpl->render('post_new', array(
        'NewPost' => $true
    ));
}

include("footer.php");
