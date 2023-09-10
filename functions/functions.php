<?php

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// Get the current working directory, so we have the base of the installation
define('SITE_DIR', getcwd()); 

// Set the base URL path
if (!empty(SITE_ROOT)) {
    Define ("SITE_URL", "/" . SITE_ROOT . "/");
} else {
    Define ("SITE_URL", "/");
}


function replace_accents($str)
{
    $str = htmlentities($str, ENT_COMPAT, "UTF-8");
    $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $str);
    return html_entity_decode($str);
}

// Creates a SLUG based on the title.
function slug($string)
{
    $slug = trim($string); // trim the string
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = strtolower(replace_accents($slug));
    $slug = substr($slug, 0, 100);
    return $slug;
}

// A simple check to see if user is logged in.
function checkedLoggedIn()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['username'])) {
        return true;
    }
}
