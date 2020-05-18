<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chevalier
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			chevalier_post_thumbnail();
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				chevalier_posted_on();
				chevalier_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php chevalier_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_excerpt();
		echo '<a href="<?php the_permalink();?>" class="read-more-link">Lire la suite<span class="screen-reader-text">'.get_the_title().'</span></a>';
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php chevalier_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
