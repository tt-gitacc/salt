<?php
require_once 'library.php';
require_once 'dbconnect.php';
  if(chkLogin()){
     
      $name = $_SESSION["uname"];
      echo "Welcome, $name!";
$collection = $manager->mydb->newusers;
$query = $collection->find(['FirstName'=>$name]);

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
$collection = $manager->mydb->reports;
include_once('header.php');
$today = date("F j, Y"); 

if(isset($_POST['submit'])){
   
   $myId = uniqid();
   
   $insertOneResult = $collection->insertOne([
    '_id' => "$myId",
    'ReportAuthor' => $_POST['ReportAuthor'],
    'ReportTitle' => $_POST['ReportTitle'],
    'ReportLink1' => $_POST['ReportLink1'],
    'ReportLink2' => $_POST['ReportLink2'],

    'ReportText' => $_POST['Definition'],
    'ReportDatePosted' =>"$today"


   ]);




}
echo $today;
?>
<!DOCTYPE html>
    <head>
    <title>SALT | Create Report</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    </head>
    <body id="browseBody">
<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<div id="innerwrapper">

<!-- Create the toolbar container -->


<form method="POST">

<div class="form-group">
         <Label>Author:</Label>
         <input type="text" name="ReportAuthor"  class="form-control" placeholder="Report Author">
      </div>
	  
	    <div class="form-group">
      <Label>Title:</Label>
         <input type="text" name="ReportTitle"  class="form-control" placeholder="Report Title">
         </div>
	    <div class="form-group">
        <Label>Link 1:</Label>
        <input type="text" name="ReportLink1"  class="form-control" placeholder="Link 1 | Please include HTTPS://, like so: https://www.nist.gov/">
    </div>





<div class="container">
  <div id="quillEditor">
  </div>
</div>

<pre style="display:none;" id="myPrecious"></pre>

<div  style="display:none;" id="justText"></div>




<!-- <textarea id="justHtml" name="text"></textarea> -->
<textarea style="display:none;" id="justHtml" type="text" name="Definition"  style="min-width: 100%" rows="5" class="form-control" placeholder="Definition"></textarea>

<button type="submit" name="submit" class="btn btn-success">Submit</button>

</form>
</div>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
// Another way of initializing quill with options, will get into those later
// Let's just get our precious content out....

var options = {
  placeholder: 'Please type here..',
  theme: 'snow'
};

var editor = new Quill('#quillEditor', options);
var preciousContent = document.getElementById('myPrecious');
var justTextContent = document.getElementById('justText');
var justHtmlContent = document.getElementById('justHtml');
var limit = 144;

editor.on('text-change', function (delta, old, source) {
  if (editor.getLength() > limit) {
    editor.deleteText(limit, editor.getLength());
  }
});
editor.on('text-change', function() {
  var delta = editor.getContents();
  var text = editor.getText();
  var justHtml = editor.root.innerHTML;
  preciousContent.innerHTML = JSON.stringify(delta);
  justTextContent.innerHTML = text;
  justHtmlContent.innerHTML = justHtml;
});

// Further Reading:
//https://quilljs.com/guides/working-with-deltas/
//https://github.com/quilljs/quill/issues/774
</script>
</body>
</html>