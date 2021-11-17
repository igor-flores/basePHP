<?php

class Render
{
    private $file, $title, $cssFiles = array(), $jsFiles = array(), $contentForBody, $exibed = false;

    function __construct($file = '')
    {
        ob_start();
        ob_get_contents();
        $this->file = $file;
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