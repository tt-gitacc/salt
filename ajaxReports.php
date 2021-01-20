   <?php
//Including Database configuration file.
require 'dbconnect.php';
//Getting value of "search" variable from "script.js".
//<!-- <?php echo $Query 
$collection = $manager->mydb->reports;

if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $fullQuery = $collection->find(array(),array("ReportTitle"=>1)); 

   $Query2=$collection->find(['ReportTitle' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $Query=$collection->find(['ReportTitle' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $countingA=count($Query2->toArray());


       ?>
<?php 
$collection = $manager->mydb->approved;

if ($countingA>0) {
foreach ($Query as $doc)
{ 

   echo '<a class="dropdown" href=reportResults.php?ID='.$doc['_id'].'>'.$doc['ReportTitle'].'</a>';
   
   }} 
   else {
      $noResult= "Could not find reports that match".' '.$Name;
   
      echo '<div class="dropdown2">'.$noResult.'</div>';
   }
   ?>
      <?php
   }
   ?>