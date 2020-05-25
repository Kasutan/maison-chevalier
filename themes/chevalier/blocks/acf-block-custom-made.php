<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'chevalier_acf_block_custom_acf_init' );
function chevalier_acf_block_custom_acf_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'acf-custom',
			'title'           => 'Bloc Custom Made 5 pictos',
			'description'     => 'Bloc Custom Made avec un image de fond, titre, texte et 5 pictos',
			'render_callback' => 'chevalier_custom_callback',
			'category'        => 'chevalier',
			'icon'            => 'format-gallery',
			'mode'			=> "edit",
			'supports' => array( 
				'mode' => false,
				'align'=>false,
			),
			'keywords'        => [ 'image', 'chevalier', 'custom', 'picto'],
		] );
	}
}

function chevalier_custom_callback( $block ) {
	if( !function_exists("get_field")) {
		return '';
	}
	if(array_key_exists('className',$block)) {
		$className=esc_attr($block["className"]);
	} else $className='';


	$image_id=esc_attr( get_field('image') );
	$titre=remove_accents(strip_tags(wp_kses_post( get_field('titre') ),'<br><em><strong>'));
	$texte=wp_kses_post( get_field('texte') );
	printf('<section class="acf-block-custom acf-block-avec-fond alignfull %s"><div class="image-container">%s</div>',
		$className,
		wp_get_attachment_image( $image_id,'large' )
	);
	if($titre || $texte) {
		echo '<div class="texte-container">';
			if($titre) {
				printf('<h2 class="titre">%s</h2>',$titre);
			}
			if($texte) {
				printf('<div class="texte">%s</div>',$texte);
			}
		echo '</div>'; //fin texte-container
	}
	
	if( have_rows('pictos') ):
		echo '<div class="pictos">';

		while ( have_rows('pictos') ) : the_row();
			echo '<div class="picto">';
				printf('<div class="picto-container">%s</div>',
					wp_get_attachment_image(esc_attr(get_sub_field('picto')))
				);
				printf('<h3>%s</h3>',wp_kses_post( get_sub_field('titre')));
				echo wp_kses_post(get_sub_field('texte'));
			echo '</div>';
		endwhile;

		echo '</div>'; //fin pictos

	endif;
	echo '</section>';

}