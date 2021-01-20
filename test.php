<!DOCTYPE html>
<html>
    <head>
        <title>SALT</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">

        
    </head>

    <body>
      <div id="wrapper">

          <div id="indexbox1">
              <img id="homeLogo" src="images/Logo.svg">
          </div><!--end box 1-->

          
          <div id="indexbox2">
            <form autocomplete="off" id="search" method="POST" action="jdeltest.php">
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

        </div><!--End wrapper-->

          <div class="footer">
            <nav>
                <ul>
                    <li><a href="browse.php">Browse</a></li>
	<!--about us and reports deleted temporarily-->
                    <li><a href="admin-login.html">Log In</a></li>
                </ul>
            </nav>
          </div>    
          



        </body>
</html>