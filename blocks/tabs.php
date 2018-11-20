<?php

class PadmaVisualElementsBlockTabsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'size' => array(
				'name' => 'size',
				'label' => 'Size',
				'type' => 'integer',
				'tooltip' => 'Height of the spacer in pixels',
				'default' => 20
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockTabs extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-spacer';	
	public $name 			= 'Tabs';
	public $options_class 	= 'PadmaVisualElementsBlockTabsOptions';	
	public $description 	= 'Will help you to create an empty space between elements on a page.';
	public $categories 		= array('box','content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
	
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$size = parent::get_setting($block, 'size');

		if(!$size || $size < 0 || $size > 800)
			$size = 20;

		echo do_shortcode('[su_spacer size="'.$size.'"]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
