<?php

class PadmaVisualElementsBlockDailymotionOptions extends PadmaBlockOptionsAPI {
	
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
				'tooltip' => 'Url of Dailymotion page with video'
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

			'background' => array(
				'name' => 'background',
				'type' => 'text',
				'label' => 'Background',
				'default' => '#FFC300',				
				'tooltip' => 'HTML color of the background of controls elements'
			),

			'foreground' => array(
				'name' => 'foreground',
				'type' => 'text',
				'label' => 'Foreground',
				'default' => '#F7FFFD',				
				'tooltip' => 'HTML color of the foreground of controls elements'
			),

			'highlight' => array(
				'name' => 'highlight',
				'type' => 'text',
				'label' => 'Highlight',
				'default' => '#171D1B',				
				'tooltip' => "HTML color of the controls elements' highlights"
			),

			'logo' => array(
				'name' => 'logo',
				'type' => 'select',
				'label' => 'Logo',
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Allows to hide or show the Dailymotion logo'
			),

			'quality' => array(
				'name' => 'quality',
				'type' => 'select',
				'label' => 'Quality',
				'default' => '380',
				'options' => array(
					'240'		=> '240',
					'380'		=> '380',
					'480'		=> '480',
					'720'		=> '720',
					'1080'		=> '1080',
				),
				'tooltip' => 'Determines the quality that must be played by default if available'
			),

			'related' => array(
				'name' => 'related',
				'type' => 'select',
				'label' => 'Related',
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Show related videos at the end of the video'
			),

			'info' => array(
				'name' => 'info',
				'type' => 'select',
				'label' => 'Info',
				'default' => 'yes',
				'options' => array(
					'yes'		=> 'Yes',
					'no'		=> 'No',
				),
				'tooltip' => 'Show videos info (title/author) on the start screen'
			),


			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockDailymotion extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-dailymotion';	
	public $name 			= 'Dailymotion';
	public $options_class 	= 'PadmaVisualElementsBlockDailymotionOptions';	
	public $description 	= 'Allows you to insert responsive Dailymotion videos.';
	public $categories 		= array('media');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'dailymotion',
			'name' => 'Dailymotion',
			'selector' => 'div.su-dailymotion',
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
		$background = parent::get_setting($block, 'background');
		$foreground = parent::get_setting($block, 'foreground');
		$highlight = parent::get_setting($block, 'highlight');
		$logo = parent::get_setting($block, 'logo');
		$quality = parent::get_setting($block, 'quality');
		$related = parent::get_setting($block, 'related');
		$info = parent::get_setting($block, 'info');
		
		
		if($width < 200)
			$width = 200;

		if($width > 1600)
			$width = 1600;

		if($height < 200)
			$height = 200;

		if($height > 1600)
			$height = 1600;

		if(!$responsive)
			$responsive = 'yes';

		if(!$autoplay)
			$autoplay = 'no';
		
		if(!$background)
			$background = '#FFC300';

		if(!$foreground)
			$foreground = '#F7FFFD';
		
		if(!$highlight)
			$highlight = '#171D1B';
		
		if(!$logo)
			$logo = 'yes';

		if(!in_array($quality, array('240','380','480','720','1080')) || !$quality)
			$quality = '380';

		if(!$related)
			$related = 'yes';
		
		if(!$info)
			$info = 'yes';


		echo do_shortcode('[su_dailymotion url="'.$url.'" width="'.$width.'" height="'.$height.'" responsive="'.$responsive.'" autoplay="'.$autoplay.'" background="'.$background.'" foreground="'.$foreground.'" highlight="'.$highlight.'" logo="'.$logo.'" quality="'.$quality.'" related="'.$related.'" info="'.$info.'" class=""]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
