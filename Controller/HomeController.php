<?php


class HomeController
{
    function index()
    {
        $render = new Render('paginaInicial');
        $render->setTitle('Página Inicial');
        
        $render->show();
        
    }

}