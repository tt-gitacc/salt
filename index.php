<?php    
 require_once 'library.php';
    if(isset($_POST['logout'])){
        
      $var = removeall();
      if($var){
          header("Location:index.php");
      }
      else{
          echo "Error!";
      }
  
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SALT | Home</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="scriptHome.js"></script>
        <link rel="stylesheet" href="styles.css">


    </head>

    <body>

<?php if(($_SESSION["verifed"] == "1") && ($name = $_SESSION["uname"])){
      	echo "<ul class='dropdowna'>
        <li   style='float:right'>
         <a href='javascript:void(0)' class='dropbtn'>Hi, $name <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-down' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='#9E9E9E' fill='none' stroke-linecap='round' stroke-linejoin='round'>
       <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
       <line x1='12' y1='5' x2='12' y2='19' />
       <line x1='16' y1='15' x2='12' y2='19' />
       <line x1='8' y1='15' x2='12' y2='19' />
     </svg></a>
         <div class='dropdown-content'>
           <a href='sub.php'>Add new term</a>
           <a href='admin-index.php'>View or modify terms you added</a>
           <a href='Flashcards.php'>Flashcards</a>
           <a target='blank' href='instructions.html'>User Instructions</a>

          <a>
          <form method='post' action=''>
            <input id='indexLogoutBtn' type='submit' name='logout' value='Logout'>
          </form>
         </a></div>";
      //  $name = $_SESSION["uname"];
      //  echo "<a href=#>Welcome, $name!</a>";
      //     echo hi;
       

   }
   elseif (($_SESSION["verifed"] == "0") && ($name = $_SESSION["uname"])){
    echo "<ul class='dropdowna'>
    <li   style='float:right'>
     <a href='javascript:void(0)' class='dropbtn'>Hi, $name <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-down' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='#9E9E9E' fill='none' stroke-linecap='round' stroke-linejoin='round'>
   <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
   <line x1='12' y1='5' x2='12' y2='19' />
   <line x1='16' y1='15' x2='12' y2='19' />
   <line x1='8' y1='15' x2='12' y2='19' />
 </svg></a>
     <div class='dropdown-content'>
       <a>Please verify your account</a>
       <a target='blank' href='instructions.html'>User Instructions</a>


       <a>
      <form method='post' action=''>
        <input id='indexLogoutBtn' type='submit' name='logout' value='Logout'>
      </form>
      </a></div>";
  //  $name = $_SESSION["uname"];
  //  echo "<a href=#>Welcome, $name!</a>";
  //     echo hi;
   

}

   else {
	echo "<ul class='dropdowna'>
   <li   style='float:right'>
    <a href='javascript:void(0)' class='dropbtn'>Menu <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-down' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='#9E9E9E' fill='none' stroke-linecap='round' stroke-linejoin='round'>
  <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
  <line x1='12' y1='5' x2='12' y2='19' />
  <line x1='16' y1='15' x2='12' y2='19' />
  <line x1='8' y1='15' x2='12' y2='19' />
</svg></a>
    <div class='dropdown-content'>
    <a href='sub.php'>Add new term</a>

    <a href='Flashcards.php'>Flashcards</a>


    <a target='blank' href='instructions.html'>User Instructions</a></div>";
    }
      ?>


    </div>
  </li>
</ul>
      <div id="wrapper">

          <div id="indexbox1">
              <img id="homeLogo" src="images/Logo.svg">
          </div><!--end box 1-->

          
          <div id="indexbox2">
            <form autocomplete="off" id="search" method="POST" action="searchResults.php">
                        <label for="search-input"></label>
                            <input aria-label="Search" id="search-input"  list="datlist" name="term" placeholder="Search" type="search">
                            <button>
                              <svg viewbox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                <path d="M0 0h24v24H0z" fill="none">
                              </svg>
                            </button>
                        </form>
                          <div id="block">
                          </div>
            </div><!--end box 2-->
<?php
setcookie('username', 'c1', time() + (15)); // 15 sec

?>
        </div><!--End wrapper-->

          <div class="footer">
            <nav>
                <ul>
				<?php if(($_SESSION["verifed"] == "1") && ($name = $_SESSION["uname"])){

                    echo '<li><a href="browse.php">Browse</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="reports.php">Reports</a></li>
			                   <li><a>
          <form method="post" action="">
            <input id="indexLogoutBtn" type="submit" name="logout" value="Logout">
          </form>
         </a></li>';

			}

			  else{
			     echo '<li><a href="browse.php">Browse</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="reports.php">Reports</a></li>
			         <li><a href="admin-index.php">Log In</a></li>';
			   }
			   
			   ?>

                </ul>
            </nav>
          </div>    
          
          


          <script>
$(document).ready(function(){
  $("embedTag").click(function(){
    $("embeddedPDF").toggle();
  });
});
</script>
        </body>
</html>