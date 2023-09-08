<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h2 class="pb-4 mb-4 fst-bold border-bottom">Admin Panel</h2>
            <h3 class="pb-1 mb-1"><span class="fst-semibold">Weclome </span><span class="fst-italic"><?php echo $displayname; ?></span></h3>
            <a class="btn btn-primary" href="<?php echo $PageURL; ?>new.php" role="button">Create a new post</a>
        </div>
        <div class="col-md-auto">
            <h5 class="fst-bold border-bottom">Post management</h5>
            <table class="table table-dark table-hover table-striped">
                <thead>
                    <th scope="col">Post ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted by</th>
                    <th scope="col">Posted date</th>
                    <th scope="col">View Post</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
