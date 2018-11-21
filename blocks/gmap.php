<?php

class PadmaVisualElementsBlockGmapOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'address' => array(
				'name' => 'address',
				'label' => 'Address',
				'type' => 'text',
				'default' => '',
				'tooltip' => 'Address for the marker. You can type it in any language'
			),

			'responsive' => array(
				'name' => 'responsive',
				'type' => 'select',
				'label' => 'Responsive',
				'default' => 'self',
				'options' => array(
					'self'		=> 'Yes',
					'blank'		=> 'No',
				),
				'tooltip' => 'Ignore width and height parameters and make map responsive'
			),
			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockGmap extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-gmap';	
	public $name 			= 'Gmap';
	public $options_class 	= 'PadmaVisualElementsBlockGmapOptions';	
	public $description 	= 'Will help you to display Google maps, easily.';
	public $categories 		= array('media');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'gmap',
			'name' => 'Gmap',
			'selector' => 'div.su-gmap',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {


		$address = parent::get_setting($block, 'address');
		

		if(!$address)
			$address = 'San José, Costa Rica';

		echo do_shortcode('[su_gmap address="'.$address.'"]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
