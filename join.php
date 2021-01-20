<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
//change scrape to words
$ops = array(
    array(
        '$lookup' => array(
            "from" => 'scrape',
            "localField" => "Word",
            "foreignField" => "Word",
            "as" => "morestuff"
        )
    )
);
$results = $collection->aggregate($ops)->toArray();

<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
    $ops = array(

        array(
            '$lookup' => array(
                "from" => "scrape",
                "localField" => "Word",
                "foreignField" => "Word",
                "as" => "inventory_docs"
            )
        )

    );
    $results = $collection->aggregate($ops)->toArray();
    echo "<pre>";    print_r($results);exit;