<?php

if (version_compare(phpversion(), '5.3.0', '<')===true) {
    echo  '<div style="font:12px/1.35em arial, helvetica, sans-serif;">
<div style="margin:0 0 25px 0; border-bottom:1px solid #ccc;">
<h3 style="margin:0; font-size:1.7em; font-weight:normal; text-transform:none; text-align:left; color:#2f2f2f;">
Whoops, it looks like you have an invalid PHP version.</h3></div><p>We supports PHP 5.2.0 or newer.
<a href="http://rochi.netii.net/php/" target="">Find out</a> how to install</a>
<p> we are using PHP-CGI as a work-around.</p></div>';
    exit;
}


// Define base path obtainable throughout the whole application
defined('BASE_PATH')
    || define('BASE_PATH', realpath(dirname(__FILE__)));
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', BASE_PATH . '/app');

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Set include path to Zend (and other) libraries
        set_include_path(BASE_PATH . '/lib' .
            PATH_SEPARATOR . get_include_path() .
            PATH_SEPARATOR . '.'
        );

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();

//Maintenance Mode
//include('mtnce/maintenance.html');