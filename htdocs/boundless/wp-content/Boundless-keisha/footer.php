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
		</main>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="left">
			contact us
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

		<div class="right">
			<ul class="links">
				<li><a href="">Portfolio</a></li>
				<li><a href="">Show</a></li>
				<li><a href="">Press</a></li>
			</ul>

			<ul class="social">
				<li><a href="">Facebook</a></li>
				<li><a href="">Twitter</a></li>
				<li><a href="">Instagram</a></li>
				<li><a href="">Snapchat</a></li>
			</ul>


		<div class="site-info">
			&copy; 2017 Boundless, MCTC Graduate Design Show<br>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'boundless' ) ); ?>">
				<?php printf( esc_html__( 'Proudly powered by %s', 'boundless' ), 'WordPress' ); ?>
			</a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'boundless' ), 'boundless', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
