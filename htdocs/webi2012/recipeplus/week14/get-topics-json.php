<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
// http://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_ajax_getjson
$(document).ready(function(){
    $("#category_id").change(function(){
        // clear the #topics div of previous data
    	$( "#topics" ).empty();
        // get the id of the selected topic category from the select menu
    	var category_id = 'category_id=' + $(this).val(); 
        // make the ajax call using .getJSON function.
        //  $.getJSON("script", inputdata, callbackfunction);
        $.getJSON("get-json-data.php", category_id, showTopics); 
    }); // end change event
        // this is the callback function that runs after json data is returned from the script
        function showTopics(result){
			// i is the name of the object and field is the value of the object
			// See MM Javascript/jQuery 3rd editon page 482 for explanation
	        $.each(result, function(i, field){
	            $("#topics").append(field.name + "<br>");
	        });
         } // end showTopics
}); // end ready
</script>
</head>
<body>

<form id="categories" method="get">
<select name="category_id" id="category_id">
<?php

//  $dbc = mysqli_connect('database url', 'username', 'pw', 'database')
  $dbc = mysqli_connect('localhost', 'root', 'root', 'webi2012')
    or die('Error connecting to MySQL server.');

 $query = "SELECT * FROM chapt8mismatch_category order by name";
  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');


  /*
mysqli_fetch_array
Returns an array of strings that corresponds to the fetched row.
NULL if there are no more rows in result-set

  */

	while ($row = mysqli_fetch_array($result)){
	    $category_id = $row['category_id'];
	    $category = $row['name'];

	    echo "<option value='$category_id'>$category</option>";
	}



  mysqli_close($dbc);

?>
</select>
    
</form>
<div id="topics"></div>
<img src="friends.jpg" width="250">
</body>
</html>
