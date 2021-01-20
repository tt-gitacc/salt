<?php
require_once 'library.php';
	require_once 'dbconnect.php';
    if(chkLogin()){
       
        $name = $_SESSION["uname"];
		$email = $_SESSION["email"];
$collection = $manager->mydb->newusers;
$query = $collection->find(['EmailAddress'=>$email]);

foreach($query as $doc){
$status =  $doc->Admin;	
$email2= $doc->EmailAddress;

if($status=="blocked"){
	header("Location:blocked-page.php");
}	
}
	

    }
    else{
        header("Location: login.php");
    }

    if(isset($_POST['logout'])){
        
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    
    }
    $ProfFilter="anal|anus|arse|ass-fucker|assfucker|assfukka|asshole|assholes|asswhole|a_s_s|b!tch|b00bs|b17ch|b1tch|ballbag|ballsack|bastard|bestiality|bi+ch|biatch|bitch|bitcher|bitchers|bitches|bitchin|bitching|bloody|blow job|blowjob|blowjobs|boiolas|bollock|bollok|boner|boob|boobs|booobs|boooobs|booooobs|booooooobs|breasts|bunny fucker|butthole|buttmunch|buttplug|c0ck|c0cksucker|carpet muncher|cawk|chink|cl1t|clit|clitoris|clits|cnut|cock|cock-sucker|cockface|cockhead|cockmunch|cockmuncher|cocks|cocksuck |cocksucked |cocksucker|cocksucking|cocksucks |cocksuka|cocksukka|cokmuncher|coksucka|crap|cum|cummer|cumming|cums|cumshot|cunilingus|cunillingus|cunnilingus|cunt|cuntlick |cuntlicker |cuntlicking |cunts|cyalis|cyberfuc|cyberfuck |cyberfucked |cyberfucker|cyberfuckers|cyberfucking |d1ck|damn|dick|dickhead|dildo|dildos|dink|dinks|dirsa|dlck|dog-fucker|doggin|dogging|donkeyribber|doosh|duche|dyke|ejaculate|ejaculated|ejaculates |ejaculating |ejaculatings|ejaculation|ejakulate|f u c k|f u c k e r|f4nny|fag|fagging|faggitt|faggot|faggs|fagot|fagots|fags|fanny|fannyflaps|fannyfucker|fanyy|fatass|fcuk|fcuker|fcuking|feck|fecker|felching|fellate|fellatio|fingerfuck |fingerfucked |fingerfucker |fingerfuckers|fingerfucking |fingerfucks |fistfuck|fistfucked |fistfucker |fistfuckers |fistfucking |fistfuckings |fistfucks |flange|fook|fooker|fuck|fucka|fucked|fucker|fuckers|fuckhead|fuckheads|fuckin|fucking|fuckings|fuckingshitmotherfucker|fuckme |fucks|fuckwhit|fuckwit|fudge packer|fudgepacker|fuk|fuker|fukker|fukkin|fuks|fukwhit|fukwit|fux|fux0r|f_u_c_k|gangbang|gangbanged |gangbangs |gaylord|gaysex|god-dam|god-damned|goddamn|goddamned|hardcoresex |hell|heshe|hoar|hoare|hoer|homo|hore|horniest|horny|hotsex|jack-off |jackoff|jap|jerk-off |jism|jiz |jizm |jizz|kawk|knob|knobead|knobed|knobend|knobhead|knobjocky|knobjokey|kock|kondum|kondums|kum|kummer|kumming|kums|kunilingus|l3i+ch|l3itch|labia|lmfao|m0f0|m0fo|m45terbate|ma5terb8|ma5terbate|masochist|master-bate|masterb8|masterbat*|masterbat3|masterbate|masterbation|masterbations|masturbate|mo-fo|mof0|mofo|mothafuck|mothafucka|mothafuckas|mothafuckaz|mothafucked |mothafucker|mothafuckers|mothafuckin|mothafucking |mothafuckings|mothafucks|mother fucker|motherfuck|motherfucked|motherfucker|motherfuckers|motherfuckin|motherfucking|motherfuckings|motherfuckka|motherfucks|muff|mutha|muthafecker|muthafuckker|muther|mutherfucker|n1gga|n1gger|nazi|nigg3r|nigg4h|nigga|niggah|niggas|niggaz|nigger|niggers |nob jokey|nobhead|nobjocky|nobjokey|numbnuts|nutsack|orgasim |orgasims |orgasm|orgasms |p0rn|pawn|pecker|penis|penisfucker|phonesex|phuck|phuk|phuked|phuking|phukked|phukking|phuks|phuq|pigfucker|pimpis|piss|pissed|pisser|pissers|pisses |pissflaps|pissin |pissing|pissoff |poop|porn|porno|pornography|pornos|prick|pricks |pusse|pussi|pussies|pussy|pussys |rectum|retard|rimjaw|rimming|s.o.b.|sadist|schlong|screwing|scroat|scrote|scrotum|semen|sex|sh!+|sh!t|sh1t|shag|shagger|shaggin|shagging|shemale|shi+|shit|shitdick|shite|shited|shitey|shitfuck|shitfull|shithead|shiting|shitings|shits|shitted|shitter|shitters |shitting|shittings|shitty |skank|slut|sluts|smegma|smut|snatch|son-of-a-bitch|spac|spunk|s_h_i_t|t1tt1e5|t1tties|teets|teez|testical|testicle|titfuck|tittie5|tittiefucker|titties|tittyfuck|tittywank|titwank|tosser|turd|tw4t|twat|twathead|twatty|twunt|twunter|v14gra|v1gra|vagina|viagra|vulva|w00se|wang|wank|wanker|wanky|whoar|whore|willies|willy|xrated|xxx";

	include_once('header.php');
    if(isset($_POST['submit'])){

        if(preg_match("($ProfFilter)", $_POST['SubmittedBy']) === 1
         || (preg_match("($ProfFilter)", $_POST['Word']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Definition']) === 1)
         || (preg_match("($ProfFilter)", $_POST['PublicationName']) === 1)
         || (preg_match("($ProfFilter)", $_POST['NISTSourcesName']) === 1)
     
         || (preg_match("($ProfFilter)", $_POST['ArticleName']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Website']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Author']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Date']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Link']) === 1)
    
         || (preg_match("($ProfFilter)", $_POST['Uploader1']) === 1)
         || (preg_match("($ProfFilter)", $_POST['Title1']) === 1)
         || (preg_match("($ProfFilter)", $_POST['VideoLink1']) === 1)
    
     
         ) { 
            $SubmittedByND= filter_input(INPUT_POST, 'SubmittedBy', FILTER_SANITIZE_STRING);
            $WordND= filter_input(INPUT_POST, 'Word', FILTER_SANITIZE_STRING);
            $DefinitionND= filter_input(INPUT_POST, 'Definition', FILTER_SANITIZE_STRING);
            $PublicationNameND= filter_input(INPUT_POST, 'PublicationName', FILTER_SANITIZE_STRING);
            $NISTSourcesNameND= filter_input(INPUT_POST, 'NISTSourcesName', FILTER_SANITIZE_STRING);
            $ArticleNameND= filter_input(INPUT_POST, 'ArticleName', FILTER_SANITIZE_STRING);
            $WebsiteND= filter_input(INPUT_POST, 'Website', FILTER_SANITIZE_STRING);
            $AuthorND= filter_input(INPUT_POST, 'Author', FILTER_SANITIZE_STRING);
            $DateND= filter_input(INPUT_POST, 'Date', FILTER_SANITIZE_STRING);
            $LinkND= filter_input(INPUT_POST, 'Link', FILTER_SANITIZE_STRING);
            $Uploader1ND= filter_input(INPUT_POST, 'Uploader1', FILTER_SANITIZE_STRING);
            $Title1ND= filter_input(INPUT_POST, 'Title1', FILTER_SANITIZE_STRING);
            $VideoLink1ND= filter_input(INPUT_POST, 'VideoLink1', FILTER_SANITIZE_STRING);     
            $prof="Profanity Detected";
    //  header('Refresh: 1; URL=https://saltapplication.azurewebsites.net/index.php');
     // echo "profanity...";
        }
        else { 
	

            //extract what was sent to the server
            $SubmittedBy= filter_input(INPUT_POST, 'SubmittedBy', FILTER_SANITIZE_STRING);
            $Word= filter_input(INPUT_POST, 'Word', FILTER_SANITIZE_STRING);
            $Definition= filter_input(INPUT_POST, 'Definition', FILTER_SANITIZE_STRING);
            $PublicationName= filter_input(INPUT_POST, 'PublicationName', FILTER_SANITIZE_STRING);
            $NISTSourcesName= filter_input(INPUT_POST, 'NISTSourcesName', FILTER_SANITIZE_STRING);
            $ArticleName= filter_input(INPUT_POST, 'ArticleName', FILTER_SANITIZE_STRING);
            $Website= filter_input(INPUT_POST, 'Website', FILTER_SANITIZE_STRING);
            $Author= filter_input(INPUT_POST, 'Author', FILTER_SANITIZE_STRING);
            $Date= filter_input(INPUT_POST, 'Date', FILTER_SANITIZE_STRING);
            $Link= filter_input(INPUT_POST, 'Link', FILTER_SANITIZE_STRING);
            $Uploader1= filter_input(INPUT_POST, 'Uploader1', FILTER_SANITIZE_STRING);
            $Title1= filter_input(INPUT_POST, 'Title1', FILTER_SANITIZE_STRING);
            $VideoLink1= filter_input(INPUT_POST, 'VideoLink1', FILTER_SANITIZE_STRING);
            
            
            //$myId = random_int(0,80005);
            $myId = uniqid();
            $myDate = date("Y-m-d");
            
            
            //convert to an array in php
            $submission = [
            "_id" => "$myId",
            "SubmittedBy" => "$SubmittedBy",
            "Word" => "$Word",
            "Definition" => "$Definition",
            "PublicationName" => "$PublicationName",
            "NISTSourcesName" => "$NISTSourcesName",
            "ArticleName" => "$ArticleName",
            "Website" => "$Website",
            "Author" => "$Author",
            "Date" => "$Date",
            "Link" => "$Link",
            "Uploader1" => "$Uploader1",
            "Title1" => "$Title1",
            "VideoLink1" => "$VideoLink1",
            
            
            "SubmissionDate" => "$myDate", 
            "Status" => "New"
            ];
            
            
            $collection = $manager->mydb->approved;
            $query = $collection->findOne( [ 'Word' => new MongoDB\BSON\Regex('^'.$Word, 'i')]);
            //foreach($query as $doc){
            //$q12 = $doc->Word;
            //echo $q12;
            
            
            if(!empty($query)) {
                $prof="Word Already Exists";

                  }
            
            else{
            //add to db
            $collection = $manager->mydb->words;
            $add2 = $collection->insertOne($submission);
            
            
            //echo the result at the end
            if($add2->getInsertedCount()==1){
                        // echo 'Success! Your word has been submitted.';
                        $successMsg="Success! Your word has been submitted.";
                        header('Refresh: 1; URL=https://saltapplication.azurewebsites.net/index.php');
                    }
                    else {
                        echo 'Error, please re-submit ';
                    }
            }
            }
                }
?>
<!DOCTYPE html>
<html id="submithtml">
    <head>
        <title>Submit a word</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
        <script type="text/javascript" src="script.js"></script>

    </head>
<body id="browseBody">


  <div id="innerwrapper">
  <div class="row">
    <div class="py-4 offset-md-0 col-lg-12 justify-content-center align-items-center">
        <form method="POST">
        <div class="form-row">
            <div class="form-group col-md">
                <label for="submitName" class="required">*Your Name:</label>
                <input class="form-control"  value="<?php echo $name; ?>" type="text" id="submitName" name="SubmittedBy"  required="required" />
            </div>

            <div class="form-group col-md">
                <label for="submitWord" class="required">*Word:</label>
                <input class="form-control" type="text" id="submitWord" name="Word" value="<?php echo $WordND; ?>" required="required" />
            </div>
        </div>
        <div class="form-group">
            <label for="submitDefinition" class="required">*Definition:</label>
            <textarea type="text" id="submitDefinition" name="Definition" required="required" class="form-control"><?php echo $DefinitionND; ?></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="submitPublicationName" >Publication Name:</label>
                <input class="form-control"  type="text" id="submitPublicationName" value="<?php echo $PublicationNameND; ?>" name="PublicationName"/>
            </div>
            <div class="form-group col-md-3">
                <label for="submitNISTSource">NIST Source:</label>
                <input class="form-control"  type="text" id="submitNISTSource" value="<?php echo $NISTSourcesNameND; ?>" name="NISTSourcesName"/>
            </div>
        </div>








        <span class="badge badge-primary">Article</span>
        <div class="form-row">
        
            <div class="form-group col-md-3">
            
                <label for="submitArticleName">Article Title:</label>
                <input class="form-control"  type="text" id="submitArticleName" name="ArticleName" value="<?php echo $ArticleNameND; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="submitArticleWebsite" >Article Website:</label>
                <input class="form-control"  type="text" id="submitArticleWebsite" name="Website" value="<?php echo $WebsiteND; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="submitArticleAuthor">Article Author:</label>
                <input class="form-control"  type="text" id="submitArticleAuthor" name="Author" value="<?php echo $AuthorND; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label for="submiteArticleDate">Year:</label>
                <input class="form-control"  type="number" id="submiteArticleDate" name="Date" value="<?php echo $DateND; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="submitArticleLink1">Article Link:</label>
            <input type="text" id="submitArticleLink1" name="Link" value="<?php echo $LinkND; ?>" class="form-control">
        </div>

        <span class="badge badge-info">Video</span>
        
            
            <div class="form-group">
                <label for="VideoLink" >Video Link:</label>
                <input class="form-control" type="text" id="VideoLink" value="<?php echo $VideoLink1ND; ?>" name="VideoLink1"/>
            </div>

            



        <div class="form-row">
            <button type="submit" name ="submit"  class="btn btn-primary">Submit Word</button>
            <span id="errorMsg" class="text-danger"><?php echo $prof?></span>
            <span id="errorMsg" class="text-success"><?php echo $successMsg?></span>

        </div>

        </div>
    </div>
    
    </div><!--End wrapper-->


</div>

<script>

setTimeout(function(){
     $('#errorMsg').remove();
},3000);
</script>
</body>
</html>