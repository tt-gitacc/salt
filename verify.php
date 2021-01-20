<?php 
require_once 'dbconnect.php'; 

$collection = $manager->mydb->newusers;

if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];


    $filterOption = ["VerificationKey" => "$vkey"];
$updateOption = ["Verified" => "1"];

$result2 = $collection->updateOne(['VerificationKey' => "$vkey"],
                    [ '$set' => [ 'Verified' => "1" ]]
);
if($result2){
    header("Location: ThankYou.php");

}else {
    echo "Something went wrong, please contact an admin";
}
} ?>