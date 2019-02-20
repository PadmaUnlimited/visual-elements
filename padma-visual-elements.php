<?php

/*
Plugin Name: Padma Visual Elements
Plugin URI: https://www.padmaunlimited.com/plugins/visual-elements
Description: Integration plugin between Shortcodes Ultimate and Padma Unlimited theme
Version: 1.0.2
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
	
	$blocks = array(
		'accordion' => 'PadmaVisualElementsBlockAccordion',
		'button' => 'PadmaVisualElementsBlockButton',
		'columns' => 'PadmaVisualElementsBlockColumns',
		'content-to-accordion' => 'PadmaVisualElementsBlockContentToAccordion',
		'dailymotion' => 'PadmaVisualElementsBlockDailymotion',
		'divider' => 'PadmaVisualElementsBlockDivider',
		'dummy-image' => 'PadmaVisualElementsBlockDummyImage',
		'dummy-text' => 'PadmaVisualElementsBlockDummyText',
		'fontawesome' => 'PadmaVisualElementsFontAwesomeBlock',
		'gmap' => 'PadmaVisualElementsBlockGmap',
		'heading' => 'PadmaVisualElementsBlockHeading',
		'label' => 'PadmaVisualElementsBlockLabel',
		'spacer' => 'PadmaVisualElementsBlockSpacer',
		'spoiler' => 'PadmaVisualElementsBlockSpoiler',
		'tabs' => 'PadmaVisualElementsBlockTabs',
		'vimeo' => 'PadmaVisualElementsBlockVimeo',
		'youtube' => 'PadmaVisualElementsBlockYoutube',
	);

	foreach ($blocks as $file => $class) {
		require_once 'blocks/'.$file.'.php';
		padma_register_block($class, substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));	
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

