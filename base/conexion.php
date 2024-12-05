<?php
class BD
{
    public static function connect()
    {
        $db = new mysqli("localhost", "root","","petsmarket");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }

}
?>