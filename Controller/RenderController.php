<?php

class RenderController
{
    function index()
    {
        
        $render = new Render();
        $render->setTitle('Render::Renderização de telas');
        
        $render->writeOnBody('
            <h2> class Render</h2>
            Métodos:
            <ul>
                <li> <code>__construct($fileName)</code> </li>
                <li> <code>setTitle($title)</code> </li>
                <li> <code>setCssFiles($files = array())</code> </li>
                <li> <code>setJsFiles($files = array())</code> </li>
                <li> <code>writeOnBody($html)</code> </li>
                <li> <code>show()</code> </li>
            </ul>
            
        ');
        $render->show();
    }
}