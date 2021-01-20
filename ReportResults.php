<?php
require 'vendor/autoload.php'; 

require 'dbconnect.php';
$collection = $manager->mydb->reports;
include_once('headerReports.php');


if (isset($_GET['ID'])) {

  $ID = $_GET['ID'];
  
  
  $result = $collection->find(['_id' => ($ID)]);
  $Query = iterator_to_array($result);
}
if (isset($_POST['reportQuery'])) {

  $term = $_POST['reportQuery'];

  $Query=$collection->find(['ReportTitle' => new MongoDB\BSON\Regex('^'.$term, 'i')]);
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
        <script type="text/javascript" src="scriptReports.js"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

       

    </head>

    <body id="browseBody">
       
      <div id="innerwrapper">
      <?php if (isset($_POST['reportQuery'])) {
            echo "<h1>Results for \"'$term'\"</h1><hr>";
        };

?>
      <?php 
					 foreach ($Query as $entry) {
echo" <div>


    <!-- Blog Post -->
    <div class='card mb-4'>
      <div class='card-body'>
        <h2 class='card-title'>".$entry['ReportTitle']."</h2>
        <p class='card-text'>".$entry['ReportText']."</p>
        <a target='_blank' href='".$entry['ReportLink1']."' class='btn btn-primary'>Go to Report &rarr;</a>";


    
    echo "</div><div class='card-footer text-muted'>
    Posted on ".$entry['ReportDatePosted']." by
    ".$entry['ReportAuthor']."
  </div></div>";
					 }
                  ?>
         </div><!--End wrapper-->


</body>

</html>


	

