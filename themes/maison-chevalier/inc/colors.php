<?php
/**
 * Register Custom color palette for Gutenberg editor
 *
 * Should be the colors from css/colors.css.
 *
 * @package chevalier
 */

add_theme_support( 'editor-color-palette', array(
	
	array(
		'name'  =>'Bleu',
		'slug'  => 'bleu',
		'color'	=> '#283b6b',
	),
	array(
		'name'  =>'Noir texte',
		'slug'  => 'noir-texte',
		'color'	=> '#070809',
	),
	array(
		'name'  =>'Gris texte',
		'slug'  => 'gris-texte',
		'color'	=> '#f9f9f9',
	),
	array(
		'name'  =>'Noir fond',
		'slug'  => 'noir-fond',
		'color'	=> '#020304',
	),
	array(
		'name'  =>'Gris fond',
		'slug'  => 'gris-fond',
		'color'	=> '#f9f9fb',
	),
	array(
		'name'  =>'Beige',
		'slug'  => 'beige',
		'color'	=> '#e8e3e1',
	),
	array(
		'name'  =>'Blanc',
		'slug'  => 'blanc',
		'color'	=> '#ffffff',
	),
));