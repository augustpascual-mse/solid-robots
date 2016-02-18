<?php

namespace App;

use App\Advisor\Inquirer;

class InquirerMysqlBot implements Inquirer
{
    public $query;

    public function query(array $column, $table)
    {
        $column = implode(",", $column);
        $this->query = "SELECT $column FROM $table";

        return $this;
    }

    public function where($key, $value, $operator = '=')
    {
        $query = " WHERE $key $operator '$value'";
        $this->query =  $this->query . $query;

        return $this;
    }

    public function whereAnd($key, $value, $operator = '=')
    {
        $query = " AND $key $operator '$value'";
        $this->query =  $this->query . $query;

        return $this;
    }


    public function sort($key, $value)
    {
        $this->query = $this->query . " ORDER BY $key $value";

        return $this;
    }
}
