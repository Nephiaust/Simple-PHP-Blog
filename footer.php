<?php
require_once 'includes.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);   // Creates the tpl object so we can reuse it

// Display the top part of the admin page.
print $tpl->render('footer', array(
    'url_path' => $url_path,
    'Footer' => true
));