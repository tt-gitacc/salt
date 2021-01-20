<?php 
require_once 'dbconnect.php';
//require_once 'library.php';


$collection = $manager->mydb->newusers;


 




if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $vdkey2 = $_REQUEST['vdkey2'];
   
   


//$cursor = $collection->findOneAndUpdate(['EmailAddress' => $term],
	
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
		
 //$pass = $_POST['pass'];




$query=$collection->findOneAndUpdate(['RecoveryKey' => $vdkey2],
	   ['$set' => ['Password' => $pass]
	   
	   ]
   );
/*   
foreach ($query as $doc) {
$FirstName = $doc->FirstName;
echo "Welcome, $FirstName!";
}
*/	
if($query){

   header("Location:Success.php");
}
//
else{
	echo "Your recovery key is invalid";
}

}








?>
<html>
<head>
</head>
<body>
<?php 
//$collection = $manager->mydb->newusers;
//$query=$collection->findOneAndUpdate(['RecoveryKey' => $vdkey2]);
?>
<!---
<form method="post" action="new-reg-action.php">
Please enter your new password: <input type="text" name="pass" id="pass"><br><br>
<input type="submit">
-->

</body>
</html>