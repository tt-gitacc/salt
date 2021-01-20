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
if(isset($_POST['reg'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sendemail = $_POST['email'];
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
        $vdkey= md5(time());


        $arrays = array(
            
            "FirstName"    => $fname,
            "LastName"     => $lname,
            "EmailAddress" => $sendemail,
            "Password"      => $pass,
            "VerificationKey" => $vdkey,
            "Verified" => "0",
			"_id" => $myId,
            "RegisterDate" => $myDate

        
        );
        
    $query = chkemail($sendemail);
    if($query){
        register($arrays);
        $email = "YOUR-SENDGRID-USERNAME-GOES-HERE";
        $name = "SALT - Security Awareness Library Tool";
        $body = "<h3>Please click the link below to complete the SALT verification process</h3>
		<br><p>link/verify.php?vkey=$vdkey</p>";
        $subject = "SALT | Please verify your account";
    
        $headers = array(
            'Authorization: Bearer YOUR-SENDGRID-API-KEY-GOES-HERE',
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
                    "email" => "sendgrid-email",
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
       else{
        echo "Email already registered!";
           echo"<br>";
        echo "Please <a href='register.php'>Register</a> with another email address";
       }
}

?>