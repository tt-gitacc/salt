
<?php 
    require_once 'library.php';
    if(chkLogin()){
        header("Location: admin-home.php");
    }
include_once('header.php');

?>

<html id="submithtml"> 
   <head>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<h1 id="registrationText">Registration</h1>
<form class="form-horizontal" action="register_action.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">First Name*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="fname" placeholder="First Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Last Name*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="lname" placeholder="Last Name" required>
            </div>
          </div>    
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ASU Email*</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" name="email" required pattern="(\W|^)[\w.+\-]*@asu\.edu(\W|$)" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password* </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="pass" name="pass" pattern=".{8,}" placeholder="8 Characters Minimum" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputCpassword3" class="col-sm-2 control-label">Confirm Password*</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="cpass" name="cpass" onblur="chk()" placeholder="Confirm Password" required>
            <div id="error"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" name="reg">Sign Up</button>
            </div>
          </div>
        </form>
        <script src="myscript.js" type="text/javascript"></script>
        </div>
    </body>
</html>