<?php
require_once 'config.php';
require_once 'functions/functions.php';
require_once 'functions/connect.php';

// Get the current working directory, so we have the base of the installation
define('SITE_DIR', getcwd()); 

// Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// Set the base URL path
if (!empty(SITE_ROOT)) {
    $url_path = "/" . SITE_ROOT . "/";
} else {
    $url_path = "/";
}

