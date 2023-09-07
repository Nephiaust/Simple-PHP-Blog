<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">Login</h3>
            <form class="needs-validation" novalidate method="POST">
                <div class="col-sm-6 has-validation">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username here" required>
                    <div class="invalid-feedback">
                        A username is required.
                    </div>
                </div>
                <div class="col-sm-6 has-validation">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        A password is required.
                    </div>
                </div>
                <div class="col-sm-6 justify-content-md-end">
                    <button type="submit" class="btn btn-primary mb-3" name="login" value="Login">Login</button>
                </div>
            </form>
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (() => {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>
        </div>
    </div>
</main>