<?php
//Including Database configuration file.
require 'dbconnect.php';
$collection = $manager->mydb->approved;


include_once('header.php');

//    $result = $collection->find(array(),array("myName"=>1)); 


       ?>


<!DOCTYPE html>
<html>
    <head>
    <title>SALT</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
   <link rel="manifest" href="/site.webmanifest">
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body id="browseBody">
        
      <div id="jumper">
        <ul>
            <li><a href="#letter#">#</a></li>
            <li><a href="#letterA">A</a></li>
            <li><a href="#letterB">B</a></li>
            <li><a href="#letterC">C</a></li>
            <li><a href="#letterD">D</a></li>
            <li><a href="#letterE">E</a></li>
            <li><a href="#letterF">F</a></li>
            <li><a href="#letterG">G</a></li>
            <li><a href="#letterH">H</a></li>
            <li><a href="#letterI">I</a></li>
            <li><a href="#letterJ">J</a></li>
            <li><a href="#letterK">K</a></li>
            <li><a href="#letterL">L</a></li>
            <li><a href="#letterM">M</a></li>
            <li><a href="#letterN">N</a></li>
            <li><a href="#letterO">O</a></li>
            <li><a href="#letterP">P</a></li>
            <li><a href="#letterQ">Q</a></li>
            <li><a href="#letterR">R</a></li>
            <li><a href="#letterS">S</a></li>
            <li><a href="#letterT">T</a></li>
            <li><a href="#letterU">U</a></li>
            <li><a href="#letterV">V</a></li>
            <li><a href="#letterW">W</a></li>
            <li><a href="#letterX">X</a></li>
            <li><a href="#letterY">Y</a></li>
            <li><a href="#letterZ">Z</a></li>
        </ul>
     </div>
     
      <div id="innerwrapper">

          <div id="browsebox2">
                <!-- <h3 id="letterA">A</h3>
                <ul> -->
                <?php 
                   $filter = [];
                   //$options = ['sort' => ['Word' => 1]];
                   $result = $collection->find($filter);
                   $wordArray = iterator_to_array($result);
                     $matches = false;
                echo '<h3 id=letter#>#</h3>';
                    echo '<ul>';
                foreach( $wordArray AS $doc )
                {  

                    if( is_numeric(substr($doc['Word'], 0, 1))){
                        // echo "<li>" .$doc['myName']. "</li>";
                        echo '<li><a style="text-transform: capitalize;" href=definitions.php?ID='.$doc['_id'].'>'.$doc['Word'].'</a>'.'</li>';

                    }
                  
                }
                echo '</ul>';
                foreach(range('A', 'Z') AS $letter)
                {
                    echo '<h3 id=letter'.$letter.'>'.$letter.'</h3>';
                    ?>
                <?php echo '<ul>' ?>
                <?php
                    foreach( $wordArray AS $doc )
                    { 
                        if( strtoupper(substr($doc['Word'], 0, 1)) ===  $letter)
                        {
                            $matches = true;
                        echo '<li><a style="text-transform: capitalize;" href=definitions.php?ID='.$doc['_id'].'>'.$doc['Word'].'</a>'.'</li>';
                        }
                       
                    }
                    echo '</ul>';

                    if(!$matches)
                        echo "<p>No matches here</p>";

                    $matches = false;

                }

                ?>

        </div><!--End wrapper-->
</body>

</html>