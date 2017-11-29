<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

</div><!-- #main -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<section id="footer">
		<div class="footer-content">
			<div class="footer-company-container">
				<div class="footer-company-header">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/staff-logo.png" alt="">
				</div>
				<div class="footer-company-subheader">
					<p>Láttu starfið finna þig</p>
				</div>
				<div class="footer-company-tag">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque voluptas saepe quasi modi quisquam adipisci, odio, hic amet mollitia numquam qui dolore molestias obcaecati, dicta.
				</div>
				<div class="footer-social-media">
					<div class="footer-social-media-title">
						<p>Get Connected</p>
					</div>
					<div class="footer-social-media-icons-container">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fb-icon.png" alt="" class="footer-social-media-icon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter-icon.png" alt="" class="footer-social-media-icon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin-icon.png" alt="" class="footer-social-media-icon">
					</div>	
				</div>
			</div>

			<div class="footer-menu">
				<div class="footer-menu-wrapper">
					<div class="footer-menu-container">
						<div class="footer-menu-title">
							<p>My Account</p>
						</div>
						<div class="footer-menu-item">
							<p>Login</p>
						</div>
						<div class="footer-menu-item">
							<p>Sign Up</p>
						</div>
					</div>
					<div class="footer-menu-container footer-menu-mid">
						<div class="footer-menu-title">
							<p>Related Links</p>
						</div>
						<div class="footer-menu-item">
							<p>About Us</p>
						</div>
						<div class="footer-menu-item">
							<p>Mission</p>
						</div>
						<div class="footer-menu-item">
							<p>Vision</p>
						</div>
						<div class="footer-menu-item">
							<p>Certificates</p>
						</div>
						<div class="footer-menu-item">
							<p>Policy</p>
						</div>
					</div>
					<div class="footer-menu-container">
						<div class="footer-menu-title">
							<p>Employers</p>
						</div>
						<div class="footer-menu-item">
							<p>Registration</p>
						</div>
						<div class="footer-menu-item">
							<p>Policy</p>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-map-container">
				<div class="footer-map">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/map.png" alt="">
				</div>
				<div class="footer-map-details">
					<div class="footer-map-address">
						<p>Súðarvogur 7 Reykjavík Iceland</p>
					</div>
					<div class="footer-map-number">
						<p>555-6675 / 666-1122</p>
					</div>
					<div class="footer-map-email">
						<p>staff@staff.is</p>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-credits">
			<p>Hosting by Pinoy Web Hosting Philippines. Web Design by Websitepro Powered by BUSYBEE</p>
		</div>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>