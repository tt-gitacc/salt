<?php
//Including Database configuration file.
require 'dbconnect.php';
//Getting value of "search" variable from "script.js".
//<!-- <?php echo $Query 
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $fullQuery = $collection->find(array(),array("Word"=>1)); 
   // $Query2=$collection->find(['myName' => new MongoDB\BSON\Regex($Name)]);

   // $Query=$collection->find(['myName' => new MongoDB\BSON\Regex($Name)]);
   $Query2=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $Query=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   // $Query=$collection->find(array('$or' => array(array("myName" => array('$regex' => $term)),
   // array("myDefinition" => array('$regex' => $term)))));
   // $ExecQuery =$collection->find($Query);
   // $testerr=$collection->find([$Query => fullQuery]);
   // $countingA=$collection->count($Query);
   $countingA=count($Query2->toArray());


       ?>
<?php 
if ($countingA>0) {
foreach ($Query as $doc)
{ 



   // echo '<div class="dropdown"> <a class="testing123" href=definitions.php?ID='.$doc['_id'].'>'.$doc['myName'].'</a></div>';
   // echo '<a class="dropdown" href=definitions.php?ID='.$doc['_id'].'>'.$doc['myName'].'</a> <button id="hide"></button>';
   
   echo '<a class="dropdown" style="text-transform: capitalize;" href=definitions.php?ID='.$doc['_id'].'>'.$doc['Word'].'</a>';

   // $relatedTerms = $collection->find(array(),array("Tag"=>1)); 
///////Maybe///////
   // echo '<a class="dropdown" href=definitions.php?ID='.$doc['_id'].'>'.$doc['myName'].'</a> <button id="hide" name='.$doc['_id'].'>'.$doc['_id'].'</button>';

//  if (isset($doc['Tag'])) {
//    $thisTag=$collection->find(array("Tag" => $doc['Tag']));
//    echo '<ul>';
//    foreach ($thisTag as $theseTerms) {
//    // echo '<div class="dropdown">'.$theseTerms['myName'].'</div>';
//    // echo '<a id="dropdown3" href=definitions.php?ID='.$theseTerms['_id'].'>'.$theseTerms['myName'].'</a>';

//    echo '<li><a class="dropdown4" id="this'.$counter.'" >'.$theseTerms['myName'].'</a></li>';
//    // echo '<div class="dropdown">'.$relatedTerms['myName'].'</div>';
 

//    }
//    echo '</ul>';
  

// }


if (isset($doc['Tag'])) {
   $thisTag=$collection->find(array("Tag" => $doc['Tag']));
   echo '<span class="testyy"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="28" height="28" viewBox="0 0 24 24" stroke-width="3" stroke="#9E9E9E" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z"/>
   <line x1="5" y1="12" x2="19" y2="12" />
   <line x1="15" y1="16" x2="19" y2="12" />
   <line x1="15" y1="8" x2="19" y2="12" />
 </svg>';
   foreach ($thisTag as $theseTerms) {

   // echo '<div class="dropdown">'.$theseTerms['myName'].'</div>';
   // echo '<a id="dropdown3" href=definitions.php?ID='.$theseTerms['_id'].'>'.$theseTerms['myName'].'</a>';
      if ($theseTerms['Word'] == $doc['Word']){
         echo '<p class="dropdown4">what would you like to know about '.$theseTerms['Word'].'</p><a class="dropdown4"  href=definitions.php?ID='.$theseTerms['_id'].'>Overview</a>';   }
      // echo '<div class="dropdown">'.$relatedTerms['myName'].'</div>';
      else {   echo '<a class="dropdown4"  href=definitions.php?ID='.$theseTerms['_id'].'>'.$theseTerms['Word'].'</a>';
      }


   }
   echo '</span>';
}
    
// echo '<li><a class="this'.[$counter].' id='.$doc['_id'].'" >'.$theseTerms['myName'].'</a></li>';












//   echo '<a class="testing123" href=definitions.php?ID='.$doc['_id'].'>'.'<div class="dropdown">'.$doc['myName'].'</div>'.'</a>';
   // echo '<div class="dropdown">'.$doc['myName'].'</div>';
   // {$doc['_id']}

}} 
else {
   //$noResult= "Looks like".' '.$Name.' '."Is not in in the database. You can add it yourself ".'<a href='.$Name.'.txt>Here </a>';
   $noResult= "Looks like".' '.$Name.' '."Is not in in the database. You can add it yourself ".'<a href="sub.php">Here </a>';

   echo '<div class="dropdown2">'.$noResult.'</div>';
}
?>
   <?php
}
?>

