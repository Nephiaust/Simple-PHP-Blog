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


    //<a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
    // <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>

    echo '<nav class="blog-pagination" aria-label="Pagination">';

    if ($page > 1) {
        echo '<a class="btn btn-outline-primary rounded-pill" href="?page=1">Oldest</a>';
        $prevpage = $page - 1;
        echo '<a class="btn btn-outline-primary rounded-pill" href="?page=$prevpage">Older</a>';
    }

    $range = 5;
    for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
        if (($x > 0) && ($x <= $totalpages)) {
            if ($x == $page) {
                echo '<a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">'.$x.'</a>';
            } else {
                echo '<a class="btn btn-outline-primary rounded-pill" href="?page=$x">'.$x.'</a>';
            }
        }
    }

    if ($page != $totalpages) {
        $nextpage = $page + 1;
        echo '<a class="btn btn-outline-primary rounded-pill" href="?page=$nextpage">Newer</a>';
        echo '<a class="btn btn-outline-primary rounded-pill" href="?page=$totalpages">Newest</a>';
    }

    echo "</nav>";
}
print $tpl->render('body_bottom', array(
    'url_path' => $url_path
));

//include("categories.php");
include("footer.php");
