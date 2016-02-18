<?php

/*
|--------------------------------------------------------------------------
| InquirerBot
|--------------------------------------------------------------------------
|
| A robot who query the database
| Robot called by DelegatorBot
|
*/

namespace App\Advisor;

interface Inquirer
{
    public function query(array $column, $table);
    public function where($key, $value, $operator);
    public function whereAnd($key, $value, $operator);
    public function sort($key, $value);
}
