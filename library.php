<?php
    session_start();
	//
    function register($document){
        global $collection;
        $collection->insertOne($document);
        return true;
    }
    
	//creatss temporaray session variable that grabs the email address you used to log in
    function chkemail($email){
        global $collection;
        $temp = $collection->findOne(array('EmailAddress'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
	//this takes the email address
    function setsession($email){
     
       
        
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('EmailAddress'=> $email));
        $_SESSION["uname"] = $temp["FirstName"];
        $_SESSION["verifed"] = $temp["Verified"];
        $_SESSION["FlashcardWords"] = $temp["Flashcard Words"];

		$_SESSION["admin"] = $temp["Admin"];
        $_SESSION["email"] = $email;
        return true;
        
    }
    function chkLogin(){
        
        //var_dump($_SESSION);
        
        if(($_SESSION["userLoggedIn"]== 1) && ($_SESSION["verifed"] =="1")
			) {
            return true;
        }
        else{
            return false;
        }
    }
    function removeall(){
        unset($_SESSION["userLoggedIn"]);
		unset($_SESSION["admin"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        unset($_SESSION["verifed"]);
        unset($_SESSION["FlashcardWords"]);

        
        return true;
    }

?>