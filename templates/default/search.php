<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($SearchTop)) {
    echo '     <main class="container">' . "\r\n";
    echo '        <div class="row g-5">' . "\r\n";
    echo '            <div class="col-md-12">' . "\r\n";
    echo '                <h5 class="fst-bold border-bottom">Posts found</h5>' . "\r\n";
    echo '                <table class="table table-dark table-hover table-striped" data-pagination="true" id="table" data-toggle="table">' . "\r\n";
    echo '                    <thead>' . "\r\n";
    echo '                        <th scope="col" class="align-middle" data-field="id" data-width="10" data-width-unit="%">Post ID</th>' . "\r\n";
    echo '                        <th scope="col" class="align-middle" data-field="Title" data-width="40" data-width-unit="%">Title</th>' . "\r\n";
    echo '                        <th scope="col" class="align-middle" data-field="ShortDescription" data-width="30" data-width-unit="%">Short Description</th>' . "\r\n";
    echo '                        <th scope="col" class="align-middle" data-field="author" data-width="10" data-width-unit="%">Posted by</th>' . "\r\n";
    echo '                        <th scope="col" class="align-middle" data-field="time" data-width="10" data-width-unit="%">Posted date</th>' . "\r\n";
    echo '                    </thead>' . "\r\n";
    echo '                    <tbody class="table-group-divider">' . "\r\n";
}

if (isset($SearchPostList)) {
    echo '                        <tr>' . "\r\n";
    echo '                            <th scope="row" class="text-end">' . $id . '</th>' . "\r\n";
    echo '                            <td><a class="link-offset-2 link-opacity-75-hover" href="' . $url_path . $permalink . '" role="button">' . $title . '</a></td>' . "\r\n";
    echo '                            <td>' . $ShortDescription . '</td>' . "\r\n";
    echo '                            <td>' . $author . '</td>' . "\r\n";
    echo '                            <td>' . $time . '</td>' . "\r\n";
    echo '                        </tr>' . "\r\n";
}

if (isset($SearchNothing)) {
    echo '                        <tr>' . "\r\n";
    echo '                            <td colspan="4">' . "\r\n";
    echo '                                <p class="alert alert-danger">Nothing found</p>' . "\r\n";
    echo '                             </td>' . "\r\n";
    echo '                        </tr>' . "\r\n";
}

if (isset($SearchBlank)) {
    echo '                        <tr>' . "\r\n";
    echo '                        </tr>' . "\r\n";
}

if (isset($SearchPostListEnd)) {
    echo '                    </tbody>' . "\r\n";
    echo '                </table>' . "\r\n";
}

if (isset($SearchEnd)) {
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '     </main>' . "\r\n";
}
