<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
			
				<span class="ft_site-title"></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> day #<span id="ft_age"></span>
				<br />
				t = <span id="ft_current_time"></span><br />
				(changing the world one second at a time for the last <span id="ft_num_days_alive"></span> seconds)

			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<!-- Corey Roadcap customized script to display a hard count of time i've been on earth -->
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
	var now = new Date();
	var current_time = now.toLocaleTimeString();
	var my_bday = new Date(1991,4,24,8,30,0);
	var time_diff_ms = Math.abs(now.getTime() - my_bday.getTime());
	var time_diff_s = Math.floor(time_diff_ms / 1000);
	var time_diff_d = dateDiffInDays(my_bday, now);
	
	
	document.getElementById("ft_current_time").innerHTML = current_time;
	document.getElementById("ft_num_days_alive").innerHTML = time_diff_s;
	document.getElementById("ft_age").innerHTML = time_diff_d;
}

var _MS_PER_DAY = 1000 * 60 * 60 * 24;

// a and b are javascript Date objects
function dateDiffInDays(a, b) {
  	// Discard the time and time-zone information.
  	var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
  	var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

  	return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}
</script>

<?php wp_footer(); ?>
</body>
</html>
