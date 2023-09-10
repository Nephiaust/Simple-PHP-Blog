<?php
require_once 'config.php';
require_once 'functions/functions.php';
require_once 'functions/classes.php';
require_once 'functions/connect.php';

// Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
