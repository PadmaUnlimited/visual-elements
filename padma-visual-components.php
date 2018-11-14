<?php

/*
Plugin Name: Padma Visual Components
Plugin URI: https://www.padmaunlimited.com/plugins/visual-components
Description: Integration plugin between Shortcodes Ultimate and Padma Unlimited theme
Version: 0.0.1
Author: Padma Unlimited team
Author URI: https://www.padmaunlimited.com
License: GNU GPL v2
*/

add_action('after_setup_theme', 'register_visual_components_block');
function register_visual_components_block() {

    if ( !class_exists('Padma') )
		return;


	if (!class_exists('PadmaBlockAPI') )
		return false;

	if(!class_exists('Shortcodes_Ultimate'))
			return false;

	/**
	 *
	 * Register components as blocks
	 *
	 */
	
	require_once 'blocks/divider.php';
	require_once 'blocks/heading.php';
	require_once 'blocks/spacer.php';

	
	padma_register_block('PadmaVisualComponentsBlockDivider', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualComponentsBlockHeading', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualComponentsBlockSpacer', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}


/**
 *
 * Request Shortcodes Ultimate plugin
 *
 */
add_action('after_setup_theme', 'padma_visual_components_activate');
function padma_visual_components_activate(){

	if ( ! current_user_can( 'activate_plugins' ) )
		return;


	if ( ! class_exists('Padma'))
		return;


	$plugins = array(
		array(
			'name'        => 'Shortcodes Ultimate',
			'slug'        => 'shortcodes-ultimate',
			'is_callable' => 'shortcodes_ultimate',
			'required'    => true
		),
	);

	$config = array(
		'id' => 'padma-visual-components',
	);

	tgmpa( $plugins, $config );

}



/**
 *
 * Updates control
 *
 */
if(is_admin()){
	add_action('after_setup_theme', 'padma_visual_components_updates');
    function padma_visual_components_updates(){
        if(class_exists('PadmaUpdater')){
			$PadmaUpdater = new PadmaUpdater();
			$PadmaUpdater->updater('padma-visual-components',__DIR__);
		}
    }
}

