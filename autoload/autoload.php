<?php

//require_once __DIR__ . '/autoload_real.php';

//return AutoloaderInite::getLoader();
$baseDir = dirname(dirname(__FILE__));

$files = array (
    'file_paths' => $baseDir  . '/config/paths.php',
    'file_database' => $baseDir . '/config/database.php',
);
foreach ($files as $file ) {
    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register(function ($className) {

    $dirs = array('controllers/','libs/','models/');
        foreach($dirs as $dir){
            $file = $dir.$className. '.php';
            if (file_exists($file)){
                require_once $file;
            }
        }


});

