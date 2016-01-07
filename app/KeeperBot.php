<?php

/*
|--------------------------------------------------------------------------
| KeeperBot
|--------------------------------------------------------------------------
|
| A robot who keeps the secret
| Robot holds sensitive information
|
*/

namespace App;

class KeeperBot
{
    public function getDbSettings()
    {
        $dbParam = array('dbHost' => '127.0.0.1',
                         'dbName' => 'web3780',
                         'dbUser' => 'root',
                         'dbPassword' => 'root');

        return $dbParam;
    }
}
