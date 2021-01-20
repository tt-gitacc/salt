<?php
require_once __DIR__ . "/vendor/autoload.php";

//db connection



$manager = new MongoDB\Client(
//enter connection string here
);

  

//select db
$db = $manager->mydb;

$collection = $manager->mydb->words;


session_start();

?>