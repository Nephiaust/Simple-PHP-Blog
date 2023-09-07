<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">New Post</h3>
            <form class="needs-validation" novalidate method="POST">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Title</label>
                    <input type="text" class="form-control" id="Title" placeholder="" value="" name="title" required placeholder="Enter a catchy title">
                    <div class="invalid-feedback">
                        A valid title is required.
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Blog entry</label>
                    <textarea class="form-control" id="description" row="30" cols="50" name="description" required placeholder="Enter something to write about"></textarea>
                    <div class="invalid-feedback">
                        A valid blog entry is required.
                    </div>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary mb-3" name="submit" value="Post">Create new blog post</button>
                </div>
            </form>
        </div>
    </div>
</main>