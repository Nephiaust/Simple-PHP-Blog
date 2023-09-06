<?php

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

function replace_accents($str)
{
    $str = htmlentities($str, ENT_COMPAT, "UTF-8");
    $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $str);
    return html_entity_decode($str);
}

function slug($string)
{
    $slug = trim($string); // trim the string
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = strtolower(replace_accents($slug));
    $slug = substr($slug, 0, 100);
    return $slug;
}

/* function get_posts($rowsperpage, $edit = false)
{
    $tpl = new Template('templates/' . TEMPALTE);
    // COUNT
    $sql = "SELECT COUNT(*) FROM posts";
    $result = mysqli_query($dbcon, $sql);
    $r = mysqli_fetch_row($result);
    $numrows = $r[0];
    $totalpages = ceil($numrows / $rowsperpage);

    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
    }

    if ($page > $totalpages) {
        $page = $totalpages;
    }

    if ($page < 1) {
        $page = 1;
    }
    $offset = ($page - 1) * $rowsperpage;

    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
    $result = mysqli_query($dbcon, $sql);


    if (mysqli_num_rows($result) < 1) {
        $tpl = new Template('templates/' . TEMPALTE);
        print $tpl->render('body_post-emtpy', array(
            'url_path' => $url_path
        ));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

            $id = htmlentities($row['id']);
            $title = htmlentities($row['title']);
            $des = htmlentities(strip_tags($row['description']));
            $shortDesc = substr($des, 0, 100);
            $slug = htmlentities($row['slug']);
            $time = htmlentities($row['date']);
            $createdby = htmlentities($row['posted_by']);

            $permalink = "p/" . $id . "/" . $slug;
            print $tpl->render('body_post', array(
                'title' => $title,
                'createdby' => $createdby,
                'time' => $time,
                'shortDesc' => $shortDesc
            ));
        }


        //<a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
        // <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>

        echo '<nav class="blog-pagination" aria-label="Pagination">';

        if ($page > 1) {
            echo "<a href='?page=1'>&laquo;</a>";
            $prevpage = $page - 1;
            echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
        }

        $range = 5;
        for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
            if (($x > 0) && ($x <= $totalpages)) {
                if ($x == $page) {
                    echo "<div class='w3-teal w3-button'>$x</div>";
                } else {
                    echo "<a href='?page=$x' class='w3-button w3-border'>$x</a>";
                }
            }
        }

        if ($page != $totalpages) {
            $nextpage = $page + 1;
            echo "<a href='?page=$nextpage' class='w3-button'>></a>";
            echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
        }

        echo " </nav>";
    }
} */

/*
    Class Template - a very simple PHP class for rendering PHP templates
    https://dev-daglab.pantheonsite.io/simple-php-template-class/
 */
class Template
{
    // Location of expected template
    public $folder;

    // Template constructor.
    function __construct($folder = null)
    {
        if ($folder) {
            $this->set_folder($folder);
        }
    }

    // Simple method for updating the base folder where templates are located.
    function set_folder($folder)
    {
        // normalize the internal folder value by removing any final slashes
        $this->folder = rtrim($folder, '/');
    }

    // Find and attempt to render a template with variables
    function render($suggestions, $variables = array())
    {
        // Make sure we have a folder path, perhaps we should also check so the folder is readable?
        if (!$this->folder || !is_dir($this->folder)) {
            throw new Exception('You need to set the base folder for all templates using set_folder().');
        }
        $template = $this->find_template($suggestions);
        $output = '';
        if ($template) {
            $output = $this->render_template($template, $variables);
        }
        return $output;
    }

    // Look for the first template suggestion
    function find_template($suggestions)
    {
        if (!is_array($suggestions)) {
            $suggestions = array($suggestions);
        }
        $suggestions = array_reverse($suggestions);
        $found = false;
        foreach ($suggestions as $suggestion) {
            $file = "{$this->folder}/{$suggestion}.php";
            if (file_exists($file)) {
                $found = $file;
                break;
            }
        }
        return $found;
    }

    // Execute the template by extracting the variables into scope, and including the template file.
    function render_template( /*$template, $variables*/)
    {
        ob_start();
        foreach (func_get_args()[1] as $key => $value) {
            ${$key} = $value;
        }
        include func_get_args()[0];
        return ob_get_clean();
    }
}
