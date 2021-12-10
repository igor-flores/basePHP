<?php


class SQLController
{
    function index()
    {
        $render = new Render();

        $render->writeOnBody(
            "<h2> SQL </h2>".
            "<a href=\"./alterDate\">alterDate</a> <br/>".
            "<a href=\"./ifSQL\">if</a>"
        );
        $render->show();
    }

    function alterDate()
    {
        $sql = new SQL();
        $render = new Render();
        
        $render->writeOnBody(
            "<h1> SQL FUNCTION: DATE_ADD </h1>". 
            "<a href=\"". _PATH. "SQL/\">Voltar</a> <br/>". 
            "<code> DATE_ADD(coluna, INTERVAL qtd unidade) </code>".
            "<h4 style=\"margin-top: 15px;\"> Exemplo: </h4>".
            Utils::dump($sql->date_add())
        );
        $render->show();
    }

    function ifSQL()
    {
        $sql = new SQL();
        $render = new Render();

        $render->writeOnBody(
            "<h1> SQL IF</h1>".
            "<a href=\"". _PATH. "SQL/\">Voltar</a> <br/>". 
            "<code> if((1 + 1 = 2), 'true', 'false') as if_result </code>".
            "<h4 style=\"margin-top: 15px;\"> Exemplo: </h4>".
            Utils::dump($sql->ifSQL())
        );
        $render->show();
    }
}