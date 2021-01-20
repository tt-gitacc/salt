<?php
require 'vendor/autoload.php'; 

require 'dbconnect.php';
$collection = $manager->mydb->approved;
include_once('header.php');



if (isset($_POST['term'])) {

  $term = $_POST['term'];

  $Query=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$term, 'i')]);
}

?>
	

<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Salt | Results
            
    </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

       

    </head>

    <body id="browseBody">
       
      <div id="innerwrapper">
      <?php 
        echo "<h1>Results for \"$term\"</h1><hr>";
       
					 foreach ($Query as $entry) {
					   echo '<div class="searchResult"><a href=definitions.php?ID='.$entry['_id'].'>'.$entry['Word'].'</a></div>';
					 }
                  ?>
         </div><!--End wrapper-->


</body>

</html>


	

