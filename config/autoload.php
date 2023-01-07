<?php

function recursiveModelAutoloader($className) {
    $classPath = './model';

    $dir = new RecursiveDirectoryIterator($classPath);
    foreach (new RecursiveIteratorIterator($dir) as $file) {

        if (strpos($file, '.php') !== false && $file->getFilename() === $className . '.php') {
            require_once $file;
            return;
        }
    }
}

function recurciveServiceLoader($serviceName) {
    $functionPath = './application';
    $dir = new RecursiveDirectoryIterator($functionPath);
    foreach (new RecursiveIteratorIterator($dir) as $file) {
        if (strpos($file, '.php') !== false and $file->getFilename() === $serviceName . '.php') {
            require_once $file;
            if (function_exists($serviceName)) {
                return;
            }
        }
    }
}



spl_autoload_register('recursiveModelAutoloader');
spl_autoload_register('recurciveServiceLoader');