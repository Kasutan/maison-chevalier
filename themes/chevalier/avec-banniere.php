<?php
/**
* Template Name: Avec bannière
*/

get_header();
?>

	<main id="main" class="site-main">
	<?php
		while ( have_posts() ) :
			the_post();
			?>

		<div class="entry-content">
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
