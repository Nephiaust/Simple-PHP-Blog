<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($Admin_Header)) {
    echo '<main class="container">' . "\r\n";
    echo '<div class="row g-5">' . "\r\n";
    echo '    <div class="col-md-8">' . "\r\n";
    echo '        <h2 class="pb-4 mb-4 fst-bold border-bottom">Admin Panel</h2>' . "\r\n";
    echo '        <h3 class="pb-1 mb-1"><span class="fst-semibold">Weclome </span><span class="fst-italic">' . $displayname . '</span></h3>' . "\r\n";
    echo '        <a class="btn btn-primary" href="' . SITE_URL . 'new.php" role="button">Create a new post</a>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '    <div class="col-md-auto">' . "\r\n";
    echo '        <h5 class="fst-bold border-bottom">Post management</h5>' . "\r\n";
    echo '        <table class="table table-dark table-hover table-striped">' . "\r\n";
    echo '            <thead>' . "\r\n";
    echo '                <th scope="col">Post ID</th>' . "\r\n";
    echo '                <th scope="col">Title</th>' . "\r\n";
    echo '                <th scope="col">Posted by</th>' . "\r\n";
    echo '                <th scope="col">Posted date</th>' . "\r\n";
    echo '                <th scope="col">View Post</th>' . "\r\n";
    echo '                <th scope="col">Action</th>' . "\r\n";
    echo '            </thead>' . "\r\n";
    echo '            <tbody>' . "\r\n";
}


if (isset($Admin_TablePost)) {
    echo '<tr>' . "\r\n";
    echo '    <th scope="row" class="text-end">' . $id . '</th>' . "\r\n";
    echo '    <td>' . $title . '</td>' . "\r\n";
    echo '    <td>' . $author . '</td>' . "\r\n";
    echo '    <td>' . $time . '</td>' . "\r\n";
    echo '    <td>' . "\r\n";
    echo '        <a class="btn btn-link" href="' . SITE_URL . $permalink . '" role="button">View post</a>' . "\r\n";
    echo '    </td>' . "\r\n";
    echo '    <td>' . "\r\n";
    echo '        <div class="modal fade" id="Modal' . $id . '" tabindex="-1" aria-labelledby="Modal' . $id . 'Label" aria-hidden="true">' . "\r\n";
    echo '            <div class="modal-dialog">' . "\r\n";
    echo '                <div class="modal-content">' . "\r\n";
    echo '                    <div class="modal-header">' . "\r\n";
    echo '                        <h1 class="modal-title fs-5" id="Modal' . $id . 'Label">Confirm Deletion</h1>' . "\r\n";
    echo '                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' . "\r\n";
    echo '                    </div>' . "\r\n";
    echo '                    <div class="modal-body">Are you sure you want to delete this post?</div>' . "\r\n";
    echo '                    <div class="modal-footer">' . "\r\n";
    echo '                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>' . "\r\n";
    echo '                        <a class="btn btn-danger" href="' . SITE_URL . 'del.php?id=' . $id . '" role="button">Yes, Delete</a>' . "\r\n";
    echo '                    </div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '        <a class="btn btn-primary btn-sm" href="' . SITE_URL . 'edit.php?id=' . $id . '" role="button">Edit</a>' . "\r\n";
    echo '        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal' . $id . '">Delete</button>' . "\r\n";
    echo '    </td>' . "\r\n";
    echo '</tr>' . "\r\n";
}

if (isset($Admin_TableEnd)) {
    echo '</tbody>' . "\r\n";
    echo '</table>' . "\r\n";
}

if (isset($Admin_End)) {
    echo '                </div>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </main>' . "\r\n";
}
