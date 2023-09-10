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

$id = (int)$_GET['id'];
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
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $slug = slug(mysqli_real_escape_string($dbcon, $_POST['slug']));
    $permalink = "p/" . $id . "/" . $slug;

    $sql2 = "UPDATE posts SET title = '$title', description = '$description', slug = '$slug' WHERE id = $id";

    if (mysqli_query($dbcon, $sql2)) {
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        print $tpl->render('edit', array(
            'url_path' => $url_path,
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
    'url_path' => $url_path,
    'CurrentID' => $id,
    'Slug' => $slug,
    'Title' => $title,
    'Description' => $description,
    'permalink' => $permalink,
    'Edit' => true
));

mysqli_close($dbcon);
include("footer.php");
