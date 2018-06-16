			<?php require_once('header.php');
				/* start paging vars */
				$usersearch = isset($_GET['usersearch']) ? $_GET['usersearch'] : null;
				$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
				$page = isset($_GET['page']) ? $_GET['page'] : '';
				/* end paging vars*/

				$product_id = $_GET['product_id'];

				$products = $db->prepare('SELECT * FROM categories INNER JOIN products on categories.categoryID = products.categoryID WHERE productID = product_id');
				$products->execute( array( 'product_id' => $product_id ) );
				$product_name = $product_row['productName'];

				$products->fetch();

				foreach ( $products as $product ) : ?>
				<section>
					<h1>Mat Title > <?php echo $product['categoryName']; ?> > <?php echo $product['productName']; ?></h1>
					<div class="mat">
					<img src="mats/<?php echo $product['productID']; ?>.<?php echo $product['file_ext']; ?>" width="200" height="200" class="margin-left-10">
					<strong>Product:</strong> <?php echo $product['productName']; ?><br>
					<strong>Product No:</strong> <?php echo $product['productCode']; ?><br>
					<strong>Price:</strong> <?php echo $product['productPrice']; ?> sq/ft<br>
					<strong>Description:</strong>
					<p>
						<?php echo $product['description']; ?>
						<!-- <a class="btn btn-primary" href="items.php?category_id=<?php echo $product['categoryID']; ?>">Back to <?php $product['categoryName']; ?></a> -->
					</p>
						<?php if (isset($usersearch)) {

							echo '<a class="btn btn-primary" href="search-results.php?usersearch=' . $usersearch . '&sort=' . $sort . '&page=' . $page .  '">back to search results</a>';
						} else {
							echo '<a class="btn btn-primary" href="items.php?category_id=' . $product['categoryID'] . '">back to color ' . $product['categoryName'] . '</a>';
						}?>
					</div>
				<?php endforeach; ?>
				</section>
			</div> <!-- end div main  -->
		</div> <!-- end div row  -->
		<?php require_once('footer.php');