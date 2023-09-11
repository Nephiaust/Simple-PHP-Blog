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

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int)filter_var($_GET['id'], FILTER_VALIDATE_INT, $ValidateInt));
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    //$RowDeleted = mysqli_affected_rows($dbcon);

    if ($result) {
        if (mysqli_affected_rows($dbcon) > 0){
            print $tpl->render('post_delete', array(
                'url_path' => SITE_URL
            ));
        } else {
            print $tpl->render('post_delete', array(
                'url_path' => SITE_URL,
                'DeletePostFailed' => true
            ));
        }
    } else {
        print $tpl->render('post_delete', array(
            'url_path' => SITE_URL,
            'DeletePostFailed' => true,
            'ErrorMessage' => mysqli_connect_error()
        ));
    }
}
mysqli_close($dbcon);
