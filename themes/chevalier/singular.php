<?php
/**
 * The template for displaying all pages and posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chevalier
 */

get_header();
?>

<main id="main" class="site-main">
<?php
	while ( have_posts() ) :
		the_post();
		if(function_exists('chevalier_page_avec_banniere') && chevalier_page_avec_banniere()) :
			the_title( '<h1 class="page-title screen-reader-text">', '</h1>' );
		else : ?>

			<header class="entry-header">
				
				<?php the_title( '<h1 class="page-title">', '</h1>' );?>
				<?php if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						chevalier_posted_on();
						chevalier_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

		<?php endif;?>

		<div class="entry-content container">
			<?php
			the_content();
			?>
		</div><!-- .entry-content -->

		<?php	
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_footer();
