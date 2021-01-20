<?php
//Including Database configuration file.
require 'dbconnect.php';
//Getting value of "search" variable from "script.js".
//<!-- <?php echo $Query 
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $term = $_REQUEST['search'];
   // $Query = $collection->find(array(),array("myName"=>1)); 
   $Query=$collection->find(['myName' => new MongoDB\BSON\Regex($Name)]);
   // $Query=$collection->find(array('$or' => array(array("myName" => array('$regex' => $term)),
   // array("myDefinition" => array('$regex' => $term)))));
   $ExecQuery =$collection->find($Query);

   echo '
   
<ul>
   ';
       ?>
<?php 
foreach ($Query as $doc)
{
     echo $doc['myName']; 
     
}
?>


   <li> <?php echo $Name; ?></li>
   <li> <?php echo $term; ?></li>



   <?php
}
?>


