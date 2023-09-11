<?php
require_once 'includes.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);   // Creates the tpl object so we can reuse it
$intFunctions = new internalFunctions;          // Creates the internalFunction object so we can call various functions (e.g. sending the header & footer)
$ValidateInt = array(                           // Sets an option for the FILTER_VALIDATE_INT to allow anything above 0 and is an INT
    'options' => array(
        'min_range' => 0,
    )
);

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

$id = (int)filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($id < 1) {
    header("location: index.php");
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$slug = $row['slug'];
$permalink = "p/" . $id . "/" . $slug;

if (isset($_POST['update'])) {
    $id = (int)filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $slug = slug(mysqli_real_escape_string($dbcon, $_POST['slug']));
    $permalink = "p/" . $id . "/" . $slug;

    $sql2 = "UPDATE posts SET title = '$title', description = '$description', slug = '$slug' WHERE id = $id";

    if (mysqli_query($dbcon, $sql2)) {
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        print $tpl->render('edit', array(
            'url_path' => SITE_URL,
            'CurrentID' => $id,
            'Slug' => $slug,
            'Title' => $title,
            'Description' => $description,
            'permalink' => $permalink,
            'ErrorMessage' => mysqli_connect_error(),
            'Edit_Failed' => true
        ));
    }
}


print $tpl->render('edit', array(
    'url_path' => SITE_URL,
    'CurrentID' => $id,
    'Slug' => $slug,
    'Title' => $title,
    'Description' => $description,
    'permalink' => $permalink,
    'Edit' => true
));

mysqli_close($dbcon);
$intFunctions->callFooter();
