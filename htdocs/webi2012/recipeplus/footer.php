
<div class="footer-top">
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <section class="col s12 m6 l2 footer-menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Chefs</a></li>
                    <li><a href="">Recipes</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </section>
            <section class="col s12 m6 l2 footer-menu">
                <ul>
                    <li><a href="">Breakfast</a></li>
                    <li><a href="">Lunch</a></li>
                    <li><a href="">Dinner</a></li>
                    <li><a href="">Dessert</a></li>
                    <li><a href="">Anytime</a></li>
                    <li><a href="">Tips'n'Tricks</a></li>
                </ul>
            </section>
            <section class="col s12 m6 l8">
                <div class="col s12 m12 l12">
                    <a href="index.php"><img src="img/header-logo.png" alt=""></a>
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                </div>
                <div class="col s12 m12 l12">
                    <ul class="social-menu">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest-square fa-3x" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-flickr fa-3x" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div><!-- .footer-social-menu -->
        </div>
        </section>
    </div><!-- row -->
    </div><!-- container -->
</footer>
</div><!-- container-full -->
<script>
    jQuery(document).ready(function() {

        if( jQuery( window ).width() <= 749 ) {
            $("#feature").removeClass("horizontal");
        }
        else if( jQuery( window ).width() >= 750 ) {
            featureImage.addClass("horizontal");
        }
        // Materialize Dropdown Menu on Navigation Bar
        $(".dropdown-button").dropdown();
    });
</script>
</body>
</html>