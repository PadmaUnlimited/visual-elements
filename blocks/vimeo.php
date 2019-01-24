<?php

class PadmaVisualElementsBlockVimeoOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'url' => array(
				'name' => 'url',
				'label' => 'Url',
				'type' => 'text',
				'default' => '',
				'tooltip' => 'Url of Vimeo page with video. Ex: http://vimeo.com/watch?v=XXXXXX'
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

			'responsive' => array(
				'name' => 'responsive',
				'type' => 'select',
				'label' => 'Responsive',
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Ignore width and height parameters and make player responsive'
			),

			'autoplay' => array(
				'name' => 'autoplay',
				'type' => 'select',
				'label' => 'Autoplay',
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Play video automatically when a page is loaded.'
			),


			'dnt' => array(
				'name' => 'dnt',
				'type' => 'select',
				'label' => 'DNT',
				'default' => 'no',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Setting this parameter to YES will block the player from tracking any playback session data. Will have the same effect as enabling a Do Not Track header in your browser'
			),
			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockVimeo extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-vimeo';	
	public $name 			= 'Vimeo';
	public $options_class 	= 'PadmaVisualElementsBlockVimeoOptions';	
	public $description 	= 'Allows you to insert responsive Vimeo videos.';
	public $categories 		= array('media');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'vimeo',
			'name' => 'Vimeo',
			'selector' => 'div.su-vimeo',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$url = parent::get_setting($block, 'url');
		$width = parent::get_setting($block, 'width');
		$height = parent::get_setting($block, 'height');
		$responsive = parent::get_setting($block, 'responsive');
		$autoplay = parent::get_setting($block, 'autoplay');
		$dnt = parent::get_setting($block, 'dnt');
		

		if(!$responsive)
			$responsive = 'yes';
		
		if($width < 200)
			$width = 200;

		if($width > 1600)
			$width = 1600;

		if($height < 200)
			$height = 200;

		if($height > 1600)
			$height = 1600;

		if(!$autoplay)
			$autoplay = 'yes';
		
		if(!$dnt)
			$dnt = 'no';
		
		echo do_shortcode('[su_vimeo url="'.$url.'" responsive="'.$responsive.'" autoplay="'.$autoplay.'" dnt="'.$dnt.'" width="'.$width.'" height="'.$height.'" ]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
