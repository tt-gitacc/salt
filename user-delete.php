<?php
require 'dbconnect.php';

$collection = $manager->mydb->newusers;
$collection->deleteOne(['_id' => ($_GET['id'])]);
echo "User has been deleted.";


?>