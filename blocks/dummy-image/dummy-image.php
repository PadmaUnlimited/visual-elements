<?php

class PadmaVisualElementsBlockDummyImageOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'width' => array(
				'name' => 'width',
				'type' => 'integer',
				'label' => 'Width',
				'tooltip' => 'Image width',
				'default' => 500
			),

			'height' => array(
				'name' => 'height',
				'type' => 'integer',
				'label' => 'Height',
				'tooltip' => 'Image height',
				'default' => 300
			),
			'theme' => array(
				'name' => 'theme ',
				'type' => 'select',
				'label' => 'Theme ',
				'default' => 'any',
				'options' => array(
					'any' => 'Any',
					'abstract'=> 'Abstract',
					'animals'=> 'Animals',
					'business'=> 'Business',
					'cats '=> 'Cats ',
					'city '=> 'City ',
					'food '=> 'Food ',
					'nightlife '=> 'Nightlife ',
					'fashion '=> 'Fashion ',
					'people '=> 'People ',
					'nature '=> 'Nature ',
					'sports  '=> 'Sports ',
					'technics  '=> 'Technics',
					'transport  '=> 'Transport'

				),
				'tooltip' => 'Select the theme for this image.'
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockDummyImage extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-dummy-image';	
	public $name 			= 'Dummy Image';
	public $options_class 	= 'PadmaVisualElementsBlockDummyImageOptions';	
	public $description 	= 'Allows you to display a dummy image. You can change the image theme and size.';
	public $categories 		= array('media');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'dummy-image',
			'name' => 'dummy-image',
			'selector' => '.su-dummy-image',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$width = parent::get_setting($block, 'width');
		$height = parent::get_setting($block, 'height');
		$theme = parent::get_setting($block, 'theme');

		if(is_null($width))
			$width = 500;

		if($width < 10)
			$width = 10;

		if($width > 1600)
			$width = 1600;


		if(is_null($height))
			$height = 300;

		if($height < 10)
			$height = 10;

		if($height > 1600)
			$height = 1600;

		if(is_null($theme))
			$theme = 'any';

		$html = do_shortcode('[su_dummy_image width="'.$width.'" height="'.$height.'" theme="'.$theme.'" class=""]');
		
		// remove inline CSS for color
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
