<?php


class SQL extends Conexao
{
    function __construct()
    {
        parent::__construct();
    }

    function date_add($qtd = '1', $und = 'YEAR')
    {
        $select = "`datetime`, DATE_ADD(`datetime`, INTERVAL {$qtd} {$und}) AS 'date_add_datetime 12 month'";
        $query = $this->select($select);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function ifSQL()
    {
        $select = "if((1 + 1 = 2), 'true', 'false') as if_result";
        $query = $this->select($select);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}