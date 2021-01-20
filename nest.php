<?php
//db connection
      require 'dbconnect.php';
	  
//replace counter with scrape
$collection = $manager->mydb->counter;
    $pipeline = array(

        array(
//db.ra4.aggregate([
    {$unwind:"$morestuff"},
    {$project:{
        _id:1,
	    Word: 1,
        BookYear: 1,
	    BookTitle: 1,
	    BookAuthor: 1,
	    ArticleName: '$morestuff.ArticleName',
	    Website: '$morestuff.Website',
	    Author: '$morestuff.Author',
	    Date: '$morestuff.Date',
	    Link: '$morestuff.Link',

}}, { $out : "ra6" }
]);