<?php  

class Core
{
    function __construct()
    {
        /* dados default */
        $controller = 'homeController';
        $method = 'index';
        $parameters = array();

        /* Caso haja dados passados pela url
         * Por padrão, cada parametro, separado por barra, corresponderá a declaração das variaveis default
         */
        if(isset($_GET['pag'])) {
            $url = explode('/', $_GET['pag']);
            if (isset($url[0]) && !empty($url[0])) {
                $controller = $url[0]. "Controller";
                array_shift($url);

                if (isset($url[0]) && !empty($url[0])) {
                    $method = $url[0];
                    array_shift($url);
    
                    if (isset($url[0]) && !empty($url[0])) {
                        $parameters = $url;
                    }
                }
            }
        }
        
        $controller = new $controller;
        $controller->$method($parameters);
    }
}