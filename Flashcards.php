<?php
//Including Database configuration file.
require 'dbconnect.php';
require_once 'library.php';

$collection = $manager->mydb->approved;
$collection2 = $manager->mydb->newusers;

if(chkLogin()){
       
  $name = $_SESSION["uname"];
  // $fWords=$_SESSION["FlashcardWords"];
  $email = $_SESSION["email"];


}
else{
  header("Location: login.php");
}

include_once('header.php');

$query = $collection2->find(['EmailAddress'=>$email]);

       ?>


<!DOCTYPE html>
<html>
    <head>
    <title>SALT</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body id="browseBody">

     
      <div id="innerwrapper">
          <div id="profileBox1">
            <?php 
          
                echo "<h1> Hello,  $name!</h1>" ;?>
              <h2>Flashcards</h2> 
              <hr>
         
          <?php 
          foreach($query as $doc){
            $fWords= $doc['Flashcard Words'];
                       
          
          if($fWords != ""){
            echo "<a href='https://saltapplication.azurewebsites.net/FlashcardDeck.php'><button type='button' class='btn btn-xl btn-success'>View flashcards</button></a><br>
            <a href='editFlashcards.php'><button type='button' class='btn btn-xl btn-warning'>Edit flashcard Deck</button></a><br>
            <a href='createFlashcards.php'><button type='button' class='btn btn-xl btn-danger'>Recreate deck from scratch</button></a><br>";
          }else {
            echo "<a href='createFlashcards.php'><button type='button' class='btn btn-xl btn-success'>Create Flashcards</button></a><br>";

          }
        } ?>
          </div>

        </div><!--End wrapper-->
</body>

</html>

