<?php

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

class internalFunctions
{
    function __call(string $name, array $arguments)
    {
        $argCount = count($arguments);

        $tpl = new Template('templates/' . TEMPALTE);

        switch($name) {
            case 'callHeader';
                if ($argCount == 2) {
                    print $tpl->render('header', array(
                        'url_path' => SITE_URL,
                        'RedirectTimeout' => $arguments[0],
                        'RedirectLocation' => $arguments[1],
                        'HeaderTop' => true
                    ));
                    if (isset($_SESSION['userid'])) {
                        print $tpl->render('header', array(
                            'url_path' => SITE_URL,
                            'HeaderAuth' => true
                        ));
                    } else {
                        print $tpl->render('header', array(
                            'url_path' => SITE_URL,
                            'HeaderNoAuth' => true
                        ));
                    }
                } else {
                    print $tpl->render('header', array(
                        'url_path' => SITE_URL,
                        'HeaderTop' => true
                    ));
                    if (isset($_SESSION['userid'])) {
                        print $tpl->render('header', array(
                            'url_path' => SITE_URL,
                            'HeaderAuth' => true
                        ));
                    } else {
                        print $tpl->render('header', array(
                            'url_path' => SITE_URL,
                            'HeaderNoAuth' => true
                        ));
                    }
                }
                break;
            case 'callFooter';
                print $tpl->render('footer', array(
                    'url_path' => SITE_URL,
                    'Footer' => true
                ));
                break;
            default;
                break;
        }
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
