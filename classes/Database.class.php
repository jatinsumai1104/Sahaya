<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 02-03-2019
 * Time: 03:53 PM
 */

require_once 'vendor/autoload.php';

class Database
{
    private $client;
    private $database;
    public function  __construct($database)
    {

        $this->client = new MongoDB\Client();
        $this->database = $this->client->{$database};

    }

    public function getRequiredCollection($collectionName){

        return $this->database->selectCollection($collectionName);
    }


}


