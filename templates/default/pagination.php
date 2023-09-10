<?php

if (!isset($url_path)) {
    die('invalid');
}

/*
   ** Sets up to enable/disable the first/last parts of the pagination nav bar
*/
if ($CurrentPage > 1) {
    $DisablePrevious = false;
} else {
    $DisablePrevious = true;
}
if ($CurrentPage !=  $PageCount) {
    $DisableNext = false;
} else {
    $DisableNext = true;
}
?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <?php
        // Outputs the required sections for the first/previous nav options.
        if ($DisablePrevious) {
            echo '       <li class="page-item disabled">' . "\r\n";
            echo '           <span class="page-link"><i class="fa-solid fa-angles-left"></i></span>' . "\r\n";
            echo '       </li>' . "\r\n";
            echo '       <li class="page-item disabled">' . "\r\n";
            echo '           <span class="page-link"><i class="fa-solid fa-angle-left"></i></span>' . "\r\n";
        } else {
            echo '       <li class="page-item">' . "\r\n";
            echo '            <a class="page-link" href="' . SITE_URL . $ReferralPage . '.php?page=1" aria-label="First"><i class="fa-solid fa-angles-left"></i></a>' . "\r\n";
            echo '       </li>' . "\r\n";
            echo '        <li class="page-item">' . "\r\n";
            echo '            <a class="page-link" href="' . SITE_URL . $ReferralPage . '.php?page=' . ($CurrentPage - 1) . '" aria-label="Previous">' . "\r\n";
            echo '                <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>' . "\r\n";
            echo '            </a>' . "\r\n";
        } ?>
        </li>

        <?php
        // Creates the page number nav buttons at the bottom of the page. Starts counting from the current page number minus 3 (skips any negative numbers AND any above the total page count)
        for ($PageI = ($CurrentPage - ShowPagination); $PageI < ($CurrentPage + ShowPagination) + 1; $PageI++) {
            if (($PageI > 0) && ($PageI <= $PageCount)) {
                if ($PageI == $CurrentPage) {
                    echo '        <li class="page-item"><a class="page-link active" aria-current="page" href="' . SITE_URL . $ReferralPage . '.php?page=' . $PageI . '">' . $PageI . '</a></li>' . "\r\n";
                } else {
                    echo '        <li class="page-item"><a class="page-link" href="' . SITE_URL . $ReferralPage . '.php?page=' . $PageI . '">' . $PageI . '</a></li>' . "\r\n";
                }
            }
        }

        // Outputs the required sections for the next/last nav options.
        if ($DisableNext) {
            echo '        <li class="page-item disabled">' . "\r\n";
            echo '            <span class="page-link"><i class="fa-solid fa-angle-right"></i></span>' . "\r\n";
            echo '        </li>' . "\r\n";
            echo '        <li class="page-item disabled">' . "\r\n";
            echo '            <span class="page-link"><i class="fa-solid fa-angles-right"></i></span>' . "\r\n";
        } else {
            echo '         <li class="page-item">' . "\r\n";
            echo '             <a class="page-link" href="' . SITE_URL . $ReferralPage . '.php?page=' . ($CurrentPage + 1) . '" aria-label="Next">' . "\r\n";
            echo '                 <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>' . "\r\n";
            echo '             </a>' . "\r\n";
            echo '        </li>' . "\r\n";
            echo '        <li class="page-item">' . "\r\n";
            echo '             <a class="page-link" href="' . SITE_URL . $ReferralPage . '.php?page=' . $PageCount . '" aria-label="Last"><i class="fa-solid fa-angles-right"></i></a>' . "\r\n";
        } ?>
        </li>
    </ul>
</nav>