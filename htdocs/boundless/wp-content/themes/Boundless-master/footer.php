<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boundless
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="logo">
		<img src="<?php echo get_template_directory_uri() ?>/images/logos/logo-main-white.png" alt="">
	</div>
	<div class="left">


		<ul class="links">
			<li><a href="">Portfolio</a></li>
			<li><a href="">Show</a></li>
			<li><a href="">Press</a></li>
			<li>


				<div class="modal">
					<label for="modal-1">
						<a class="modal-trigger">Contact</a>
					</label>
					<input class="modal-state" id="modal-1" type="checkbox"/>
					<div class="modal-fade-screen">
						<div class="modal-inner">
							<div class="modal-close" for="modal-1"></div>
							<h4>Contact Us</h4>
							<p class="modal-intro">
								Please use our contact form for any questions or comments regarding the Boundless
								Portfolio Show.</p>
							<!--							<p class="modal-content">Body text lorem ipsum dolor ipsum dolor sit sit possimus amet, consectetur adipisicing elit. Itaque, placeat, explicabo, veniam quos aperiam molestias eriam molestias molestiae suscipit ipsum enim quasi sit possimus quod atque nobis voluptas earum odit accusamus quibusdam. Body text lorem ipsum dolor ipsum dolor sit sit possimus amet.</p>-->

							<form action="">
								<input type="text" placeholder="name">
								<label for=""></label>

								<input type="text" placeholder="email">
								<label for=""></label>

								<input type="text" placeholder="phone">
								<label for=""></label>


								<textarea name="" id="" placeholder="message"></textarea>
							</form>

						</div>
					</div>
				</div>

			</li>


		</ul>

		<ul class="social">
			<li><a href="https://www.facebook.com/boundlessdesignshow/" target="_blank">
					<i class="fa fa-facebook fa-2x"></i>
				</a></li>
			<li><a href="https://twitter.com/boundlessMCTC" target="_blank">
					<i class="fa fa-twitter fa-2x"></i>
				</a></li>
			<li><a href="https://www.instagram.com/boundlessdesignshow/" target="_blank">
					<i class="fa fa-instagram fa-2x"></i>
				</a></li>
			<li><a href="https://www.snapchat.com/add/mctcportfolio17" target="_blank">
					<i class="fa fa-snapchat-ghost fa-2x" aria-hidden="true"></i>
				</a></li>
		</ul>



	</div>
	<div class="right">
		<div class="site-info">
			&copy; 2017 Boundless, MCTC Graduate Design Show<br>
		</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>