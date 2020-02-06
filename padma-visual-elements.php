<?php

/*
Plugin Name: Padma Visual Elements
Plugin URI: https://www.padmaunlimited.com/plugins/visual-elements
Description: Great Visual Blocks for Visual Editor, also bring integration plugin between Shortcodes Ultimate and Padma Unlimited theme
Version: 1.0.23
Author: Padma Unlimited team
Author URI: https://www.padmaunlimited.com
License: GNU GPL v2
*/

add_action('after_setup_theme', 'register_visual_elements');
function register_visual_elements() {

    if ( !class_exists('Padma') )
		return;

	if (!class_exists('PadmaBlockAPI') )
		return;

	if( ! (version_compare( PADMA_VERSION, '1.1.0') >= 0) ){
				
		add_action( 'admin_notices', function() {
		    ?>
		    <div class="notice notice-warning is-dismissible">
		        <p><?php _e( 'Padma Visual Elements requires Padma 1.1.0 or higher.', 'padma-visual-elements' ); ?></p>
		    </div>
		    <?php
		} );

		return;
		
	}

	
	/**
	 *
	 * Register elements as blocks
	 *
	 */
	
	$blocks = array(		
		'accordion' => 'PadmaVisualElementsBlockAccordion',
		'basic-heading' => 'PadmaVisualElementsBlockBasicHeading',
		'box' => 'PadmaVisualElementsBlockBox',
		'button' => 'PadmaVisualElementsBlockButton',
		'columns' => 'PadmaVisualElementsBlockColumns',
		'content-to-accordion' => 'PadmaVisualElementsBlockContentToAccordion',
		'content-to-cards' => 'PadmaVisualElementsBlockContentToCards',
		'content-to-tabs' => 'PadmaVisualElementsBlockContentToTabs',
		'dailymotion' => 'PadmaVisualElementsBlockDailymotion',
		'divider' => 'PadmaVisualElementsBlockDivider',
		'dummy-image' => 'PadmaVisualElementsBlockDummyImage',
		'dummy-text' => 'PadmaVisualElementsBlockDummyText',
		'fontawesome' => 'PadmaVisualElementsFontAwesomeBlock',
		'gmap' => 'PadmaVisualElementsBlockGmap',
		'heading' => 'PadmaVisualElementsBlockHeading',
		'label' => 'PadmaVisualElementsBlockLabel',
		'lightbox' => 'PadmaVisualElementsBlockLightbox',
		'portfolio' => 'PadmaVisualElementsBlockPortfolio',
		'portfolio-cards' => 'PadmaVisualElementsBlockPortfolioCards',
		'post-data' => 'PadmaVisualElementsBlockPostData',		
		'spacer' => 'PadmaVisualElementsBlockSpacer',
		'spoiler' => 'PadmaVisualElementsBlockSpoiler',
		'tabs' => 'PadmaVisualElementsBlockTabs',
		'vimeo' => 'PadmaVisualElementsBlockVimeo',
		'youtube' => 'PadmaVisualElementsBlockYoutube',
		'quote' => 'PadmaVisualElementsBlockQuote',
	);

	foreach ($blocks as $file => $class) {
			
		$block_type_url = substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1);		
		$class_file = __DIR__ . '/blocks/'.$file.'/'.$file.'.php';		
		$icons = array(
			'path' => __DIR__ . '/blocks/' . $file . '/',
			'url' => $block_type_url . '/blocks/' . $file . '/'
		);

		padma_register_block(
			$class,
			$block_type_url,
			$class_file,
			$icons
		);
		

		/**
		 *
		 * Check if there is the Padma Loader
		 *
		 */		
		if ( version_compare(PADMA_VERSION, '1.1.70', '<=') ){			
			include_once $class_file;
		}
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
	
	if(function_exists('tgmpa')){
		tgmpa( $plugins, $config );
	}


}