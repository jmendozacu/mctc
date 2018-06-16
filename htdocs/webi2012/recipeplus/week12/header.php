<?php

require_once( 'database.php' );

// Get categories for nav menu
$query = 'SELECT * from categories order by categoryName';
$categories_menu = $db->query( $query );
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PM Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/custom.css" rel="stylesheet" media="screen">
</head>
<body>
<!-- col-lg-offset-2 col-md-offset-1 -->
<div id="wrapper" class="container">

	<div class="row">
		<aside class="col-lg-4 col-md-4">
			<header class="col-lg-offset-2 col-md-offset-1">
				<img src="images/logo.png" width="253" height="104" alt="picturemat logo">
			</header>

			<!—- header.php form -—>

			<form method="get" action="search-results.php"  class="col-lg-offset-2 col-md-offset-1 search">
				<input type="text" id="usersearch" name="usersearch">
				<input type="submit" name="submit" value="Search">
			</form>

			<p class="col-lg-offset-2 col-md-offset-1 hidden-sm hidden-xs">
				DO MORE! with the new
				GUNNAR F1 HYBRID.
				The award-winning GUNNAR F1
				HYBRID is the world first "hybrid" CMC,
				and the result of GUNNAR's long
				industry experience and track record
				as "pioneers" of the framing industry.
			</p>
			<div class="col-lg-offset-2 col-md-offset-1 hidden-sm hidden-xs">
				<img src="images/gunnar_cutter.jpg" width="220" height="176" alt="gunnar cutter">
			</div>
			<div class="col-lg-offset-2 col-md-offset-1 hidden-sm hidden-xs">
				<img src="images/gunnar_logo.gif" width="207" height="45" alt="gunnar logo">
			</div>
		</aside>
		<div id="main" class="col-lg-8 col-md-8">
			<!-- start mobile nav -->
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- <a class="navbar-brand" href="#">PictuerMat.com</a> -->
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
								<li><a href="#">About</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mats <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<?php

										foreach ( $categories_menu as $category_menu ) : ?>

											<li><a href="items.php?category_id=<?php echo $category_menu['categoryID']; ?>"><?php echo $category_menu['categoryName']; ?></a></li>
											<?php if ( $categories_menu == "" ) {
												echo "Couldn't connect";
											}
											?>
										<?php endforeach; ?>
										<!-- <li><a href="#">dark blue</a></li>
										<li><a href="items.php">light blue</a></li>
										<li><a href="#">white</a></li>
										<li><a href="#">dark green</a></li> -->
									</ul>
								</li>
								<li><a href="#">Mat Cutting</a></li>
								<li><a href="#">Framing</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>




