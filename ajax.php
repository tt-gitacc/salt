<?php
//Including Database configuration file.
require 'dbconnect.php';
//Getting value of "search" variable from "script.js".
//<!-- <?php echo $Query 
$collection = $manager->mydb->approved;

if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $fullQuery = $collection->find(array(),array("Word"=>1)); 

   $Query2=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $Query=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $countingA=count($Query2->toArray());


       ?>
<?php 
$collection = $manager->mydb->approved;

if ($countingA>0) {
foreach ($Query as $doc)
{ 

   echo '<a class="dropdown" style="text-transform: capitalize;" href=definitions.php?ID='.$doc['_id'].'>'.$doc['Word'].'</a>';

   
   }} 
   else {
      $noResult= "Looks like".' '.$Name.' '."Is not in in the database. You can add it yourself ".'<a href="sub.php">Here </a>';
   
      echo '<div class="dropdown2">'.$noResult.'</div>';
   }
   ?>
      <?php
   }
   ?>
   
   