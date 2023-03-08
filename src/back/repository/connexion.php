<?php
namespace App;

use \PDO;

Class Connection {

    public static function getPDO (): PDO
    {
        return new PDO('mysql:dbname=trtagence;host=127.0.0.1', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
    }

}