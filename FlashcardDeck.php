<?php
// error_reporting(E_ALL ^ E_NOTICE);
require 'dbconnect.php';

$collection1 = $manager->mydb->newusers;
$collection2 = $manager->mydb->approved;
include_once('header.php');

require_once 'library.php';

if(chkLogin()){
       
  $name = $_SESSION["uname"];
  $email = $_SESSION["email"];
  

}
else{
  header("Location: login.php");
}




            $testing =  $collection1->find(array("EmailAddress" => "$email"), array("Words" => 2));
$wordArray1 = iterator_to_array($testing);

$array = array();

foreach ($wordArray1 as $definition) {
array_push($array,  $definition['Flashcard Words']);

}
$array2 = explode(',', $array[0]);


$result = $collection2->find(array('Word' => 
array('$in' => $array2)
)
);
$wordArray = iterator_to_array($result);
                              shuffle($wordArray);


?>
<html id="browsehtml">
<head>
  <title>Salt | View Flashcards</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="script.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="ouicards.js"></script>
  <link rel="stylesheet" href="styles.css">
  <!-- <script src="example.js"></script> -->
</head>

<body id="browseBody">
<div id="innerwrapper">

  <!-- <h1>Ouicards jQuery!</h1> -->
  <div id='flashcards'>
        <!-- <a id='show-answer' href='#'> -->

<div id='current-question'></div></a>
    
    <ul>
    <?php
               foreach ($wordArray as $title) {
                
                    echo '<li><div class="question">'.$title['Word'].'</div>';
                    echo '<div class="answer">'.$title['Definition'].'</div></li>';
                
            }  ?>

<?php
               foreach ($wordArray as $title) {
                
                    echo '<li><div class="question">'.$title['Word'].'</div>';
                    echo '<div class="answer">'.$title['Definition'].'</div></li>';
                
            }  ?>
            
    </ul>
    <div class="controls">
        <div class="correct">

            <a id="correct" href="#">Next</a>
            <a id='show-answer' href='#'>Show Definition</a>

        </div>

        <div id='current-answer'></div>

        <!-- <div class="wrong">
          <label class="icon-close">    <a id="wrong" href="#">Wrong</a>
</label>
        </div> -->
      </div>
  </div>

          </div>
  <script>
    $(function() { 
      $('#flashcards').ouicards(); 
    });
  </script>


</body>
</html>