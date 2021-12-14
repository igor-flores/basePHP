<?php

class Render
{
    private $file, $title, $cssFiles = array(), $jsFiles = array(), $listControllers, $contentForBody, $exibed = false;

    function __construct($file = '')
    {
        ob_start();
        ob_get_contents();

        $this->file = $file;
        $this->listControllers();
    }

    function setTitle($title)
    {
        $this->title = $title;
    }
    
    function setCssFiles($files = array())
    {
        $this->cssFiles = $files;
    }

    function setJsFiles($files = array())
    {
        $this->jsFiles = $files;
    }

    function writeOnBody($html)
    {
        $this->contentForBody .= $html;
    }

    function listControllers()
    {
        $this->listControllers = '<div class="list-group">';

        $pathController = dir($_SERVER['DOCUMENT_ROOT']. _PATH. "Controller/");
        while ($controller = $pathController->read()) {

            $controller = $this->trataController($controller);
            if (!empty($controller))
                $this->listControllers .= '<a href="'. _PATH. $controller. '" class="list-group-item list-group-item-action">'. $controller. '</a>';
            
        }

        $this->listControllers .= '</div>';
    }

    function trataController($controllerName)
    {
        if ($controllerName != '.' && $controllerName != '..') {
            $controllerName = explode('Controller.php', $controllerName);
            $controllerName = $controllerName[0];

            return $controllerName;
        }

        return;
    }

    function show()
    {
        if(!$this->exibed) {
            include_once "View/_template.php";
            $this->exibed = true;
            
            return;
        }

        throw new Exception('View já renderizada');
        ob_end_clean();
    }
}