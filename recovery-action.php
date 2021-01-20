<?php require_once 'dbconnect.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(chkLogin()){
        header("Location: admin-home.php");
    }
?>
<?php
$collection = $manager->mydb->newusers;
$myId = uniqid();
$myDate = date("Y-m-d");
$vdkey2= md5(time());


  if(isset($_POST['rec'])){
   $sendemail = $_POST['email'];


   //$query = array('$text' => array('$search'=> $term));
   $cursor = $collection->findOneAndUpdate(['EmailAddress' => $sendemail],
         ['$set' => ['RecoveryKey' => $vdkey2]
         
         ]
      );
      $email = "YOUR-SENDGRID-USERNAME";
      $name = "SALT - Security Awareness Library Tool";
      $body = "<h3>Did you request to change your password? If so, please click the link and enter your verification key.</h3>
      <br><p>https://saltapplication.azurewebsites.net/new-reg.php?vkey=$vdkey2</p>
      <br>Your verification key is $vdkey2";
      $subject = "SALT | Did you request to change your password?";
  
      $headers = array(
          'Authorization: Bearer YOUR-SENDGRID-API-KEY',
          'Content-Type: application/json'
      );
  
      $data = array(
          "personalizations" => array(
              array(
                  "to" => array(
                      array(
                          "email" => $sendemail
                      )
                  )
              )
          ),
          "from" => array(
              "email" => "SENDGRID-EMAIL",
              "name" => $name 
          ),
          "subject" => $subject,
          "content" => array(
              array(
                  "type" => "text/html",
                  "value" => $body
              )
          )
      );
  
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($ch);
      curl_close($ch);
  
      echo $response;
      header("Location: SuccessfulEmailReg.php");

      
         }

?>