<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Junko_Theme
 * @since Junko 1.0
 */
$junko_opt = get_option( 'junko_opt' );
?>
			<?php if(isset($junko_opt['footer_layout']) && $junko_opt['footer_layout']!=''){
				$footer_class = str_replace(' ', '-', strtolower($junko_opt['footer_layout']));
			} else {
				$footer_class = '';
			} ?>
			<div class="footer <?php echo esc_html($footer_class);?>">
				<div class="container">
					<div class="footer-inner">
						<?php
						if ( isset($junko_opt['footer_layout']) && $junko_opt['footer_layout']!="" ) { ?>
							<div class="footer-composer">
								<?php $jscomposer_templates_args = array(
									'orderby'          => 'title',
									'order'            => 'ASC',
									'post_type'        => 'templatera',
									'post_status'      => 'publish',
									'posts_per_page'   => 30,
								);
								$jscomposer_templates = get_posts( $jscomposer_templates_args );
								if(count($jscomposer_templates) > 0) {
									foreach($jscomposer_templates as $jscomposer_template){
										if($jscomposer_template->post_title == $junko_opt['footer_layout']){
											echo do_shortcode(apply_filters( 'the_content', $jscomposer_template->post_content ));
										}
									}
								} ?>
							</div>
							<?php ?>
						<?php } else { ?>
							<div class="footer-default">
								<div class="widget-copyright">
									<?php esc_html_e( "Copyright", 'junko' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>"> <?php echo get_bloginfo('name') ?></a> <?php echo date('Y') ?>. <?php esc_html_e( "All Rights Reserved", 'junko' ); ?>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div><!-- .page -->
	</div><!-- .wrapper -->
	<?php if ( isset($junko_opt['back_to_top']) && $junko_opt['back_to_top'] ) { ?>
	<div id="back-top"></div>
	<?php } ?>
	<?php wp_footer(); ?>
</body>
</html>