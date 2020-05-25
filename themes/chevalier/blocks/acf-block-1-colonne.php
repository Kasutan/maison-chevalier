<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'chevalier_acf_block_1_colonne_acf_init' );
function chevalier_acf_block_1_colonne_acf_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
			'name'            => 'acf-1-colonne',
			'title'           => 'Bloc 1 colonne avec texte sur fond gris',
			'description'     => 'Bloc 1 colonne centrée avec texte sur fond gris, avec décor.',
			'render_callback' => 'chevalier_1_colonne_callback',
			'category'        => 'chevalier',
			'icon'            => 'media-text',
			'mode'			=> "edit",
			'supports' => array( 
				'mode' => false,
				'align'=> false
			),
			'keywords'        => [ 'colonne', 'chevalier'],
		] );
	}
}

function chevalier_1_colonne_callback( $block ) {
	if( !function_exists("get_field")) {
		return '';
	}
	$className='';

	if(array_key_exists('className',$block)) {
		$className=esc_attr($block["className"]);
	}


	$titre=remove_accents(wp_kses_post( get_field('titre') ));
	$texte=wp_kses_post( get_field('texte') );

	printf('<section class="acf-block-une-colonne alignfull %s">',$className);
		echo '<div class="spacer"></div>';
		echo '<div class="texte-container">';
			if($titre) {
				printf('<h2 class="titre">%s</h2>',$titre);
			}
			if($texte) {
				printf('<div class="texte">%s</div>',$texte);
			}
		echo '</div>'; //fin texte-container  

		echo '<div class="decor">';
			
			echo '<svg xmlns="http://www.w3.org/2000/svg" width="379" height="104" viewBox="0 0 379 104"><g><g opacity=".1"><path fill="#020304" d="M9.656 2.406c5.334 0 9.657 4.337 9.657 9.688 0 5.35-4.323 9.687-9.657 9.687C4.323 21.781 0 17.444 0 12.094s4.323-9.688 9.656-9.688zM190.72 26.594c5.333 0 9.656 4.337 9.656 9.687s-4.323 9.688-9.656 9.688-9.656-4.337-9.656-9.688c0-5.35 4.323-9.687 9.656-9.687zM270.375 0c5.333 0 9.656 4.33 9.656 9.672 0 5.342-4.323 9.672-9.656 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm16.906 84.656c5.333 0 9.657 4.33 9.657 9.672 0 5.342-4.324 9.672-9.657 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm-62.78 0c5.332 0 9.656 4.33 9.656 9.672 0 5.342-4.324 9.672-9.657 9.672s-9.656-4.33-9.656-9.672c0-5.342 4.323-9.672 9.656-9.672zm144.843-60.469c5.333 0 9.656 4.33 9.656 9.673 0 5.341-4.323 9.671-9.656 9.671s-9.656-4.33-9.656-9.671c0-5.342 4.323-9.673 9.656-9.673z"/></g></g></svg>';
		echo '</div>'; //fin decor
	echo '</section>'; //fin block

}