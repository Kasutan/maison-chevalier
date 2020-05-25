<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'chevalier_acf_block_banniere_acf_init' );
function chevalier_acf_block_banniere_acf_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'acf-banniere',
			'title'           => 'Bloc bannière avec titre',
			'description'     => 'Bloc bannière avec image, texte en sur-impression, texte en dessous et grand titre, à placer en haut de la page. Ce bloc ne peut être inséré qu\'une fois par page.',
			'render_callback' => 'chevalier_banniere_callback',
			'category'        => 'chevalier',
			'icon'            => 'format-image',
			'mode'			=> "edit",
			'supports' => array( 
				'mode' => false,
				'align'=>false,
				'multiple'=>false 
			),
			'keywords'        => [ 'image', 'chevalier', 'banniere' , 'titre' ],
		] );
	}
}

function chevalier_banniere_callback( $block ) {
	if( !function_exists("get_field")) {
		return '';
	}
	if(array_key_exists('className',$block)) {
		$className=esc_attr($block["className"]);
	} else $className='';


	$image_id=wp_kses_post( get_field('image') );
	$titre=remove_accents(wp_kses_post( get_field('titre') ));
	$texte=remove_accents(wp_kses_post( get_field('texte') ));
	$intro=wp_kses_post( get_field('intro') );
	printf('<header class="acf-block-banniere alignfull %s"><div class="banniere-container"><div class="image-container">%s</div>',
		$className,
		wp_get_attachment_image( $image_id,'large' )
	);
	if($texte) {
		printf('<div class="texte h1">%s</div>',$texte);
	}
	echo "</div>"; //banniere-container

	if($intro) {
		printf('<div class="intro">%s</div>',$intro);
	}
	if($titre) {
		printf('<div class="titre h1">%s</div>',$titre);
	}
	echo '</header>';

}