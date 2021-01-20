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
if($status!=="yes"){
	header("Location:login.php");
}
//if($email2!=="iyacoub@asu.edu"){
//	header("Location:login.php");
//}
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

if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'Word' => $_POST['Word'], 'Definition' => $_POST['Definition'], 'PublicationName' => $_POST['PublicationName'], 
	   'NISTSourcesName' => $_POST['NISTSourcesName'], 'ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink' => $_POST['VideoLink'], 
	   
	   'VideoLink2' => $_POST['VideoLink2']
	   
	 
	   
	   ]]
	   
   );

}

  $word = $entry->Word;

   //scraped db
$collection = $manager->mydb->counter;   
if (isset($_GET['id'])) {

   //$entry2 = $collection->findOne(['Word' => $word]);
      $entry2=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);

}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   

	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   );
   }  
 $collection = $manager->mydb->network;   
if (isset($_GET['id'])) {

   //$entry33 = $collection->findOne(['Word' => $word]);
      $entry33=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);

}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   );
   
   }
   
$collection = $manager->mydb->cio;   
if (isset($_GET['id'])) {

   //$entry3 = $collection->findOne(['Word' => $word]);
      $entry3=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);

}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   ); 
   }
   $collection = $manager->mydb->vl1;   
if (isset($_GET['id'])) {

   //$entry4 = $collection->findOne(['Word' => $word]);
   $entry4=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);
}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   ); 
   }
   $collection = $manager->mydb->vl2;   
if (isset($_GET['id'])) {

   //$entry5 = $collection->findOne(['Word' => $word]);
   $entry5=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);
   
}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   ); 
   }
   $collection = $manager->mydb->vl3;   
if (isset($_GET['id'])) {

   //$entry6 = $collection->findOne(['Word' => $word]);
   $entry6=$collection->findOne(['Word' => new MongoDB\BSON\Regex('^'.$word, 'i')]);
   
}   
//$entry2 = $collection->findOne(['Word' => $entry3]);
   if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Date' => $_POST['Date'], 'Link' => $_POST['Link'],
	   
	   'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'],
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3'], 
	   'VideoLink1' => $_POST['VideoLink1'],
	   'VideoLink2' =>  $_POST['VideoLink2'],
	    'VideoLink3' => $_POST['VideoLink3'],
		  'Uploader1' => $_POST['Uploader1'],
		  		'Uploader2' => $_POST['Uploader2'],
		  'Uploader3' => $_POST['Uploader3'],
		  		  'Title1' => $_POST['Title1'],
		  		  'Title2' => $_POST['Title2'],
		  		  'Title3' => $_POST['Title3'],
	   
	   ]]
   ); 
   
 //end scraped  
   $_SESSION['success'] = "Success!";
   header("Location: admin-scrape.php");
   
   
   }

?>


<!DOCTYPE html>
<html>
<head>
   <title>Import</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <h1>Import</h1>
   <a href="admin-scrape.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h4>Your Name:</h4>
		 <input type="text" name="SubmittedBy" value="<?php echo $entry->SubmittedBy; ?>" class="form-control">
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
         <input type="text" name="VideoLink1" value="<?php echo $entry4->VideoLink1; ?>" class="form-control">
      </div>
	  
	  	  	 <div class="form-group">
         <h4>Video Title:</h4>
         <input type="text" name="Title1" value="<?php echo $entry4->Title1; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader:</h4>
         <input type="text" name="Uploader1" value="<?php echo $entry4->Uploader1; ?>" class="form-control">
      </div>
	  
	  
	  </div>
	  
	  			  <h4>Video 2:</h4>

	  <div class="adminEditArticle" style="margin-left: 6rem;">
	  	    <div class="form-group">
         <h4>Video Link 2:</h4>
         <input type="text" name="VideoLink2" value="<?php echo $entry5->VideoLink2; ?>" class="form-control">
      </div>
	  	 <div class="form-group">
         <h4>Video Title 2:</h4>
         <input type="text" name="Title2" value="<?php echo $entry5->Title2; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader 2:</h4>
         <input type="text" name="Uploader2" value="<?php echo $entry5->Uploader2; ?>" class="form-control">
      </div>
	  </div>
	  
	  			  <h4>Video 3:</h4>

	  <div class="adminEditArticle" style="margin-left: 6rem;">
	  	    <div class="form-group">
         <h4>Video Link 3:</h4>
         <input type="text" name="VideoLink3" value="<?php echo $entry6->VideoLink3; ?>" class="form-control">
      </div>
	  	 <div class="form-group">
         <h4>Video Title 3:</h4>
         <input type="text" name="Title3" value="<?php echo $entry6->Title3; ?>" class="form-control">
      </div>
	  	  	    <div class="form-group">
         <h4>Video Uploader 3:</h4>
         <input type="text" name="Uploader3" value="<?php echo $entry6->Uploader3; ?>" class="form-control">
      </div>
	  </div>
	  
	  
	  
	  	<div class="form-group">
         <h4>Tag:</h4>
         <input type="text" name="Tag" value="<?php echo $entry2->Tag; ?>" class="form-control">
      </div>
	  
      <h4>Article 1:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName" value="<?php echo $entry2->ArticleName; ?>" class="form-control" placeholder="ArticleName">
            </div>
         
         <div class="form-group">
               <h4>Website:</h4>
               <input type="text" name="Website" value="<?php echo $entry2->Website; ?>" class="form-control" placeholder="ArticleName">
            </div>
                        
      <div class="form-group">
               <h4>Author:</h4>
               <input type="text" name="Author" value="<?php echo $entry2->Author; ?>" class="form-control" placeholder="Author">
            </div>
         
            <div class="form-group">
               <h4>Year:</h4>
               <input type="text" name="Date" value="<?php echo $entry2->Date; ?>" class="form-control" placeholder="Date">
            </div>
         
            <div class="form-group">
               <h4>Article Link:</h4>
               <input type="text" name="Link" value="<?php echo $entry2->Link; ?>"class="form-control" placeholder="ArticleName">
            </div>
      </div>

     
      <h4>Article 2:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName2" value="<?php echo $entry33->ArticleName2; ?>" class="form-control" >
            </div>

            <div class="form-group">
               <h5>Website:</h5>
               <input type="text" name="Website2" value="<?php echo $entry33->Website2; ?>" class="form-control" placeholder="ArticleName">
            </div>
                        
            <div class="form-group">
               <h5>Author:</h5>
               <input type="text" name="Author2" value="<?php echo $entry33->Author2; ?>" class="form-control" placeholder="Author">
            </div>

            <div class="form-group">
               <h5>Year:</h5>
               <input type="text" name="Date2" value="<?php echo $entry33->Date2; ?>" class="form-control" placeholder="Year">
            </div>

            <div class="form-group">
               <h5>Article Link:</h5>
               <input type="text" name="Link2" value="<?php echo $entry33->Link2; ?>"class="form-control" placeholder="ArticleName">
            </div>
    </div>
    <h4>Article 3:</h4>

    <div class="adminEditArticle" style="margin-left: 6rem;">

         <div class="form-group">
            <h5>Article Name <h5>
            <input type="text" name="ArticleName3" value="<?php echo $entry3->ArticleName3; ?>" class="form-control" placeholder="ArticleName">
         </div>

         <div class="form-group">
            <h5>Website:</h5>
            <input type="text" name="Website3" value="<?php echo $entry3->Website3; ?>" class="form-control" placeholder="ArticleName">
         </div>
                     
         <div class="form-group">
            <h5>Author:</h5>
            <input type="text" name="Author3" value="<?php echo $entry3->Author3; ?>" class="form-control" placeholder="Author">
         </div>

         <div class="form-group">
            <h5>Year:</h5>
            <input type="text" name="Date3" value="<?php echo $entry3->Date3; ?>" class="form-control" placeholder="Year">
         </div>

         <div class="form-group">
            <h5>Article Link:</h5>
            <input type="text" name="Link3" value="<?php echo $entry3->Link3; ?>"class="form-control" placeholder="ArticleName">
         </div>
    </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Import to Transaction DB</button>

      </div>

   </form>

</div>

</body>

</html>