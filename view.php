<?php
require_once 'includes.php';
require_once 'header.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$id = (int)$_GET['id'];
if ($id < 1) {
    header("location: $url_path");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: $url_path");
}

$tpl = new Template('templates/' . TEMPALTE);

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$contents = $row['description'];
$createdby = $row['posted_by'];
$time = $row['date'];


print $tpl->render('post_view', array(
    'title' => $title,
    'createdby' => $createdby,
    'permalink' => $permalink,
    'time' => $time,
    'contents' => $contents,
    'url_path' => $url_path
));

include("footer.php");
