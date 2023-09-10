<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($Login)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">Login</h3>' . "\r\n";
    echo '            <form class="needs-validation" novalidate method="POST">' . "\r\n";
    echo '                <div class="col-sm-6 has-validation pb-1 mb-1">' . "\r\n";
    echo '                    <label for="username" class="form-label">Username</label>' . "\r\n";
    echo '                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username here" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A username is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-6 has-validation pb-2 mb-2">' . "\r\n";
    echo '                    <label for="password" class="form-label">Password</label>' . "\r\n";
    echo '                    <input type="password" id="password" name="password" class="form-control" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A password is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-6 justify-content-md-end">' . "\r\n";
    echo '                    <button type="submit" class="btn btn-primary mb-3" name="login" value="Login">Login</button>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </form>' . "\r\n";
    echo '            <script>' . "\r\n";
    echo '                (() => {' . "\r\n";
    echo "                    'use strict'" . "\r\n";
    echo "                    const forms = document.querySelectorAll('.needs-validation')" . "\r\n";
    echo '                    Array.from(forms).forEach(form => {' . "\r\n";
    echo "                        form.addEventListener('submit', event => {" . "\r\n";
    echo '                            if (!form.checkValidity()) {' . "\r\n";
    echo '                                event.preventDefault()' . "\r\n";
    echo '                                event.stopPropagation()' . "\r\n";
    echo '                            }' . "\r\n";
    echo "                            form.classList.add('was-validated')" . "\r\n";
    echo '                        }, false)' . "\r\n";
    echo '                    })' . "\r\n";
    echo '                })()' . "\r\n";
    echo '            </script>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($LoginFailed)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <h3 class="pb-4 mb-4 fst-italic border-bottom">Login</h3>' . "\r\n";
    echo '            <form class="needs-validation" novalidate method="POST">' . "\r\n";
    echo '                <div class="col-sm-6 has-validation pb-1 mb-1">' . "\r\n";
    echo '                    <label for="username" class="form-label">Username</label>' . "\r\n";
    echo '                    <input type="text" class="form-control is-invalid" id="username" name="username" placeholder="Enter your username here" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid username is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-6 has-validation pb-2 mb-2">' . "\r\n";
    echo '                    <label for="password" class="form-label">Password</label>' . "\r\n";
    echo '                    <input type="password" id="password" name="password" class="form-control is-invalid" required>' . "\r\n";
    echo '                    <div class="invalid-feedback">A valid password is required.</div>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '                <div class="col-sm-6 justify-content-md-end">' . "\r\n";
    echo '                    <button type="submit" class="btn btn-primary mb-3" name="login" value="Login">Login</button>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </form>' . "\r\n";
    echo '            <script>' . "\r\n";
    echo '                (() => {' . "\r\n";
    echo "                    'use strict'" . "\r\n";
    echo "                    const forms = document.querySelectorAll('.needs-validation')" . "\r\n";
    echo '                    Array.from(forms).forEach(form => {' . "\r\n";
    echo "                        form.addEventListener('submit', event => {" . "\r\n";
    echo '                            if (!form.checkValidity()) {' . "\r\n";
    echo '                                event.preventDefault()' . "\r\n";
    echo '                                event.stopPropagation()' . "\r\n";
    echo '                            }' . "\r\n";
    echo "                            form.classList.add('was-validated')" . "\r\n";
    echo '                        }, false)' . "\r\n";
    echo '                    })' . "\r\n";
    echo '                })()' . "\r\n";
    echo '            </script>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}

if (isset($Login_Required)) {
    echo '<main class="container">' . "\r\n";
    echo '    <div class="row g-5">' . "\r\n";
    echo '        <div class="col-md-8">' . "\r\n";
    echo '            <div class="alert alert-danger" role="alert">' . "\r\n";
    echo '                Error, Restricted page. Please login. Redirecting to login page in 2 seconds' . "\r\n";
    echo '                <div class="spinner-border text-secondary" role="status">' . "\r\n";
    echo '                    <span class="visually-hidden">Loading new login page...</span>' . "\r\n";
    echo '                </div>' . "\r\n";
    echo '            </div>' . "\r\n";
    echo '        </div>' . "\r\n";
    echo '    </div>' . "\r\n";
    echo '</main>' . "\r\n";
}