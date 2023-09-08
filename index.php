<?php
require_once 'includes.php';
require 'header.php';


# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);

print $tpl->render('body', array(
    'url_path' => $url_path
));

// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (int)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    print $tpl->render('body_post-empty', array(
        'url_path' => $url_path
    ));
} else {
    while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
        $des = htmlentities(strip_tags($row['description']));
        $shortDesc = substr($des, 0, 100);
        $slug = htmlentities($row['slug']);
        $time = htmlentities($row['date']);
        $createdby = htmlentities($row['posted_by']);

        $permalink = "p/" . $id . "/" . $slug;
        print $tpl->render('body_post', array(
            'title' => $title,
            'createdby' => $createdby,
            'permalink' => $permalink,
            'time' => $time,
            'shortDesc' => $shortDesc,
            'url_path' => $url_path
        ));
    }

    // pagination
    print $tpl->render('pagination', array(
        'CurrentPage' => $page,
        'PageCount' => $totalpages,
        'ReferralPage' => 'index'
    ));
}
print $tpl->render('body_bottom', array(
    'url_path' => $url_path
));

//include("categories.php");
include("footer.php");
