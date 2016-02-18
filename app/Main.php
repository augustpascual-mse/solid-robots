<?php

/*
|--------------------------------------------------------------------------
| Bot Rule
|--------------------------------------------------------------------------
|
| 1. Summon Bots
| 2. Add business logic
| 3. Run main in shell
|
*/

require_once '../vendor/autoload.php';

use App\AccessorBot;
use App\InquirerMysqlBot;
use App\KeeperBot;
use App\DelegatorBot;

$keeper = new KeeperBot();
$accessor = new AccessorBot('mysql');
$inquirer = new InquirerMysqlBot();
$delegator = new DelegatorBot();

function main()
{
    global $keeper, $accessor, $inquirer, $delegator;

    // Set your table and columns here
    $table = 'order_items';
    $columns = array('order_id',
                    'item_id',
                    'parent_item_id',
                    'sku',
                    'name',
                    'product_type');


    $dbSettings = $keeper->getDbSettings();
    $accessor->connect($dbSettings);

    $inquirer->query($columns, $table)->sort('order_id', 'ASC');
    $resultsItems = $delegator->call($accessor, $inquirer);

    // Do your business logic here
}

main();
