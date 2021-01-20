<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>~~~~~~~~</title>
</head>
<!-- $query = $collection->find(array(),array("myName"=>1)); ?> -->

<body>
    <?php

    try {
        require 'dbconnect.php';


// the array of product criteria
 $query = $collection->find(array(),array("myName"=>1)); ?> 

 
    <label for="brgy">select:</label>
    <input Type="search"   autocomplete="off" id="brgy">
<?php        foreach($query as $result) 
        {  
            ?>
      <?php echo $result['myName']; ?>

        <?php
        }  ?>
    

      <?php



    // close connection to MongoDB
    // $conn->close();

   }
     catch ( MongoConnectionException $e )
     {
    // if there was an error, we catch and display the problem here
    echo $e->getMessage();
    echo "error at mongoconexe";
}
 catch ( MongoException $e )
{
    echo $e->getMessage();
    echo "error at mongoconeException";
}
    ?>
</body>
</html>