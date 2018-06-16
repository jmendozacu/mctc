<?php
// http://www.kodingmadesimple.com/2015/01/convert-mysql-to-json-using-php.html
    $category_id = $_GET['category_id'];
    //$category_id = 2;
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","root","webi2012") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from chapt8mismatch_topic where category_id = $category_id";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $topic_array = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $topic_array[] = $row;
    }
    echo json_encode($topic_array);

    //close the db connection
    mysqli_close($connection);
?>