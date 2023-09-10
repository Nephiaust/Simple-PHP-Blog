<?php
require_once 'includes.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
}

$tpl = new Template('templates/' . TEMPALTE);   // Creates the tpl object so we can reuse it
$intFunctions = new internalFunctions;          // Creates the internalFunction object so we can call various functions (e.g. sending the header & footer)
$intFunctions->callHeader();                    // Call for the header

print $tpl->render('search', array(
  'url_path' => SITE_URL,
  'SearchTop' => true
));

if (isset($_GET['query'])) {
  $query = mysqli_real_escape_string($dbcon, $_GET['query']);

  $sql = "SELECT * FROM posts WHERE title LIKE '%{$query}%' OR description LIKE '%{$query}%'";
  $result = mysqli_query($dbcon, $sql);

  if (mysqli_num_rows($result) < 1) {
    print $tpl->render('search', array(
      'url_path' => SITE_URL,
      'SearchNothing' => true
    ));
    print $tpl->render('search', array(
      'url_path' => SITE_URL,
      'SearchPostListEnd' => true
    ));
  } else {

    while ($row = mysqli_fetch_assoc($result)) {

      $id = htmlentities($row['id']);
      $title = htmlentities($row['title']);
      $author = htmlentities($row['posted_by']);
      $des = htmlentities(strip_tags($row['description']));
      $slug = htmlentities(strip_tags($row['slug']));
      $time = htmlentities($row['date']);
      $permalink = "p/" . $id . "/" . $slug;

      print $tpl->render('search', array(
        'url_path' => SITE_URL,
        'SearchPostList' => true,
        'id' => $id,
        'title' => $title,
        'permalink' => $permalink,
        'author' => $author,
        'time' => $time,
        'ShortDescription' => substr($des, 0, 100)
      ));
    }

    print $tpl->render('search', array(
      'url_path' => SITE_URL,
      'SearchPostListEnd' => true
    ));
  }
} else {
  print $tpl->render('search', array(
    'url_path' => SITE_URL,
    'SearchBlank' => true
  ));
  print $tpl->render('search', array(
    'url_path' => SITE_URL,
    'SearchPostListEnd' => true
  ));
}

print $tpl->render('search', array(
  'url_path' => SITE_URL,
  'SearchEnd' => true
));

$intFunctions->callFooter();
