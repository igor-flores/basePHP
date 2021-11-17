<?php
    spl_autoload_register(function ($className) {
        $core = "Core/$className.php";
        $controller = "Controller/$className.php"; 
        $model = "Model/$className.php";

        if(file_exists($core)) {
            includeFile($core);

        } elseif(file_exists($model)) {
            includeFile($model);

        } elseif(file_exists($controller)) {
            includeFile($controller);

        } else {
            error404();

        }
    });

    function includeFile($file)
    {
        require_once $file;
    }

    function error404()
    {
        require_once "View/404.html";
        exit;
    }