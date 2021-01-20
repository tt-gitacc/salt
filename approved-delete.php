<?php
session_start();
require 'dbconnect.php';
	  $collection = $manager->mydb->approved;

$collection->deleteOne(['_id' => ($_GET['id'])]);
$_SESSION['success'] = "Word has been deleted";
header("Location: approved-index.php");

?>