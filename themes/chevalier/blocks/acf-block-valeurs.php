<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'chevalier_acf_block_valeurs_acf_init' );
function chevalier_acf_block_valeurs_acf_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'acf-valeurs',
			'title'           => 'Bloc Valeurs 2 colonnes',
			'description'     => 'Bloc Valeurs avec un image de fond, titre, texte et 2 colonnes de contenu',
			'render_callback' => 'chevalier_valeurs_callback',
			'category'        => 'chevalier',
			'icon'            => 'format-gallery',
			'mode'			=> "edit",
			'supports' => array( 
				'mode' => false,
				'align'=>false,
			),
			'keywords'        => [ 'image', 'chevalier', 'valeur', 'colonne'],
		] );
	}
}

function chevalier_valeurs_callback( $block ) {
	if( !function_exists("get_field")) {
		return '';
	}
	if(array_key_exists('className',$block)) {
		$className=esc_attr($block["className"]);
	} else $className='';


	$image_id=esc_attr( get_field('image') );
	$titre=strip_tags(wp_kses_post( get_field('titre') ),'<br><em><strong>');
	$texte=wp_kses_post( get_field('texte') );
	$colonne_gauche=wp_kses_post( get_field('colonne_gauche') );
	$colonne_droite=wp_kses_post( get_field('colonne_droite') );

	printf('<section class="acf-block-valeurs acf-block-avec-fond alignfull %s"><div class="image-container">%s</div>',
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
	
	if( $colonne_gauche || $colonne_droite ):
		printf('<div class="colonnes"><div class="colonne">%s</div><div class="colonne">%s</div></div>', 
			$colonne_gauche,
			$colonne_droite
		);

	endif;
	echo '</section>';

}