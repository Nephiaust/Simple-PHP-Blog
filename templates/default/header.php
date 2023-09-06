<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>PHP Blog</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" />

        <!-- Bootstrap v5.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom CSS -->
        <link href="css/mycustom.css" rel="stylesheet" />
    </head>

    <body>
        <header class="w3-container w3-teal">
            <h1>PHP Blog</h1>
        </header>

        <div class="w3-bar w3-border">
            <a href="<?php echo $url_path;?>" class="w3-bar-item w3-button w3-pale-green">Home</a>
            <?php
            if (isset($_SESSION['userid'])) {
                echo "<a href='" . $url_path . "new.php' class='w3-bar-item w3-btn'>New Post</a>";
                echo "<a href='" . $url_path . "admin.php' class='w3-bar-item w3-btn'>Admin Panel</a>";
                echo "<a href='" . $url_path . "logout.php' class='w3-bar-item w3-btn'>Logout</a>";
            } else {
                echo "<a href='" . $url_path . "login.php' class='w3-bar-item w3-pale-red' >Login</a>";
            }
            ?>
        </div>

        <div class="w3-container">
            <form action="{{url_path}}search.php" method="GET" class="w3-container">
                <p>
                    <input type="text" name="q" class="w3-input w3-border" placeholder="Search for anything" required />
                </p>
                <p>
                    <input type="submit" class="w3-btn w3-teal w3-round" value="Search" />
                </p>
            </form>
        </div>
