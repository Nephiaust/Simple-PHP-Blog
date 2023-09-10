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

// Creates a SLUG based on the title.
function slug($string)
{
    $slug = trim($string); // trim the string
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = strtolower(replace_accents($slug));
    $slug = substr($slug, 0, 100);
    return $slug;
}

// A simple check to see if user is logged in.
function checkedLoggedIn()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['username'])) {
        return true;
    }
}

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
