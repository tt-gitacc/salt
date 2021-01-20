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
	header("Location:login.php");
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
require 'dbconnect.php';
$collection = $manager->mydb->words;

if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => ($_GET['id'])]);
}

$collection = $manager->mydb->approved;
$myDate = date("Y-m-d");
;

if(isset($_POST['submit'])){
 //  $collection->insertOne(
   //    ['_id' => ($_GET['id'])],
     //  ['$set' => ['myName' => $_POST['myName'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials']]]
   //);
   
      $collection->insertOne([
		'_id' => ($_GET['id']),
	   'SubmittedBy' => $_POST['SubmittedBy'], 
	   'Word' => $_POST['Word'], 
	   'Definition' => $_POST['Definition'], 
	   'PublicationName' => $_POST['PublicationName'], 
	   'NISTSourcesName' => $_POST['NISTSourcesName'], 
	   'ArticleName' => $_POST['ArticleName'],
	   'Website' => $_POST['Website'], 
	   'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 
	   'Link' => $_POST['Link'], 
	   
	   	   'Tag' => $_POST['Tag'],

	  	   'VideoLink1' => $_POST['VideoLink1'],
	    'VideoLink2' => $_POST['VideoLink2'],
		 'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	    'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'], 
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'],
	   
	   
	   'Status' => "Approved",
	   'SubmissionDate' => $myDate
	   
	   

   ]);
   
   $collection = $manager->mydb->words;
   $collection->deleteOne(['_id' => ($_GET['id'])]);

   
   $_SESSION['success'] = "Success!";
   header("Location: admin-index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
   <title>Admin GUI</title>
   <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
   <link rel="manifest" href="/site.webmanifest">
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <h1>Approve</h1>
   <a href="admin-index.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h4>Your Name</h4>
		 <input type="text" name="SubmittedBy" value="<?php echo $entry->SubmittedBy; ?>" class="form-control" required="" class="form-control" placeholder="Name">
      </div>
<!--
      <div class="form-group">
         <h1>Category:</h1>
         <select class="form-control" name="category" placeholder="category" placeholder="category">
		         <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>
      </div>
-->  
	 <div class="form-group">
         <h4>Word:</h4> 
         <input type="text" name="Word"  value="<?php echo $entry->Word; ?>" class="form-control" placeholder="Word">
      </div>
	  
	        <div class="form-group">
         <h4>Definition:</h4>
         <textarea type="text" name="Definition"  style="min-width: 100%" rows="5" class="form-control" placeholder="Definition"><?php echo $entry->Definition; ?></textarea>
      </div>
      <div class="form-group">
         <h4>NIST Sources Name:</h4>
         <input type="text" name="NISTSourcesName" value="<?php echo $entry->NISTSourcesName; ?>" class="form-control" >
      </div>
	  
	    <div class="form-group">
         <h4>NIST Publication Name:</h4>
         <input type="text" name="PublicationName" value="<?php echo $entry->PublicationName; ?>" class="form-control">
      </div>
	  
	 			  	 			  <h4>Video 1:</h4>
 
	  
	 <div class="adminEditArticle" style="margin-left: 6rem;"> 
	    <div class="form-group">	      
		
         <h4>Video Link:</h4>
         <input type="text" name="VideoLink1" value="<?php echo $entry->VideoLink1; ?>" class="form-control">
      </div>
	  
	  	  	 <div class="form-group">
         <h4>Video Title:</h4>
         <input type="text" name="Title1" value="<?php echo $entry->Title1; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader:</h4>
         <input type="text" name="Uploader1" value="<?php echo $entry->Uploader1; ?>" class="form-control">
      </div>
	  
	  
	  </div>
	  
	  			  <h4>Video 2:</h4>

	  <div class="adminEditArticle" style="margin-left: 6rem;">
	  	    <div class="form-group">
         <h4>Video Link 2:</h4>
         <input type="text" name="VideoLink2" value="<?php echo $entry->VideoLink2; ?>" class="form-control">
      </div>
	  	 <div class="form-group">
         <h4>Video Title 2:</h4>
         <input type="text" name="Title2" value="<?php echo $entry->Title2; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader 2:</h4>
         <input type="text" name="Uploader2" value="<?php echo $entry->Uploader2; ?>" class="form-control">
      </div>
	  </div>
	  
	  			  <h4>Video 3:</h4>

	  <div class="adminEditArticle" style="margin-left: 6rem;">
	  	    <div class="form-group">
         <h4>Video Link 3:</h4>
         <input type="text" name="VideoLink3" value="<?php echo $entry->VideoLink3; ?>" class="form-control">
      </div>
	  	 <div class="form-group">
         <h4>Video Title 3:</h4>
         <input type="text" name="Title3" value="<?php echo $entry->Title3; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader 3:</h4>
         <input type="text" name="Uploader3" value="<?php echo $entry->Uploader3; ?>" class="form-control">
      </div>
	  </div>
	  
	  	  	  	 <div class="form-group">
         <h4>Tag:</h4>
         <input type="text" name="Tag" value="<?php echo $entry->Tag; ?>" class="form-control">
      </div>
	  
      <h4>Article 1:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName" value="<?php echo $entry->ArticleName; ?>" class="form-control" placeholder="ArticleName">
            </div>
         
         <div class="form-group">
               <h4>Website:</h4>
               <input type="text" name="Website" value="<?php echo $entry->Website; ?>" class="form-control" placeholder="ArticleName">
            </div>
                        
      <div class="form-group">
               <h4>Author:</h4>
               <input type="text" name="Author" value="<?php echo $entry->Author; ?>" class="form-control" placeholder="Author">
            </div>
         
            <div class="form-group">
               <h4>Year:</h4>
               <input type="text" name="Date" value="<?php echo $entry->Date; ?>" class="form-control" placeholder="Date">
            </div>
         
            <div class="form-group">
               <h4>Article Link:</h4>
               <input type="text" name="Link" value="<?php echo $entry->Link; ?>"class="form-control" placeholder="ArticleName">
            </div>
      </div>

     
      <h4>Article 2:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName2" value="<?php echo $entry->ArticleName2; ?>" class="form-control" >
            </div>

            <div class="form-group">
               <h5>Website:</h5>
               <input type="text" name="Website" value="<?php echo $entry->Website2; ?>" class="form-control" placeholder="ArticleName">
            </div>
                        
            <div class="form-group">
               <h5>Author:</h5>
               <input type="text" name="Author2" value="<?php echo $entry->Author2; ?>" class="form-control" placeholder="Author">
            </div>

            <div class="form-group">
               <h5>Year:</h5>
               <input type="text" name="Date2" value="<?php echo $entry->Date2; ?>" class="form-control" placeholder="Year">
            </div>

            <div class="form-group">
               <h5>Article Link:</h5>
               <input type="text" name="Link2" value="<?php echo $entry->Link2; ?>"class="form-control" placeholder="ArticleName">
            </div>
    </div>
    <h4>Article 3:</h4>

    <div class="adminEditArticle" style="margin-left: 6rem;">

         <div class="form-group">
            <h5>Article Name <h5>
            <input type="text" name="ArticleName3" value="<?php echo $entry->ArticleName3; ?>" class="form-control" placeholder="ArticleName">
         </div>

         <div class="form-group">
            <h5>Website:</h5>
            <input type="text" name="Website3" value="<?php echo $entry->Website3; ?>" class="form-control" placeholder="ArticleName">
         </div>
                     
         <div class="form-group">
            <h5>Author:</h5>
            <input type="text" name="Author3" value="<?php echo $entry->Author3; ?>" class="form-control" placeholder="Author">
         </div>

         <div class="form-group">
            <h5>Year:</h5>
            <input type="text" name="Date3" value="<?php echo $entry->Date3; ?>" class="form-control" placeholder="Year">
         </div>

         <div class="form-group">
            <h5>Article Link:</h5>
            <input type="text" name="Link3" value="<?php echo $entry->Link3; ?>"class="form-control" placeholder="ArticleName">
         </div>
    </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Approve</button>

      </div>

   </form>

</div>

</body>

</html>