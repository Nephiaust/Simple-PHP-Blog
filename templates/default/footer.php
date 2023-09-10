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
    echo '        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>' . "\r\n";
    echo '        <!-- Bootstrap v5.3.1 -->' . "\r\n";
    echo '        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>' . "\r\n";
    echo '        <script src="'.SITE_URL.'js/color-modes.js"></script>' . "\r\n";
    echo '        <!-- Bootstrap Table v1.22.1 -->' . "\r\n";
    echo '        <script src="'.SITE_URL.'js/bootstrap-table.js"></script>' . "\r\n";
    echo '        <!-- <script src="'.SITE_URL.'js/bootstrap-table-locale-all.js"></script> -->' . "\r\n";
    echo '        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>' . "\r\n";
    echo '    </body>' . "\r\n";
    echo '</html>' . "\r\n";
}
