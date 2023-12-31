<?php
/**
 * Template Name: Front Page Template
 *
 * Description: Front Page Template
 *
 * @package WordPress
 * @subpackage Junko
 * @since Junko 1.0
 */

$junko_opt = get_option( 'junko_opt' );
get_header();
?>
<div class="main-container front-page">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>