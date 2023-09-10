<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($Edit)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>' . "\r\n";
    echo '            <form class="needs-validation" novalidate method="POST">' . "\r\n";
    echo '                <div class="col-sm-8 mb-4">' . "\r\n";
    echo '                    <input type="hidden" name="id" value="' . $CurrentID . '">' . "\r\n";
    echo '                    <label for="title" class="form-label">Title</label>' . "\r\n";
    echo '                    <input type="text" class="form-control" id="title" value="' . $Title . '" name="title" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid title is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-auto mb-4">' . "\r\n";
    echo '                    <label for="slug" class="form-label">Slug (SEO URL)</label>' . "\r\n";
    echo '                    <input type="text" class="form-control" id="slug" value="' . $Slug . '" name="slug" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid Slug (SEO URL) is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-auto mb-4">' . "\r\n";
    echo '                    <label for="summernote" class="form-label">Blog entry</label>' . "\r\n";
    echo '                    <textarea class="form-control" style="height: 150px" name="description" required id="summernote">' . $Description . '</textarea>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid blog entry is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div>' . "\r\n";
    echo '                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">' . "\r\n";
    echo '                        <div class="modal-dialog">' . "\r\n";
    echo '                            <div class="modal-content">' . "\r\n";
    echo '                                <div class="modal-header">' . "\r\n";
    echo '                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>' . "\r\n";
    echo '                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n";
    echo '                                </div>' . "\r\n";
    echo '                                <div class="modal-body">Are you sure you want to delete this post?</div>' . "\r\n";
    echo '                                <div class="modal-footer">' . "\r\n";
    echo '                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>' . "\r\n";
    echo '                                    <a class="btn btn-danger" href="' . SITE_URL . 'del.php?id=' . $CurrentID . '" role="button">Yes, Delete</a>' . "\r\n";
    echo '                                </div>' . "\r\n";
    echo '                            </div>' . "\r\n";
    echo '                        </div>' . "\r\n";
    echo '                    </div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-6">' . "\r\n";
    echo '                    <button type="submit" class="btn btn-primary mb-3" name="update" value="Save post">Update blog post</button>' . "\r\n";
    echo '                    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </form>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($Edit_Failed)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">Edit Post</h3>' . "\r\n";
    echo '            <div class="alert alert-danger" role="alert">' . "\r\n";
    echo '                <p>Failed to create new blog post The error is below</p>' . "\r\n";
    echo '                <p>' . $ErrorMessage . '</p>' . "\r\n";
    echo '                <p><a href="' . SITE_URL . $permalink . '">Click here to reload the post</a></p>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}
