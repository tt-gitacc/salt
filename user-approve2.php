<?php
session_start();

require 'dbconnect.php';
$collection = $manager->mydb->newusers;

if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => ($_GET['id'])]);
}


$ID = $_GET['id'];

$result2 = $collection->updateOne(['_id' => $ID],
					[ '$set' => [ 'Admin' => "yes" ]]
);


			echo 'Success! This user has been approved.';


?>


