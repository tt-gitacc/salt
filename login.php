<?php
include_once('header.php');

    require_once 'library.php';
	error_reporting(E_ALL ^ E_NOTICE);

    if(chkLogin()){
		//all I did on 11/4 was re-direct to index
        header("Location: index.php");
    }
?>
<html id="submithtml">
    <head>
        <title>Salt | Log In</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </head>
<body id="browseBody">


  <div id="innerwrapper">
    
      <h4>Login</h4>

            <form class="form-horizontal" method="post" action="login_action.php">
			<div class="admin-container">
                    <label class="sr-only" for="uname">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" required>
					
					<br>
					
                    <label class="sr-only" for="psw">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="pass" placeholder="Password" required>
					
                <button id="admin-loginbtn" type="submit" name="login">Sign in</button>
				
						 Not a member? <a href="register.php">Click here to register</a>
						 
						        </div>
 
 
				
            </form>
			
			 <form class="admin-container" method="post" action="recovery.php">					
                <button id="" type="submit" name="forgot">Forgot Password?</button>
				
						 
						        </div>
				
            </form>
			
			
			
        </div>
		</div>
    </body>
</html>