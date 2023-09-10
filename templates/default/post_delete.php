<?php

if (isset($NewPost)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic">Deleting Post...</h3>' . "\r\n";
    echo '            <div class="alert alert-success" role="alert">' . "\r\n";
    echo '                Deleted blog post successfully!' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($DeletePostFailed)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic">Deleting Post...</h3>' . "\r\n";
    echo '            <div class="alert alert-danger" role="alert">' . "\r\n";
    if (isset($ErrorMessage)) {
        echo "                <p>Failed to deleted blog post! The error is below</p>" . "\r\n";
        echo "                <p>" . $ErrorMessage . "</p>" . "\r\n";
    } else {
        echo "                Failed to delete blog post, is it deleted already?" . "\r\n";
    }
    echo '                </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}
