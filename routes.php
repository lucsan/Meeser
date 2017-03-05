<?php
/**
 * routes.php provides an automated router for php files.
 * incomming uri has the querystring (if any) removed. (This can be accessed elsewhere via $_GET)
 * If the request has a dot in it, it is treated as a non-php file (ie: jpeg or exe) return false tells
 * php web server to just servbe up the file.
 * If the uri has no dot (ie: extension) then the corresponding php file is loaded
 * ie: for localhost:8000/folder/folder/file the file at folder/folder/file.php is included
 * Note: this is not secure as any file in the root can be loaded into the browser.
 * Note: the capacities and uses of this are noted in the php documentation for php -S
 */

$route = $_SERVER['REQUEST_URI'];
$parts = explode('?', $route);
$route = $parts[0];
$route = substr($route, 1, strlen($route));

if (strpos($route, '.') > 0) {
    return false;
}

if ($route) {
    $h = include $route . '.php';
    $htmlize = $_SERVER['HTTP_USER_AGENT'] == 'commandline'? false: true;
    if ( $htmlize) {
        include 'tools/Htmlize.php';
        print htmlize($h);
    } else {
        if (is_string($h)) {
            print $h;
        } else {
            print_r($h);
        }
    }
    exit();
}

include 'welcome.php';
