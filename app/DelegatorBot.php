<?php

/*
|--------------------------------------------------------------------------
| DelegatorBot
|--------------------------------------------------------------------------
|
| A robot who call AccessorBot and InquirerBot
| Robot gets the final say to execute query
|
*/

namespace App;

class DelegatorBot
{
    public function call(AccessorBot $accessor, InquirerMysqlBot $inquirer)
    {
        $delegator = $accessor->pdo->prepare($inquirer->query);
        $delegator->execute();

        $results = array();
        while($row = $delegator->fetch(\PDO::FETCH_ASSOC)){
            $results[] = $row;
        }

        if(empty($results)){
            return false;
        }

        return $results;
    }
}
