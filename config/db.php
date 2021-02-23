<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'sm_db_1');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
