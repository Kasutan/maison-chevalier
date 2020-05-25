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
		<?php
			the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				the_date('', 'Publié le ');
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php
		the_excerpt();
		echo '<a href="<?php the_permalink();?>" class="read-more-link">Lire la suite<span class="screen-reader-text">'.get_the_title().'</span></a>';
		?>
</article><!-- #post-<?php the_ID(); ?> -->
