<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'dbconnect.php';
$collection = $manager->mydb->approved;

include_once('header.php');


if (isset($_GET['ID'])) {

$ID = $_GET['ID'];


$result = $collection->find(['_id' => ($ID)]);
$wordArray = iterator_to_array($result);

//php function to find today's date
$currentday = date("Y-m-d");
//php function to find previous day's date
$day1 = date("Y-m-d", strtotime("-1 day"));


//increments by 1 every time a user clicks on something  
$result1 =  $collection->findOneAndUpdate(
            [ '_id' => $ID ],
            [ '$inc' => [ 'seq' => $_SESSION['username']] ],
            [ 'upsert' => true,
              'projection' => [ 'seq' => $_SESSION['username'] ],
			  'set' => [ 'time' => $currentday ],
              'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
             ]
);

//add date from line 20 to the db
$result2 = $collection->updateOne(['_id' => $ID],
					[ '$set' => [ 'time' => $currentday ]]
);




//resets the count after 24 hours

$result32 = $collection->updateMany(['time' => array('$lt' => $currentday)], 
['$unset' => array('seq' => True)]
);

//this query will bring you every document that was queried within the last 48 hours
$result4 = $collection->find(array('time' => array('$gte' => '$day1')));

            
            $array = array();

            foreach ($wordArray as $definition) {
            array_push($array,  $definition['Tag']);

            }
            $array2 = explode(', ', $array[0]);

$result5 = $collection->find(array('Word' => 
            array('$in' => $array2)
            )
            );
$tags = iterator_to_array($result5);


}
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Salt | <?php 
            foreach ($wordArray as $title) { echo $title['Word'];}
            ?>
            
    </title>
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
       
      <div id="innerwrapper">
            <div class="content">
            <?php 
					 foreach ($wordArray as $definition) {
						 ?>
                <h1> <?php echo $definition['Word']; ?></h1>
                <hr>
                <?php  if(!empty($definition['NISTDefinition'])){ 

                echo "<h6>Organizational Definition </h6>";
               echo "<p>".$definition['NISTDefinition']."</p>";
                 echo "<p style='text-indent: 2em; font-style: italic;'>".$definition['NISTSourcesName']."</p><hr>"; 
                }?>
           <h6>Definition </h6>

                <p><?php echo $definition['Definition']; ?></p>
		 <?php  echo "<p style='text-indent: 2em; font-style: italic;'>".$definition['DefinitionSoure']."</p><hr>"; ?>
                    <!-- related words -->
                    <?php  if(!empty($definition['Tag'])){ 

                               echo     "<h6>Related words:</h6><ul>";
                                  foreach ($tags as $taggedWords) {
                                        
                                        echo '<li  class="relatedwords"><a  href=definitions.php?ID='.$taggedWords['_id'].'>'.$taggedWords['Word'].'</a></li> ';
                                    } 

                                    echo     "</ul>";
                      
                                    }?>              <!-- end related -->
            
                <hr>

                <div id="referenceMaterial">
                    
                    <h4>Supplemental Material</h4>

                    <?php $citation1= $definition['Author'].'. '.$definition['Date'].'.'.$definition['ArticleName'].'. '.$definition['Website'].' '.$definition['Link']; 

                    echo '<textarea id="txt_copy1" aria-hidden="true">'.$citation1.'</textarea>';
                    $citation2= $definition['Author2'].'. '.$definition['Date2'].'.'.$definition['ArticleName2'].'. '.$definition['Website2'].' '.$definition['Link2']; 
                    echo '<textarea id="txt_copy2" aria-hidden="true">'.$citation2.'</textarea>';

                    $citation3= $definition['Author2'].'. '.$definition['Date2'].'.'.$definition['ArticleName2'].'. '.$definition['Website2'].' '.$definition['Link2']; 

                    echo '<textarea id="txt_copy3" aria-hidden="true">'.$citation3.'</textarea>';
                    
                    
                       ?> 
                <?php 		
                if(!empty($definition['Link']) || (!empty($definition['Link2'])) || (!empty($definition['Link3']))) {

                    echo '<h6>Articles</h6>';

                };

				if(!empty($definition['Link'])){

                    echo '<div class="articlessss">';
                           
                           
                        echo '<p><a target="_blank" href='.$definition['Link'].'>'.$definition['ArticleName'].'<a/> <br>
                        Source:'.$definition['Website'].'<br>';
                        echo "Author: ".$definition['Author'].'<br>';
                        echo "Date: ".date("M Y",strtotime($definition['Date']));
                       echo  '</div>';  }?>
                        

                        <?php
						if(!empty($definition['Link2'])){
                        echo '<div class="articlessss">';
                           
                           
                            echo '<p><a target="_blank" href='.$definition['Link2'].'>'.$definition['ArticleName2'].'<a/> <br>
                                    Source:'.$definition['Website2'].'<br>';
                            echo "Author: ".$definition['Author2'].'<br>';
                            echo "Date: ".date("M Y",strtotime($definition['Date2']));

                echo '</p>';
                       echo  '</div>';  }?>
                   
                        
                  
					   <?php
						if(!empty($definition['Link3'])){
                        echo '<div class="articlessss">';
                           
                           
                               echo '<p><a target="_blank" href='.$definition['Link3'].'>'.$definition['ArticleName3'].'<a/> <br>
                                      Source:'.$definition['Website3'].'<br>';
                                echo "Author: ".$definition['Author3'].'<br>';
                                echo "Date: ".date("M Y",strtotime($definition['Date3']));

                              echo '</p>';
                       echo  '</div>';  }?>
                        
<br>
<?php 	


                      
?>
                      
                    
                        </div><!--End Parent -->
<br>
    
                        <h6>Videos</h6>
                        <hr>
                        
                        <?php
                        	if(!empty($definition['VideoLink1'])){
                            $url = $definition['VideoLink1'];
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            echo '<h4>'.$definition['Title1'].'-'.$definition['Uploader1'].'</h4>';
                           
                           
                            echo "<iframe id='ytplayer' type='text/html' width='150px' height='100px'
                                src='https://www.youtube.com/embed/$id?rel=0&showinfo=0&color=white&iv_load_policy=3'
                                frameborder='0' allowfullscreen></iframe>";
                       }
                       if(!empty($definition['VideoLink2'])){
                        $url = $definition['VideoLink2'];
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1];
                        echo '<h4>'.$definition['Title2'].'-'.$definition['Uploader2'].'</h4>';
                       
                       
                        echo "<iframe id='ytplayer' type='text/html' width='150px' height='100px'
                            src='https://www.youtube.com/embed/$id?rel=0&showinfo=0&color=white&iv_load_policy=3'
                            frameborder='0' allowfullscreen></iframe>";
                   }

                   if(!empty($definition['VideoLink3'])){
                    $url = $definition['VideoLink3'];
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                    $id = $matches[1];
                    echo '<h4>'.$definition['Title3'].'-'.$definition['Uploader3'].'</h4>';
                   
                   
                    echo "<iframe id='ytplayer' type='text/html' width='150px' height='100px'
                        src='https://www.youtube.com/embed/$id?rel=0&showinfo=0&color=white&iv_load_policy=3'
                        frameborder='0' allowfullscreen></iframe>";
               }

                    } 
                       
                       ?>


            </div> 
  
         </div><!--End wrapper-->

</body>

</html>


