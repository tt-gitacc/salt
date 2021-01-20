<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
$query = array(
    'original' => 'What is this', 
    'translation.language' => 'english'
);

// projection (fields to include)
$projection =  array('_id' => false, 'translation.$' => true);

$result = $collection->findOne($query, $projection);
$data = $result->translation;
var_dump($data);