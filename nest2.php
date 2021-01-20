<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->unwind;

$query = array(
    'category' => 'test', 
    'images.name' => '9by9easy.PNG'
);

// projection (fields to include)
$projection =  array('_id' => false, 'images.$' => true);

$result = $collection->findOne($query, $projection);
$data = $result->images;
var_dump($data);