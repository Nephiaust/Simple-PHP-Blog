<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic">Deleting Post...</h3>
            <div class="alert alert-danger" role="alert">
                <?php if (isset($ErrorMessage)) {
                    echo "                <p>Failed to deleted blog post! The error is below</p>" . "\r\n";
                    echo "                <p>".$ErrorMessage."</p>" . "\r\n";
                } else {
                    echo "                Failed to delete blog post, is it deleted already?" . "\r\n";
                } ?>
            </div>
        </div>
    </div>
</main>