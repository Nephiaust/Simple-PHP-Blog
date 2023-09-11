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

$id = (int)filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($id < 1) {
    header("location: " . SITE_URL);
}

$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: " . SITE_URL);
}

$intFunctions->callHeader();                    // Call for the header

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$postid = $row['id'];
$title = $row['title'];
$contents = $row['description'];
$createdby = $row['posted_by'];
$time = $row['date'];
$slug = $row['slug'];
$permalink = "p/" . $postid . "/" . $slug;

print $tpl->render('post_view', array(
    'url_path' => SITE_URL,
    'title' => $title,
    'createdby' => $createdby,
    'permalink' => $permalink,
    'time' => $time,
    'contents' => $contents,
    'ViewPost' => true
));

$intFunctions->callFooter();
