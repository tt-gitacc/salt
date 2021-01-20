<?php
require_once 'library.php';
	require_once 'dbconnect.php';
    if(chkLogin()){
       
        $name = $_SESSION["uname"];
		$email = $_SESSION["email"];
        //echo "Welcome, $name!";
$collection = $manager->mydb->newusers;
$query = $collection->find(['EmailAddress'=>$email]);

foreach($query as $doc){
$status =  $doc->Admin;	
$email2= $doc->EmailAddress;

	//echo "<td>".$doc->Admin."</td>";
	//echo $status;


}
if($status!=="yes"){
	header("Location:not-authorized.php");
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
//https://stackoverflow.com/questions/7115852/notice-undefined-index-zzzzzzwtf
error_reporting(E_ALL ^ E_NOTICE);
      require 'dbconnect.php';

?>

<html id="browsehtml">
<head>
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
      <title>SALT | Reports DB</title>


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
<div id="eadHeader">
      <h1>Reports</h1>
	  
	  <?php if($status=="yes"){?>
      <a href="newReport.php" class="eadAddNew">Add Report</a>
	  <?php }; ?>
	   
	   <a href="admin-home.php" class="eadHome">Dashboard</a>

   </div>

   <table class="table table-hover table-bordered infotable" data-paging="true" data-show-toggle="true" data-sorting="true" data-filtering="true">

<thead>
		<tr>
			<th>Edit, Delete</th>
			<th>Author</th>
			<th>Report Title</th>

      <th>Report Text</th>
      <th>Report Link 1</th>

		</tr>
	</thead>
	<tbody>


<?php

	$collection = $manager->mydb->reports;

	$result = $collection->find([]);
// }
// else{
// 	$collection = $manager->mydb->reports;

// $result = $collection->find(['SubmittedBy' => $name]);
// }
//$result1 = $collection->find([]);
//count the number of entries in the db and store them as a variable [countrow]
// if($status=="yes"){
     foreach($result as $entry) {
		      // while($entry = array($result)) {


         echo "<tr><td class='tableSmall'>
         <div class='btn-group'><a href='admin-editReport.php?id=".$entry->_id."''><button type='button'  class='btn btn-block btn-default'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='20' height='20' viewBox='0 0 24 24' stroke-width='2.5' stroke='#CDDC39' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                 <path stroke='none' d='M0 0h24v24H0z'/>
                 <path d='M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' />
                 <path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' />
                 <line x1='16' y1='5' x2='19' y2='8' />
               </svg>Edit</button></a>
               
         
              <a href='reports-delete.php?id=".$entry->_id."'><button type='button'  class='btn btn-block btn-danger'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='20' height='20' viewBox='0 0 24 24' stroke-width='1.5' stroke='#FFF' fill='none' stroke-linecap='round' stroke-linejoin='round'>
              <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
              <line x1='4' y1='7' x2='20' y2='7' />
              <line x1='10' y1='11' x2='10' y2='17' />
              <line x1='14' y1='11' x2='14' y2='17' />
              <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' />
              <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' />
           </svg>Delete</button></a></div>";
         
		 		 		 echo "<td>".$entry->ReportAuthor."</td>";

		 
		 
         echo "<td>".$entry->ReportTitle."</td>";


        





         echo "<td>".$entry->ReportText."</td>";

		   echo "<td>".$entry->ReportLink1."</td>";





      
 
 

        
      };

	
      ?>


      </tbody>
      </table></div>
      
      <script type="text/javascript" src="footable.js"></script>
      <script type="text/javascript" src="footable.min.js"></script>
      
      <script type="text/javascript">
         jQuery(function($){
        $('.infotable').footable();
      });
      </script>
      
      
