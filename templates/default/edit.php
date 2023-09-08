<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>
            <form class="needs-validation" novalidate method="POST">
                <div class="col-sm-8 mb-4">
                    <input type="hidden" name="id" value="<?php echo $CurrentID; ?>">
                    <label for="firstName" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" value="<?php echo $Title; ?>" name="title" required>
                    <div class="invalid-feedback">
                        A valid title is required.
                    </div>
                </div>
                <div class="col-sm-auto mb-4">
                    <label for="firstName" class="form-label">Slug (SEO URL)</label>
                    <input type="text" class="form-control" id="slug" value="<?php echo $Slug; ?>" name="slug" required>
                    <div class="invalid-feedback">
                        A valid Slug (SEO URL) is required.
                    </div>
                </div>
                <div class="col-sm-auto mb-4">
                    <label for="firstName" class="form-label">Blog entry</label>
                    <textarea class="form-control" id="description" style="height: 150px" name="description" required><?php echo $Description; ?></textarea>
                    <div class="invalid-feedback">
                        A valid blog entry is required.
                    </div>
                </div>
                <div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this post?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                    <a class="btn btn-danger" href="<?php echo $url_path; ?>del.php?id=<?php echo $id; ?>" role="button">Yes, Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary mb-3" name="update" value="Save post">Update blog post</button>
                    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                </div>
            </form>
        </div>
    </div>
</main>