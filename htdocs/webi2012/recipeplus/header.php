<?php require_once( 'database.php' );

// Get categories for nav menu
$query = 'SELECT * from categories order by categoryID';
$categories_menu = $db->query( $query );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.min.js"></script>
    <script src="materialize-src/js/bin/materialize.min.js"></script>
</head>
<body>
<div class="container-full">
    <header class="col s12 m6 l6 header">
        <div class="container">
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <?php

                foreach ( $categories_menu as $category_menu ) : ?>

                    <li><a href="items.php?category_id=<?php echo $category_menu['categoryID']; ?>"><?php echo $category_menu['categoryName']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <nav>
                <div class="nav-wrapper">
                    <!-- <a href="#" class="brand-logo"><img src="img/header-logo.png" height="auto" width="80%" alt=""></a> -->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Home</a></li>
                        <!-- Dropdown Trigger -->
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Recipes<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div><!-- .nav-wrapper -->
            </nav><!-- nav -->
        </div><!-- .container -->