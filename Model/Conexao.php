<?php

class Conexao
{
    protected static $con;
    protected $table;

    function __construct($tablename = 'geral')
    {
        $this->table = $tablename;

        if(!isset(self::$con)) {
            self::$con = new PDO('mysql:dbname=test;host=localhost', 'root', '');
        }
    }

    protected function select($select = '*', $where = '1', $orderBy = 'id_geral ASC')
    {
        return self::$con->query("
            SELECT 
                {$select} 
            FROM 
                {$this->table} 
            WHERE 
                {$where} 
            ORDER BY 
                {$orderBy}
        ");
    }
}