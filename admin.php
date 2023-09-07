<?php
require_once 'includes.php';
require_once 'header.php';
require_once 'functions/security.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$DisplayName = $_SESSION['displayname'];

$tpl = new Template('templates/' . TEMPALTE);

print $tpl->render('admin-top', array(
    'displayname' => $DisplayName,
    'url_path' => $url_path
));

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
    echo "No post found";
}

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $slug = $row['slug'];
    $author = $row['posted_by'];
    $time = $row['date'];
    $permalink = "p/" . $id . "/" . $slug;

    print $tpl->render('admin-middle', array(
        'id' => $id,
        'title' => $title,
        'author' => $author,
        'time' => $time,
        'permalink' => $permalink,
        'url_path' => $url_path
    ));
}
print $tpl->render('admin-middle2', array(
    'url_path' => $url_path
));

// pagination
echo "\n";
echo "<div class='col-md-auto'>";
if ($page > 1) {
    echo "<a href='?page=1' class='btn btn-link'>&laquo;&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='btn btn-link'>&laquo;</a>";
}
$range = 3;
for ($i = ($page - $range); $i < ($page + $range) + 1; $i++) {
    if (($i > 0) && ($i <= $totalpages)) {
        if ($i == $page) {
            echo "<div class='btn btn-link'> $i</div>";
        } else {
            echo "<a href='?page=$i' class='btn btn-link'>$i</a>";
        }
    }
}
if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='btn btn-link'>&raquo;</a>";
    echo "<a href='?page=$totalpages' class='btn btn-link'>&raquo;&raquo;</a>";
}
echo "</div>";
echo "\n";

print $tpl->render('admin-bottom', array(
    'displayname' => $DisplayName,
    'url_path' => $url_path
));

include("footer.php");
