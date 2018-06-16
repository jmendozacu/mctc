<?php
    $category_id = $_GET['category_id'];
    //$category_id = 2;
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","root","webi2012") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from chapt8mismatch_topic where category_id = $category_id";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    // $topic_array = array();
    // while($row =mysqli_fetch_assoc($result))
    // {
    //    echo "<div>$category</div>";
    // }
    
	while ($row = mysqli_fetch_array($result)){
		$category_id = $row['category_id'];
		$category = $row['name'];
		echo "<div>$category_id $category</div>";
    }

    //close the db connection
    mysqli_close($connection);

    echo "<img src='friends.jpg' width='250'>";
?>