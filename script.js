//Getting value from "ajax.php".
 
function fill(Value) {
 
    //Assigning value to "search" div in "search.php" file.
  
    $('#search-input').val(Value);
  
    //Hiding "display" div in "search.php" file.
  
    $('#block').hide();
    // $("#block").css({"border":  "none"});

  
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
                        $("#block").css({"border":  "none"});

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
                    $("#block").css({"border-bottom":  "1px solid black", "border-right":  "1px solid black", "border-left":  "1px solid black"});

                    $("#search svg").css({"border-radius":  "0 17px 0  0", "border-bottom": "black 1px solid"});
              
                }
            
  
            });
  
        }
  
    });
    if ($('#search-input').focusout(function() { 
    

        setTimeout(function() {
                 $('#block').hide();
        $("#search-input").css({"border-radius":  "25px 0 0 25px"});
                    $("#search svg").css({"border-radius":  "0 25px 25px  0"});
           }, 300);
      }));
 });