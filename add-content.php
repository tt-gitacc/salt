<?php
//include libraries
require __DIR__ . '/vendor/autoload.php';

//db connection
require 'dbconnect.php';
$ProfFilter="anal|anus|arse|ass-fucker|assfucker|assfukka|asshole|assholes|asswhole|a_s_s|b!tch|b00bs|b17ch|b1tch|ballbag|ballsack|bastard|bestiality|bi+ch|biatch|bitch|bitcher|bitchers|bitches|bitchin|bitching|bloody|blow job|blowjob|blowjobs|boiolas|bollock|bollok|boner|boob|boobs|booobs|boooobs|booooobs|booooooobs|breasts|bunny fucker|butthole|buttmunch|buttplug|c0ck|c0cksucker|carpet muncher|cawk|chink|cl1t|clit|clitoris|clits|cnut|cock|cock-sucker|cockface|cockhead|cockmunch|cockmuncher|cocks|cocksuck |cocksucked |cocksucker|cocksucking|cocksucks |cocksuka|cocksukka|cokmuncher|coksucka|crap|cum|cummer|cumming|cums|cumshot|cunilingus|cunillingus|cunnilingus|cunt|cuntlick |cuntlicker |cuntlicking |cunts|cyalis|cyberfuc|cyberfuck |cyberfucked |cyberfucker|cyberfuckers|cyberfucking |d1ck|damn|dick|dickhead|dildo|dildos|dink|dinks|dirsa|dlck|dog-fucker|doggin|dogging|donkeyribber|doosh|duche|dyke|ejaculate|ejaculated|ejaculates |ejaculating |ejaculatings|ejaculation|ejakulate|f u c k|f u c k e r|f4nny|fag|fagging|faggitt|faggot|faggs|fagot|fagots|fags|fanny|fannyflaps|fannyfucker|fanyy|fatass|fcuk|fcuker|fcuking|feck|fecker|felching|fellate|fellatio|fingerfuck |fingerfucked |fingerfucker |fingerfuckers|fingerfucking |fingerfucks |fistfuck|fistfucked |fistfucker |fistfuckers |fistfucking |fistfuckings |fistfucks |flange|fook|fooker|fuck|fucka|fucked|fucker|fuckers|fuckhead|fuckheads|fuckin|fucking|fuckings|fuckingshitmotherfucker|fuckme |fucks|fuckwhit|fuckwit|fudge packer|fudgepacker|fuk|fuker|fukker|fukkin|fuks|fukwhit|fukwit|fux|fux0r|f_u_c_k|gangbang|gangbanged |gangbangs |gaylord|gaysex|god-dam|god-damned|goddamn|goddamned|hardcoresex |hell|heshe|hoar|hoare|hoer|homo|hore|horniest|horny|hotsex|jack-off |jackoff|jap|jerk-off |jism|jiz |jizm |jizz|kawk|knob|knobead|knobed|knobend|knobhead|knobjocky|knobjokey|kock|kondum|kondums|kum|kummer|kumming|kums|kunilingus|l3i+ch|l3itch|labia|lmfao|m0f0|m0fo|m45terbate|ma5terb8|ma5terbate|masochist|master-bate|masterb8|masterbat*|masterbat3|masterbate|masterbation|masterbations|masturbate|mo-fo|mof0|mofo|mothafuck|mothafucka|mothafuckas|mothafuckaz|mothafucked |mothafucker|mothafuckers|mothafuckin|mothafucking |mothafuckings|mothafucks|mother fucker|motherfuck|motherfucked|motherfucker|motherfuckers|motherfuckin|motherfucking|motherfuckings|motherfuckka|motherfucks|muff|mutha|muthafecker|muthafuckker|muther|mutherfucker|n1gga|n1gger|nazi|nigg3r|nigg4h|nigga|niggah|niggas|niggaz|nigger|niggers |nob jokey|nobhead|nobjocky|nobjokey|numbnuts|nutsack|orgasim |orgasims |orgasm|orgasms |p0rn|pawn|pecker|penis|penisfucker|phonesex|phuck|phuk|phuked|phuking|phukked|phukking|phuks|phuq|pigfucker|pimpis|piss|pissed|pisser|pissers|pisses |pissflaps|pissin |pissing|pissoff |poop|porn|porno|pornography|pornos|prick|pricks |pusse|pussi|pussies|pussy|pussys |rectum|retard|rimjaw|rimming|s.o.b.|sadist|schlong|screwing|scroat|scrote|scrotum|semen|sex|sh!+|sh!t|sh1t|shag|shagger|shaggin|shagging|shemale|shi+|shit|shitdick|shite|shited|shitey|shitfuck|shitfull|shithead|shiting|shitings|shits|shitted|shitter|shitters |shitting|shittings|shitty |skank|slut|sluts|smegma|smut|snatch|son-of-a-bitch|spac|spunk|s_h_i_t|t1tt1e5|t1tties|teets|teez|testical|testicle|titfuck|tittie5|tittiefucker|titties|tittyfuck|tittywank|titwank|tosser|turd|tw4t|twat|twathead|twatty|twunt|twunter|v14gra|v1gra|vagina|viagra|vulva|w00se|wang|wank|wanker|wanky|whoar|whore|willies|willy|xrated|xxx";

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

 $prof="Profanity Detected";
 echo $prof;
 header('Refresh: 1; URL=https://saltapplication.azurewebsites.net/index.php');
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
         echo 'Word Already Exists';
      }

else{
//add to db
$collection = $manager->mydb->words;
$add2 = $collection->insertOne($submission);


//echo the result at the end
if($add2->getInsertedCount()==1){
			echo 'Success! Your word has been submitted.';
			header('Refresh: 1; URL=https://saltapplication.azurewebsites.net/index.php');
		}
		else {
			echo 'Error, please re-submit ';
		}
}
}
	}