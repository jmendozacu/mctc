<?php require('header.php'); ?>
<?php require('functions.php'); ?>
<?php
// Grab the sort setting and search keywords from the URL using GET
$sort = $_GET['sort'];
$user_search = $_GET['usersearch'];

// Calculate pagination information
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1; // If no paging has occured, set page to 1.
$results_per_page = 5;  // number of results per page
$skip = (($cur_page - 1) * $results_per_page); // skip pages based on the users paging progress.

// Start generating the table of results
echo '<section>';
echo '<table border="0" cellpadding="2">';

// Generate the search result headings
echo '<tr class="heading">';
//  CN generate_sort_links function creates clickable header links for sorting data.
echo generate_sort_links($user_search, $sort);
echo '</tr>';

// Connect to the database
require_once('database.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Query to get the total results
$query = build_query($user_search, $sort);
$result = mysqli_query($dbc, $query);
$total = mysqli_num_rows($result);
// CN The ceil() function rounds a number UP to the nearest integer, if necessary.
$num_pages = ceil($total / $results_per_page);

// Query again to get just the subset of results
// CN Query is modified to show correct 5 records.
// Limit filters results string lengths based on the 2 numbers provided.
// See http://www.mysqltutorial.org/mysql-limit.aspx for Limit example
$query =  $query . " LIMIT $skip, $results_per_page";
$result = mysqli_query($dbc, $query);

//usersearch=text&sort=&page=2


while ($row = mysqli_fetch_array($result)) {
	echo '<tr class="results">';
	echo '<td valign="top" width="20%"><a href="item.php?product_id=' . $row['productID'] . '&usersearch=' . $user_search . '&sort=' . $sort . '&page=' . $cur_page .  '">' . $row['productName'] . '</a></td>';
	// trim description to 100 characters using substr function
	echo '<td valign="top" width="50%">' . substr($row['description'], 0, 100) . '...</td>';
	echo '<td valign="top" width="10%">' . $row['listPrice'] . '</td>';
	echo '<td valign="top" width="10%"><img src="sm_images/' . $row['productID'] . '.' . $row['file_ext'] . '" width="125" height="125" class="margin-left-10">';
	echo '</tr>';
}
echo '</table>';
echo '</section>';

// Generate navigational page links if we have more than one page
if ($num_pages > 1) {
	echo generate_page_links($user_search, $sort, $cur_page, $num_pages);
}

mysqli_close($dbc);
?>

			</div> <!-- end div main  -->
		</div> <!-- end div row  --> 
<?php require('footer.php'); ?>	