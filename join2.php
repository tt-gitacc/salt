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
                "as" => "inventory_docs",
				'export' => array('$out' => "ra4")
            )
        )

    ));
	//), ('$out' => "ra4")]);
	//, '$out' => ra4;
	
	//$d = $collection->insertOne($ops);
	
	//$add2 = $collection->insertOne($ops);
   // $collection->aggregate($ops)->counter;
	//$collection->deleteOne(['_id' => ($_GET['id'])]);

//$out = $collection->aggregate($ops);