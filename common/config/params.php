<?php

$params = array(

    'emails' => array(
        'info'      => array('address' => 'info@icpc.org.ua', 'name' => 'icpc.org.ua Team'),
        'noreply'   => array('address' => 'info@icpc.org.ua', 'name' => 'icpc.org.ua Team'),
    ),

    'languages' => array(
        'uk'    => 'Українська',
        'ru_ru' => 'Русский',
        'en_us' => 'English',
    ),

    'regexp' => array(
        'notAlphanumericSoft'       => "\!@#$%^&+*=\[\]{}\"\\\\\/|<>\?,~", // Validate user name
        'notAlphanumericShortUrl'   => "\!@#$%^&+*=\[\]{}\"\\\\\/|<>\?,~" . "()'", // Validate short URL
        'notAlphanumericStrong'     => "\!@#$%^&+*=\[\]{}\"\\\\\/|<>\?,~" . "()\-\._'", // Alphanumeric only
    ),

    'version' => 'beta.2013-09-03',

);

// Environment configuration
$file = __DIR__ . '/env/' . APPLICATION_ENV . '/params.php';
if (is_file($file)) {
    $params = \CMap::mergeArray($params, require($file));
}

// Local configuration
$file = __DIR__ . '/local/params.php';
if (is_file($file)) {
    $params = \CMap::mergeArray($params, require($file));
}

return $params;