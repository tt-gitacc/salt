<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
    $ops = $collection->aggregate(array(

        array(
            '$lookup' => array(
                "from" => "scrape",
                "localField" => "Word",
                "foreignField" => "Word1",
                "as" => "inventory_docs"
            )
        )

    ),
		//array('$out' => "newcol")
		array($out["EventTS"])
	);