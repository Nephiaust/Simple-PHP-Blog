<?php
require_once 'includes.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$rowsperpage = PAGINATION;                      // Store the configured PAGINATION option as a variable to use later.
$page = 1;                                      // Creates the page variable
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

$intFunctions->callHeader();
$DisplayName = htmlspecialchars($_SESSION['displayname']);        // Gets the current Display Name for the logged in user

// Display the top part of the admin page.
print $tpl->render('admin', array(
    'url_path' => SITE_URL,
    'displayname' => $DisplayName,
    'Admin_Header' => true
));

$sql = "SELECT COUNT(*) FROM posts";            // Get the number of posts available from the SQL server
$result = mysqli_query($dbcon, $sql);           // Requests the data from the SQL server
$r = mysqli_fetch_row($result);                 // Gets the first row from the SQL request

$numrows = $r[0];                               // How many posts do we have to work with?
$totalpages = ceil($numrows / $rowsperpage);    // Work out how many pages in total we have (rounded to the next integer)

// Checks if the request has the `page` set and is a number, so we can return that page.
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (int)filter_var($_GET['page'], FILTER_VALIDATE_INT, $ValidateInt);
}
// Just a check to make sure the requested page is lower than the total number of pages
if ($page > $totalpages) {
    $page = $totalpages;
}
// Just a check to make sure the requested page is 1 or more. We cant havent negative pages.
if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $rowsperpage;                                       // Used for the SQL request. Works out the starting from. E.G. If we have 10 posts per page, and are on page 3 we want to get posts from #20 to #30.
$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";  // Builds the SQL request to get the posts for the current page
$result = mysqli_query($dbcon, $sql);                                       // Requests the data from the SQL Server

// Check to see if we have some posts, if NOT display no posts; if YES then show them
if (mysqli_num_rows($result) < 1) {
    echo "No post found";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $slug = $row['slug'];
        $author = $row['posted_by'];
        $time = $row['date'];
        $permalink = "p/" . $id . "/" . $slug;

        print $tpl->render('admin', array(
            'url_path' => SITE_URL,
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'time' => $time,
            'permalink' => $permalink,
            'Admin_TablePost' => true
        ));
    }
}

// Finish the table off
print $tpl->render('admin', array(
    'url_path' => SITE_URL,
    'Admin_TableEnd' => true
));

// pagination
print $tpl->render('pagination', array(
    'url_path' => SITE_URL,
    'CurrentPage' => $page,
    'PageCount' => $totalpages,
    'ReferralPage' => 'admin'
));

print $tpl->render('admin', array(
    'url_path' => SITE_URL,
    'displayname' => $DisplayName,
    'Admin_End' => true
));

$intFunctions->callFooter();
