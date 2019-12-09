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
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Ignore width and height parameters and make map responsive'
			),

			'zoom' => array(
				'name' => 'zoom',
				'type' => 'integer',
				'label' => 'Zoom',
				'default' => 0,				
				'tooltip' => 'Zoom sets the initial zoom level of the map. Accepted values range from 1 (the whole world) to 21 (individual buildings). Use 0 (zero) to set zoom level depending on displayed object (automatic)'
			),

			'width' => array(
				'name' => 'width',
				'type' => 'integer',
				'label' => 'Width',
				'default' => 600,				
				'tooltip' => 'Map width'
			),

			'height' => array(
				'name' => 'height',
				'type' => 'integer',
				'label' => 'Height',
				'default' => 400,				
				'tooltip' => 'Map height'
			),
			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockGmap extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-gmap';	
	public $name 			= 'Google Map';
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
		$responsive = parent::get_setting($block, 'responsive');
		$zoom = parent::get_setting($block, 'zoom');
		$width = parent::get_setting($block, 'width');
		$height = parent::get_setting($block, 'height');
		

		if(!$address)
			$address = 'San José, Costa Rica';

		if(!$responsive)
			$responsive = 'yes';

		if($zoom < 0)
			$zoom = 0;

		if($zoom > 21)
			$zoom = 21;

		if($width < 200)
			$width = 200;

		if($width > 1600)
			$width = 1600;

		if($height < 200)
			$height = 200;

		if($height > 1600)
			$height = 1600;
		
		echo do_shortcode('[su_gmap address="'.$address.'" responsive="'.$responsive.'" zoom="'.$zoom.'" width="'.$width.'" height="'.$height.'" ]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
