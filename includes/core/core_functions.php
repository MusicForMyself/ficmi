<?php

/**
 * Echoes or returns the value of the app url with an optional postfix
 * @param  string  $append Path to be appended to the url
 * @param  boolean $echo   If TRUE function will echo the value, else it will return it to use with php (Default TRUE)
 * @return String          Final site url
 */
function site_url($append = '', $echo = TRUE){
    if($echo){
        echo SITEURL.$append;
        return;
    }
    return SITEURL.$append;
}

/**
 * Escapes and sanitizes a $_SERVER variable
 * @param  String $url The url to sanitize
 * @return String $sanitized
 */
function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}