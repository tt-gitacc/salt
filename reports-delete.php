<?php
require 'dbconnect.php';

$collection = $manager->mydb->reports;
$collection->deleteOne(['_id' => ($_GET['id'])]);
echo "Report Deleted";
header('Refresh: .5; URL=https://saltapplication.azurewebsites.net/admin-reports.php');


?>