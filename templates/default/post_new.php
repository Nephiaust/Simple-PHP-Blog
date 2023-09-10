<?php

if (isset($NewPost)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>' . "\r\n";
    echo '            <form class="needs-validation" novalidate method="POST">' . "\r\n";
    echo '                <div class="col-sm-8 mb-4">' . "\r\n";
    echo '                    <label for="firstName" class="form-label">Title</label>' . "\r\n";
    echo '                    <input type="text" class="form-control" id="Title" value="" name="title" required placeholder="Enter a catchy title">' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid title is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-auto mb-4">' . "\r\n";
    echo '                    <label for="firstName" class="form-label">Blog entry</label>' . "\r\n";
    echo '                    <textarea class="form-control" id="description" style="height: 150px" name="description" required placeholder="Enter something to write about"></textarea>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid blog entry is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div></div>' . "\r\n";
    echo '                <div class="col-sm-6">' . "\r\n";
    echo '                    <button type="submit" class="btn btn-primary mb-3" name="submit" value="Post">Create new blog post</button>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </form>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($NewPostSuccessful)) {
    echo '<meta http-equiv="refresh" content="2"; url="' . $url_path . $permalink . '" />"' . "\r\n";
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>' . "\r\n";
    echo '            <div class="alert alert-success" role="alert">' . "\r\n";
    echo '                Created new blog post successfully! Redirecting in 2 seconds' . "\r\n";
    echo '                <div class="spinner-border text-primary" role="status">' . "\r\n";
    echo '                    <span class="visually-hidden">Loading new post...</span>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($NewPostFailed)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>' . "\r\n";
    echo '            <div class="alert alert-danger" role="alert">' . "\r\n";
    echo '                <p>Failed to create new blog post The error is below</p>' . "\r\n";
    echo "                <p>" . $ErrorMessage . "</p>" . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}
