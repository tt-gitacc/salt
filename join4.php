<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
    $pipeline = array(

        array(
            '$lookup' => array(
                "from" => "scrape",
                "localField" => "Word",
                "foreignField" => "Word1",
                "as" => "inventory_docs"
				 )
    ),
    array(
        '$out' => 'collection'        
    ),
);
$updateResult = $collection->aggregate($pipeline);