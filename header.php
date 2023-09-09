<?php

require_once 'includes.php';

$tpl = new Template('templates/' . TEMPALTE);

print $tpl->render('header', array(
    'url_path' => $url_path,
    'HeaderTop' => true
));
if (isset($_SESSION['userid'])) {
    print $tpl->render('header', array(
        'url_path' => $url_path,
        'HeaderAuth' => true
    ));
} else {
    print $tpl->render('header', array(
        'url_path' => $url_path,
        'HeaderNoAuth' => true
    ));
}