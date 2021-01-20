<?php
    require_once 'library.php';
	require_once 'dbconnect.php';
    if(chkLogin()){
       
        $name = $_SESSION["uname"];
        echo "Welcome, $name!";
$collection = $manager->mydb->newusers;
$query = $collection->find(['EmailAddress'=>$email]);

foreach($query as $doc){
$status =  $doc->Admin;	
	

if($status==!"yes"){
	header("Location:login.php");
}

}
	

    }
    else{
        header("Location: login.php");
    }

    if(isset($_POST['logout'])){
        
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    
    }
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
    <title>Admin Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!-- <link rel="stylesheet" href="footable.core.css" /> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <link rel="stylesheet" href="footable.bootstrap.css" />
        <link rel="stylesheet" href="footable.bootstrap.min.css" />
        <link rel="stylesheet" href="styles.css">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
   <!-- <link rel="manifest" href="/site.webmanifest"> -->
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">
   
   
   <style>
       #test1 {
           width:55%;
           margin: 0 auto;
       }
   </style>
    </head>
<body id="eadBody">
    <div class="thisheadera">
        <a id="adminLogo" href="index.php"><img id="headerLogo" src="Images\Logo.svg"></a>
		

		
                <div id="headerbox">
                <nav>
                        <ul>
                           <li><a href="approved-index.php">Approved Words</a></li>
                           <li><a href="admin-index.php">Pending Words</a></li>
                           <li><a href="admin-users.php">Manage Users</a></li>
                           <li><a href="admin-reports.php">Reports</a></li>
                           <li><a href="admin-scrape.php">Import Scraped Data</a></li>
                        </ul>
                    </nav>
                   
          </div>       

</div>

        <form method="post" action="">
            <input type="submit" name="logout" value="Logout">
        </form>

        <div id="eadHeader">
      <h1>Dashboard</h1>	  
      	   
      <a target="blank" href="Admin_Guide_2.pdf" class="btn btn-primary">Administrator's Guide</a>
	   <a target="blank" href="Maintenance_Guide.pdf" class="btn btn-primary">Maintenance Guide</a>
	 

   </div>
		<!-- copied until metric table-->
		<div id="innerwrapper">

  
                         <?php 
								error_reporting(E_ALL ^ E_NOTICE);
								require 'dbconnect.php';
								require 'vendor/autoload.php';
								require_once 'library.php';
								
	

								
								
								$collection = $manager->mydb->newusers;



								
								$count2 = $collection->count();
								
								 
                                $collection = $manager->mydb->approved;

                                $wordArray = $collection->find(
                                    [],
                                    [            
                                      

                                        '$sort' => ['seq' => -1],
                                        // '$limit' => 4,

                                        

                                    ]
                                );

                                
                                // $wordArray = iterator_to_array($wordArray);
								$count1 = $collection->count();
					
								echo "<p id='adminCount'>Total Number of Words: " .$count1."</p>";
								echo "<p id='adminCount'>Total Number of Registered Users:  " .$count2."</p>";

								



								


//don't delete anything above this line
//move these later
//$result = $collection->find($filter, $options);
//$wordArray = iterator_to_array($result);


						?>
<div>
<table id="test1" class='table table-hover table-bordered infotable' data-paging-size="10" data-paging="true" data-sorting='true'>

<thead>
    <tr>
        <th style="width: 50%;">Word</th>

        <th data-sorted='true' data-direction='DESC' data-type='number' style="width: 50%;">Views</th>
    </tr>
</thead>
<tbody>
                    <?php

                    // $i= 0;

                    foreach ($wordArray as $entry) {
                       if (!empty($entry['seq'])) {
                        //    $i++;
                           
				   echo '<tr>' 
                    ?>
                    <?php echo '<td>'.$entry['Word'].'</td>'; ?>
                      <?php echo '<td>'.intval($entry['seq']).'</td>'; 
                       

// if($i == 10) break;
					  ?>
         
     <?php  }};


	 ?> 
   </tr>
</tbody>
</table></div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> -->
<script type="text/javascript" src="footable.js"></script>
<script type="text/javascript" src="footable.min.js"></script>

<script type="text/javascript">
   jQuery(function($){
    $('.infotable').footable();
    // $("#innerwrapper > div > table > tfoot").hide();
});
</script>

    </div>



</body>
</html>