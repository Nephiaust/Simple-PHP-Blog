<?php if (isset($SearchTop)) {
    echo '     <main class="container">' . "\r\n";
    echo '        <div class="row g-5">' . "\r\n";
    echo '            <div class="col-md-8">' . "\r\n";
    echo '                <h2 class="pb-4 mb-4 fst-bold border-bottom">Admin Panel</h2>' . "\r\n";
    echo '                <h3 class="pb-1 mb-1"><span class="fst-semibold">Weclome </span><span class="fst-italic"><?php echo $displayname; ?></span></h3>' . "\r\n";
    echo '                <a class="btn btn-primary" href="<?php echo $PageURL; ?>new.php" role="button">Create a new post</a>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '            <div class="col-md-auto">' . "\r\n";
    echo '                <h5 class="fst-bold border-bottom">Post management</h5>' . "\r\n";
    echo '                <table class="table table-dark table-hover table-striped">' . "\r\n";
    echo '                    <thead>' . "\r\n";
    echo '                        <th scope="col">Post ID</th>' . "\r\n";
    echo '                        <th scope="col">Title</th>' . "\r\n";
    echo '                        <th scope="col">Posted by</th>' . "\r\n";
    echo '                        <th scope="col">Posted date</th>' . "\r\n";
    echo '                        <th scope="col">View Post</th>' . "\r\n";
    echo '                    </thead>' . "\r\n";
    echo '                    <tbody>' . "\r\n";
}

if (isset($SearchPostList)) {
    echo '                        <tr>' . "\r\n";
    echo '                            <th scope="row"><?php echo $id; ?></th>' . "\r\n";
    echo '                            <td><?php echo $title; ?></td>' . "\r\n";
    echo '                            <td><?php echo $author; ?></td>' . "\r\n";
    echo '                            <td><?php echo $time; ?></td>' . "\r\n";
    echo '                            <td>' . "\r\n";
    echo '                                <a class="btn btn-link" href="<?php echo $url_path; echo $permalink; ?>" role="button">View post</a>' . "\r\n";
    echo '                            </td>' . "\r\n";
    echo '                        </tr>' . "\r\n";
}

if (isset($SearchPostListEnd)) {
    echo '                    </tbody>' . "\r\n";
    echo '                </table>' . "\r\n";
}

if (isset($SearchPostListEnd)) {
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '     </main>' . "\r\n";
}