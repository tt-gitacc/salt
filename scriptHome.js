// var x = document.getElementById("hide").value;
// x.addEventListener('click', myFunction);
// function myFunction(e) {

//     $('.dropdown4').show();

//     $('.dropdown').hide();


//    e.stopPropagation();

//   }


  ////////////////////////////////


  //Getting value from "ajax.php".
  
  function fill(Value) {
 
    //Assigning value to "search" div in "search.php" file.
  
    $('#search-input').val(Value);
  
    //Hiding "display" div in "search.php" file.
  
    $('#block').hide();
  
 }

 $(document).ready(function() {

    //On pressing a key on "Search box" in "search.php" file. This function will be called.
  
    $("#search-input").keyup(function() {
  
        //Assigning search box value to javascript variable named as "name".
  
        var name = $('#search-input').val();
  
        //Validating, if "name" is empty.

        if (name == "") {
  
            //Assigning empty value to "display" div in "search.php" file.
            
            $("#block").html("");
                      $("#search-input").css({"border-radius":  "25px 0 0 25px"});
                    $("#search svg").css({"border-radius":  "0 25px 25px  0"});
        }
  
        //If the name is not empty.

        else {
            
            //AJAX is called.
  
            $.ajax({
  
                //AJAX type is "Post".
  
                type: "POST",
  
                //Data will be sent to "ajax.php".
  
                url: "ajax.php",
  
                //Data, that will be sent to "ajax.php".
  
                data: {
  
                    //Assigning value of "name" into "search" variable.
  
                    search: name
  
                },
  
                //If result found, this function will be called.
  
                success: function(html) {
  
                    //Assigning result to "display" div in "search.php" file.
  
                    $("#block").html(html).show();
                    $("#search-input").css({"border-radius":  "17px 0 0 0", "border-bottom": "black 1px solid"});
                    
                    $("#search svg").css({"border-radius":  "0 17px 0  0", "border-bottom": "black 1px solid"});
                    
                }

                
            });
  
        }
  
    });
  //////
 });




//Working//
// $(document).ajaxComplete(function() {
//     // var x = document.querySelector(".hide");
//     // x.addEventListener('click', myFunction);
//     // function myFunction() {
//             $('#block > ul').click(function () {
//         // alert("hiiii")
//                 $(this).find('li').hide();
        
//             });
        
//     //   });
// });
//end working//

// $(document).ready(function() {

// $(document).ajaxComplete(function() {
//     // $('ul').trigger('click');
//     $('#block > .testyy').click(function () {
        
//         // $(this).find('.dropdown4:hidden').show().css({"display": "block"});
//         // $('.dropdown').toggle();
//         // // $('svg').css({"display": "hidden"});
//         // $(this).siblings().toggle();

//         // $(this).find('.dropdown4:visible').hide();
//         if ( $($(this).find('.dropdown4')).css('display') == 'none')
//         {
//             $(this).find('.dropdown4').show().css({"display": "block"});
//             $('.dropdown').hide();
//             $(this).siblings().hide();

//             $("#block > span > svg").css({"z-index":"999999999999",  "margin-top": "8px","margin-top": "8px","margin-right": "60px","position": "relative", " -webkit-transform": "scaleX(-1)", "transform": "scaleX(-1)"});

            
//         }
//         else {
//             $(this).find('.dropdown4').hide().css({"display": "none"});
//             $('.dropdown').show();
//             $(this).siblings().show();
//             $("#block > span > svg").css({"position": "absolute", " -webkit-transform": "scaleX(1)", "transform": "scaleX(1)"});
//         }
//     });

    
// });
// });

// $(document).ready(function() {

// if ($('.dropdown4').css('display') == 'none')
// {
//     $(this).find('.dropdown4').show().css({"display": "block"});
//     $('.dropdown').hide();
//     // $(this).siblings().hide();
// }
// else {
//     $(this).find('.dropdown4').hide().css({"display": "block"});
//     $('.dropdown').show();
//     // $(this).siblings().show();
// }
// });

// $(document).ajaxComplete(function() {
//     // $('ul').trigger('click');
//     $('#block > .testyy').click(function () {

//         $(this).find('.dropdown4').hide();
//         $('.dropdown').show();
//         $(this).siblings().show();

//     });

// });
//Working//
// $(document).ajaxComplete(function() {
//     var x = document.querySelector(".hide");
//     x.addEventListener('click', myFunction);
//     function myFunction(e) {
//         // alert("I am an alert box!");
//         // x.not(this).removeClass('clicked');    
//         // $('.dropdown').not(this).removeClass('dropdown4');
//         // if (1==1){alert("hi");}
//        $('.dropdown4').show();
//        $(".dropdown4").css({"display": "block"});

//         // $(this).parent().next(".dropdown4").toggle();
//         // var qa = document.getElementById("hide").val;
//         $('.dropdown').hide();
//         // alert("value is", qa);

    
//     //    e.stopPropagation();
    
//       }
// });
//end working//















// $(document).ajaxComplete(function() {
    // jQuery(document).ready(function(){
    //     jQuery(':button').click(function () {
    //       if (this.id == 'click') {
    //           alert('this button was clicked');
    //       }
    //       else if (this.id == 'button2') {
    //           alert('Button 2 was clicked');
    //       }
    //   });
    //   });
   

//     var x = document.querySelector(".hide");
//     x.addEventListener('click', myFunction);
//     var y = $(".hide").attr('name');


//         alert(y);
   
//     function myFunction(e) {
//         alert("I am an alert box!");
//         x.not(this).removeClass('clicked');    
//         $('.dropdown').not(this).removeClass('dropdown4');
//         if (1==1){alert("hi");}
//        $('.dropdown4').show();
//        $(".dropdown4").css({"display": "block"});

//         $(this).parent().next(".dropdown4").toggle();
//         var qa = document.getElementById("hide").val;
//         $('.dropdown').hide();
//         alert("value is", qa);

    
//        e.stopPropagation();
    
//       }
// });