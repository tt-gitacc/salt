<?php
require 'dbconnect.php';
$collection = $manager->mydb->newusers;
require_once 'library.php';

// $collection = $manager->mydb->approved;
if(chkLogin()){
       
  $name = $_SESSION["uname"];
  $email = $_SESSION["email"];
  

}
else{
  header("Location: login.php");
}




if(isset($_POST['submit'])){
if(!empty($_POST['FlashcardWords'])) {
// echo "<span>You have selected :</span><br/>";
$d = array();

// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['FlashcardWords'] as $select)
{
    $d[] = $select;

}


}}

$s= implode(",",$d);

echo $s;

$filterOption = ["EmailAddress" => "$email"];
$updateOption = ["Flashcard Words" => "$s"];

$result = $collection->updateMany(
    $filterOption, 
    ['$set' => $updateOption], 
);

header("Location: FlashcardDeck.php");

?>