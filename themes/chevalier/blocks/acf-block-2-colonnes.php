<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'chevalier_acf_block_2_colonnes_acf_init' );
function chevalier_acf_block_2_colonnes_acf_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'acf-2-colonnes',
			'title'           => 'Bloc 2 colonnes avec image et texte',
			'description'     => 'Bloc 2 colonnes avec image (obligatoire), titre, texte et chiffre (optionnels), disposition alternée image à droite ou à gauche.',
			'render_callback' => 'chevalier_2_colonnes_callback',
			'category'        => 'chevalier',
			'icon'            => 'analytics',
			'mode'			=> "edit",
			'supports' => array( 
				'mode' => false,
				'align'=>false
			),
			'keywords'        => [ 'colonne', 'chevalier'],
		] );
	}
}

function chevalier_2_colonnes_callback( $block ) {
	if( !function_exists("get_field")) {
		return '';
	}
	if(array_key_exists('className',$block)) {
		$className=esc_attr($block["className"]);
	} else $className='';


	$image_id=wp_kses_post( get_field('image') );
	$titre=wp_kses_post( get_field('titre') );
	$texte=wp_kses_post( get_field('texte') );
	$chiffre=wp_kses_post( get_field('chiffre') );
	printf('<section class="acf-block-deux-colonnes %s"><div class="image-container">%s</div>',
		$className,
		wp_get_attachment_image( $image_id,'medium' )
	);
		echo '<div class="texte-container">';
			if($titre) {
				printf('<h2 class="titre">%s</h2>',$titre);
			}
			if($texte) {
				printf('<div class="texte">%s</div>',$texte);
			}
			echo '<div class="decor">';
				if($chiffre) {
					printf('<div class="chiffre">%s</div>',$chiffre);
				}
				echo '<svg xmlns="http://www.w3.org/2000/svg" width="379" height="104" viewBox="0 0 379 104"><g><g opacity=".1"><path fill="#020304" d="M9.656 2.406c5.334 0 9.657 4.337 9.657 9.688 0 5.35-4.323 9.687-9.657 9.687C4.323 21.781 0 17.444 0 12.094s4.323-9.688 9.656-9.688zM190.72 26.594c5.333 0 9.656 4.337 9.656 9.687s-4.323 9.688-9.656 9.688-9.656-4.337-9.656-9.688c0-5.35 4.323-9.687 9.656-9.687zM270.375 0c5.333 0 9.656 4.33 9.656 9.672 0 5.342-4.323 9.672-9.656 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm16.906 84.656c5.333 0 9.657 4.33 9.657 9.672 0 5.342-4.324 9.672-9.657 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm-62.78 0c5.332 0 9.656 4.33 9.656 9.672 0 5.342-4.324 9.672-9.657 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm144.843-60.469c5.333 0 9.656 4.33 9.656 9.673 0 5.341-4.323 9.671-9.656 9.671s-9.656-4.33-9.656-9.671c0-5.342 4.323-9.673 9.656-9.673z"/></g></g></svg>';
			echo '</div>'; //fin decor
		echo '</div>'; //fin texte-container
	echo '</section>'; //fin block

}