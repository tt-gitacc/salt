<?php
//Including Database configuration file.
require 'dbconnect.php';
$collection = $manager->mydb->reports;

$result = $collection->find();
$reportArray = iterator_to_array($result);
include_once('headerReports.php');


       ?>


<!DOCTYPE html>
<html>
    <head>
    <title>SALT | Reports</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="scriptReports.js"></script>
        <link rel="stylesheet" href="styles.css">
                <script>$('#innerwrapper > div > div > div.card-body > p').focus(function () {
    $(this).animate({ height: "100em" }, 500); 
});</script>
    </head>

    <body id="browseBody">

 
      <div id="innerwrapper">
      
    <h1 class='my-10'>Reports
    </h1>
  


  <?php 
  foreach ($reportArray as $report) {
 echo" <div>


    <!-- Blog Post -->
    <div class='card mb-4'>
      <div class='card-body'>
        <h2 class='card-title'>".$report['ReportTitle']."</h2>
        <p class='card-text'>".$report['ReportText']."</p>
        <a target='_blank' href='".$report['ReportLink1']."' class='btn btn-primary'>Go to Report &rarr;</a>";


    
    echo "</div><div class='card-footer text-muted'>
    Posted on ".$report['ReportDatePosted']." by
    ".$report['ReportAuthor']."
  </div></div>";
    //   echo  

     


}
  ?>



    


        </div><!--End wrapper-->
        <script>$('#innerwrapper > div > div > div.card-body > p').focus(function () {
    $(this).animate({ height: "100em" }, 500); 
});</script>
</body>

</html>