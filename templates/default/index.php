<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($Index_Head)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">From my blog</h3>' . "\r\n";
}

if (isset($Index_Post)) {
    echo '<article class="blog-post">' . "\r\n";
    echo '    <h2 class="display-5 link-body-emphasis mb-1">' . $title . '</h2>' . "\r\n";
    echo '    <p class="blog-post-meta">' . $time . ' by ' . $createdby . '</p>' . "\r\n";
    echo '    <p>' . $shortDesc . '</p>' . "\r\n";
    echo '    <a href="' . $permalink . '" class="icon-link gap-1 icon-link-hover">Continue reading</a>' . "\r\n";
    echo '</article>' . "\r\n";
    echo '<hr />' . "\r\n";
}

if (isset($Index_Empty)) {
    echo '<article class="blog-post">' . "\r\n";
    echo '<h2 class="display-5 link-body-emphasis mb-1">No post yet!</h2>' . "\r\n";
    echo '<p class="blog-post-meta">January 1, 1900 by <a href="' . SITE_URL . '">Admin</a></p>' . "\r\n";
    echo '<p>You need to post something.</p>' . "\r\n";
    echo '</article>' . "\r\n";
}

if (isset($Index_Bottom)) {
    echo '</div>' . "\r\n";
    echo '<div class="col-md-4">' . "\r\n";
    echo '    <div class="position-sticky" style="top: 2rem">' . "\r\n";
    echo '        <div class="p-4 mb-3 bg-body-tertiary rounded">' . "\r\n";
    echo '            <h4 class="fst-italic">About</h4>' . "\r\n";
    echo '            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '        <div>' . "\r\n";
    echo '            <h4 class="fst-italic">Recent posts</h4>' . "\r\n";
    echo '            <ul class="list-unstyled">' . "\r\n";
    echo '                <li>' . "\r\n";
    echo '                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">' . "\r\n";
    echo '                        <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">' . "\r\n";
    echo '                            <rect width="100%" height="100%" fill="#777" />' . "\r\n";
    echo '                        </svg>' . "\r\n";
    echo '                        <div class="col-lg-8">' . "\r\n";
    echo '                            <h6 class="mb-0">Example blog post title</h6>' . "\r\n";
    echo '                            <small class="text-body-secondary">January 15, 2023</small>' . "\r\n";
    echo '                        </div>' . "\r\n";
    echo '                    </a>' . "\r\n";
    echo '                </li>' . "\r\n";
    echo '            </ul>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '        <div class="p-4">' . "\r\n";
    echo '            <h4 class="fst-italic">Archives</h4>' . "\r\n";
    echo '            <ol class="list-unstyled mb-0">' . "\r\n";
    echo '                <li><a href="#">March 2021</a></li>' . "\r\n";
    echo '            </ol>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</div>' . "\r\n";
    echo '</div>' . "\r\n";
    echo '</main>' . "\r\n";
}
