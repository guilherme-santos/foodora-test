<?php

// Copied from: http://www.php-fig.org/psr/psr-4/examples/

spl_autoload_register(function ($class) {
    $prefix = 'Foodora\\Console\\';

    // base directory for the namespace prefix
    //$base_dir = __DIR__ . '/src/Foodora/Console/'; // PSR-0
    $base_dir = __DIR__ . '/src/'; // PSR-4

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});