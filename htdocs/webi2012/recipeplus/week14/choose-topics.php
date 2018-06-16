<!DOCTYPE html>
<html>
<head>


</head>
<body>

	<form id="categories" action="display-topics.php" method="get">
	<select name="category_id" id="category_id">
	<?php

	//  $dbc = mysqli_connect('database url', 'username', 'pw', 'database')
	$dbc = mysqli_connect('localhost', 'root', 'root', 'webi2012') or die('Error connecting to MySQL server.');

	$query = "SELECT * FROM chapt8mismatch_category order by name";
	$result = mysqli_query($dbc, $query) or die('Error querying database.');

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
	<input type="submit" value="Get Topics">
	</form>


</body>
</html>
