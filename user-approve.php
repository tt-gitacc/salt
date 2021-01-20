<?php
require 'dbconnect.php';
session_start();
$collection = $manager->mydb->newusers;



if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => ($_GET['id'])]);
}
$collection = $manager->mydb->administrators;
if(isset($_POST['submit'])){

   
      $collection->insertOne([
		'_id' => ($_GET['id']),
	   'username' => $_POST['username']
	   
	   

   ]);
   
   //$collection = $manager->mydb->newusers;
   //$collection->deleteOne(['_id' => ($_GET['id'])]);

   
   $_SESSION['success'] = "Success!";
}
?>


<!DOCTYPE html>
<html>
<head>
   <title>Admin GUI</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <h1>Approve</h1>
   <a href="admin-users.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h4>Username</h4>
		 <input type="text" name="username" value="<?php echo $entry->username; ?>" class="form-control" class="form-control" placeholder="username">
      </div>


      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Approve</button>

      </div>

   </form>

</div>

</body>

</html>