<?php

class PadmaVisualElementsBlockYoutubeOptions extends PadmaBlockOptionsAPI {
	
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
				'tooltip' => 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX'
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
				'tooltip' => 'Play video automatically when a page is loaded. Please note, in modern browsers autoplay option only works with the mute option enabled'
			),


			'mute' => array(
				'name' => 'mute',
				'type' => 'select',
				'label' => 'Mute',
				'default' => 'no',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Mute the player'
			),
			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockYoutube extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-youtube';	
	public $name 			= 'YouTube';
	public $options_class 	= 'PadmaVisualElementsBlockYoutubeOptions';	
	public $description 	= 'Allows you to insert responsive YouTube videos. You can create playlists using Youtube Advanced block.';
	public $categories 		= array('media');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'youtube',
			'name' => 'Youtube',
			'selector' => 'div.su-youtube',
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
		$mute = parent::get_setting($block, 'mute');
		

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
		
		if(!$mute)
			$mute = 'no';
		
		echo do_shortcode('[su_youtube url="'.$url.'" responsive="'.$responsive.'" autoplay="'.$autoplay.'" mute="'.$mute.'" width="'.$width.'" height="'.$height.'" ]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
