<?php

/*
Plugin Name: Padma Visual Elements
Plugin URI: https://www.padmaunlimited.com/plugins/visual-elements
Description: Integration plugin between Shortcodes Ultimate and Padma Unlimited theme
Version: 1.0.1
Author: Padma Unlimited team
Author URI: https://www.padmaunlimited.com
License: GNU GPL v2
*/

add_action('after_setup_theme', 'register_visual_elements_block');
function register_visual_elements_block() {

    if ( !class_exists('Padma') )
		return;

	if (!class_exists('PadmaBlockAPI') )
		return false;

	if(!class_exists('Shortcodes_Ultimate'))
			return false;

	/**
	 *
	 * Register elements as blocks
	 *
	 */
	
	require_once 'blocks/accordion.php';
	require_once 'blocks/button.php';
	require_once 'blocks/columns.php';
	require_once 'blocks/dailymotion.php';
	require_once 'blocks/divider.php';
	require_once 'blocks/dummy-image.php';
	require_once 'blocks/dummy-text.php';
	require_once 'blocks/fontawesome.php';
	require_once 'blocks/gmap.php';
	require_once 'blocks/heading.php';
	require_once 'blocks/label.php';
	require_once 'blocks/spacer.php';
	require_once 'blocks/spoiler.php';
	require_once 'blocks/tabs.php';
	require_once 'blocks/vimeo.php';
	require_once 'blocks/youtube.php';

	
	padma_register_block('PadmaVisualElementsBlockButton', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));	

	padma_register_block('PadmaVisualElementsBlockDivider', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

	padma_register_block('PadmaVisualElementsBlockDailymotion', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

	padma_register_block('PadmaVisualElementsBlockDummyImage', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

	padma_register_block('PadmaVisualElementsBlockDummyText', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockGmap', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockHeading', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockLabel', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockSpacer', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockVimeo', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
	padma_register_block('PadmaVisualElementsBlockYoutube', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));


	// Padma 0.2.2 or higher required
	// Require repeater multi-content fix
	if(!version_compare(PADMA_VERSION, '0.2.2', '<')){
		
		padma_register_block('PadmaVisualElementsBlockAccordion', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

		padma_register_block('PadmaVisualElementsBlockColumns', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));
	
		padma_register_block('PadmaVisualElementsBlockSpoiler', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

		padma_register_block('PadmaVisualElementsBlockTabs', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', 
			plugin_basename(__FILE__)), 0, -1));
	
	}


	// Padma 0.3.1 or higher required
	// Require panel input radio support
	if(!version_compare(PADMA_VERSION, '0.3.1', '<')){
		
		padma_register_block('PadmaFontAwesomeBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

	}
			
	

}


/**
 *
 * Request Shortcodes Ultimate plugin
 *
 */
add_action('after_setup_theme', 'padma_visual_elements_activate');
function padma_visual_elements_activate(){

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
		'id' => 'padma-visual-elements',
	);

	tgmpa( $plugins, $config );

}



/**
 *
 * Updates control
 *
 */
if(is_admin()){
	add_action('after_setup_theme', 'padma_visual_elements_updates');
    function padma_visual_elements_updates(){
        if(class_exists('PadmaUpdater')){
			$PadmaUpdater = new PadmaUpdater();
			$PadmaUpdater->updater('padma-visual-elements',__DIR__);
		}
    }
}

