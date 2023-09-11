<?php

if (!isset($url_path)) {
    die('invalid');
}

if (isset($Footer)) {
    echo '        <footer class="py-5 text-center text-body-secondary bg-body-tertiary">' . "\r\n";
    echo '            <p>Powered by Simple-PHP-Blog. Default template built by <a href="https://www.nephi.au">Nephi.AU</a>.</p>' . "\r\n";
    echo '            <p class="mb-0">' . "\r\n";
    echo '                <a href="#">Back to top</a>' . "\r\n";
    echo '            </p>' . "\r\n";
    echo '            <p>Copyright, all rights reserved | ' . date("Y") .'</p>' . "\r\n";
    echo '        </footer>' . "\r\n";
    echo '        <!-- jQuery 3.7.1 -->' . "\r\n";
    echo '        <script src="' . SITE_URL . 'js/jquery/jquery-3.7.1.min.js"></script>' . "\r\n";
    echo '        <!-- Bootstrap v5.3.1 -->' . "\r\n";
    echo '        <script src="' . SITE_URL . 'js/bootstrap/bootstrap.bundle.min.js"></script>' . "\r\n";
    echo '        <script src="'.SITE_URL.'js/bootstrap/color-modes.js"></script>' . "\r\n";
    echo '        <!-- Bootstrap Table v1.22.1 -->' . "\r\n";
    echo '        <script src="'.SITE_URL.'js/bootstrap-table/bootstrap-table.js"></script>' . "\r\n";
    echo '        <!-- <script src="'.SITE_URL.'js/bootstrap-table/bootstrap-table-locale-all.js"></script> -->' . "\r\n";
    echo '        <!-- Summernote v0.8.20 -->' . "\r\n";
    echo '        <script src="' . SITE_URL . 'js/summernote/summernote-lite.min.js"></script>' . "\r\n";
    echo '        <script>' . "\r\n";
    echo '            $(document).ready(function() {' . "\r\n";
    echo "                $('#summernote').summernote(" . "\r\n";
    echo "                    height: 300," . "\r\n";
    echo "                    spellCheck: true" . "\r\n";
    echo "                );" . "\r\n";
    echo '            });' . "\r\n";
    echo '        </script>' . "\r\n";
    echo '    </body>' . "\r\n";
    echo '</html>' . "\r\n";
}
