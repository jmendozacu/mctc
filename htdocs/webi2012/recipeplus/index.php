<?php require_once("header.php"); ?>
            <div class="section row video-cover" id="home">
                <h1 class="video-h1">Home Page Index Page</h1>
                <video width="100%" height="auto" autoplay="autoplay" muted="" preload="auto" data-setup="" loop="">
                     <source src="assets/food.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </header>
        <main class="container">
            <div class="row">
                <section>
                    <section class="col s12 m12 l9">
                        <div class="col s12 m12 l12">
                            <div id="feature" class="card card-item horizontal">
                                <div class="card-image">
                                    <img src="img/sm/s35.jpg" class="responsive-img" alt="">
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <h5>Featured Recipe</h5>
                                        <p>I am a very simple card. I am good at containing small bits of information.</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">Duck Confit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        // Get categories for nav menu
                        $query = 'SELECT * from categories order by categoryID';
                        $categories_menu = $db->query( $query );

                        foreach ( $categories_menu as $category_menu ) :
                            $category_id = $category_menu['categoryID'];
                            ?>

                        <div class="col s12 m6 l4 item-<?php ?>">
                            <div class="card card-item">
                                <div class="card-image">
                                    <a href="items.php?category_id=<?php echo $category_id['categoryID']; ?>">
                                        <img src="sm_images/<?php echo $category_id['categoryID']; ?>.jpg" class="responsive-img" alt="<?php echo $category_menu['categoryName']; ?>">
                                    </a>
                                </div><!-- .card-image -->
                                <div class="card-action">
                                    <a href="items.php?category_id=<?php echo $category_menu['categoryID']; ?>"><?php echo $category_menu['categoryName']; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </section>
                    <aside class="col s12 m12 l3">
                        <div class="col s12 m6 l12">
                            <div class="card card-item">
                                <div class="card-image">
                                    <img src="img/ad.jpg" class="responsive-img" alt="">
                                </div>
                            </div>
                        </div>
                    </aside>
                </section>
            </div><!-- container -->
        </main><!-- section -->
    <?php require_once("footer.php"); ?>