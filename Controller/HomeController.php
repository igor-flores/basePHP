<?php


class HomeController
{
    function index()
    {
        $render = new Render('paginaInicial');
        $render->setTitle('P�gina Inicial');
        
        $render->show();
        
    }

}