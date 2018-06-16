			<?php require_once('header.php');

				$product_id = $_GET['product_id'];

				$products = $db->prepare('SELECT * FROM categories INNER JOIN products on categories.categoryID = products.categoryID WHERE productID = :product_id');
				$products->execute(array(':product_id' => $product_id));

				$product = $products->fetch(); ?>
		</div><!-- .header .col .s12 .m6 .l6 -->
		<div class="row">
			<div class="container">
				<div class="col s12 m12 l12 card">
                    <div class="card-image">
                        <div class="feature-img col s12 m12 l12" style="background-image: url('lg_images/<?php echo $product['productID']; ?>.<?php echo $product['file_ext']; ?>');" width="100%" height="auto" ">
                        <h1 class="center-text"><?php echo $product['productName']; ?></h1>
                    </div>

                    </div><!-- feature-img col s12 m12 l12 margin-left-10 -->
                    <div class="col s12 m4 l5 ingredient-col">
                        <h2 class="item-header">Ingredients</h2>
                    </div><!-- .col .s12 .m4 .l5 -->
                    <div class="col s12 m8 l7 description">
                        <h2 class="item-header">Description</h2>
                        <p>
                            <?php echo $product['description']; ?>
                            <!-- <a class="btn btn-primary" href="items.php?category_id=<?php echo $product['categoryID']; ?>">Back to <?php $product['categoryName']; ?></a> -->
                        </p>
                    </div>
						<?php if (isset($usersearch)) {

							echo '<a class="btn back-btn" href="search-results.php?usersearch=' . $usersearch . '&sort=' . $sort . '&page=' . $page .  '">back to search results</a>';
						} else {
							echo '<a class="btn back-btn" href="items.php?category_id=' . $product['categoryID'] . '">back to color ' . $product['categoryName'] . '</a>';
						}?>
				</div><!-- .col .s12 .m12 .l12 -->
			</div> <!-- .container  -->
		</div> <!-- .row  -->
        <script>
            jQuery(document).ready(function() {
                var ingList = jQuery(".description ol");
                var ingCol = jQuery(".ingredient-col");
                ingCol.append(ingList);
            });
        </script>
		<?php require_once('footer.php');