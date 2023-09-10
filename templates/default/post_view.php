<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($ViewPost)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <article class="blog-post">' . "\r\n";
    echo '                <h2 class="display-5 link-body-emphasis mb-1">' . $title . '</h2>' . "\r\n";
    echo '                <p class="blog-post-meta">' . $time . 'by ' . $createdby . '</p>' . "\r\n";
    echo '                <p>' . $contents . '</p>' . "\r\n";
    echo '            </article>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}
