<?php

/*
|--------------------------------------------------------------------------
| AccessorBot
|--------------------------------------------------------------------------
|
| A robot who can access the database
| Robot gets the key from KeeperBot
|
*/

namespace App;

class AccessorBot
{
    public $dbType;
    public $pdo;

    public function __construct($dbType)
    {
        $this->dbType = $dbType;
    }

    public function connect($dbSettings)
    {
        $dsn = $this->dbType.':host='.$dbSettings['dbHost'].';dbname='.$dbSettings['dbName'];
        $this->pdo = new \PDO($dsn, $dbSettings['dbUser'], $dbSettings['dbPassword']);
    }
}
