<?php

require_once 'includes.php';

$tpl = new Template('templates/' . TEMPALTE);

print $tpl->render('header', array(
    'url_path' => $url_path
));
if (isset($_SESSION['userid'])) {
    print $tpl->render('header_auth', array(
        'url_path' => $url_path
    ));
} else {
    print $tpl->render('header_noauth', array(
        'url_path' => $url_path
    ));
}