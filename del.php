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

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    //$RowDeleted = mysqli_affected_rows($dbcon);

    if ($result) {
        if (mysqli_affected_rows($dbcon) > 0){
            print $tpl->render('post_delete', array(
                'url_path' => $url_path
            ));
        } else {
            print $tpl->render('post_delete', array(
                'url_path' => $url_path,
                'DeletePostFailed' => true
            ));
        }
    } else {
        print $tpl->render('post_delete', array(
            'url_path' => $url_path,
            'DeletePostFailed' => true,
            'ErrorMessage' => mysqli_connect_error()
        ));
    }
}
mysqli_close($dbcon);
