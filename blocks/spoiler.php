<?php

class PadmaVisualElementsBlockDummySpoilerOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
		 'spoiler' => array(
		 'type' => 'repeater',
		 'name' => 'spoiler',
		 'label' => 'Spoiler',
		 'tooltip' => 'Spoiler with hidden content',
		  'inputs' => array(
					array(
						'type' => 'text',
						'name' => 'title',
						'label' => 'Title'
					),

					array(
						'type' => 'select',
						'name' => 'open',
						'label' => 'Open',
						'options' => array(
							'yes' => 'Yes',
							'no'	=> 'No',
						),
						'default' => 'no',
					),
					
					array(
						'name' => 'style',
						'type' => 'select',
						'label' => 'Style',
						'default' => 'default',
						'options' => array(
							'default'		=> 'Default',
							'fancy'		=> 'Fancy',
							'simple'		=> 'Simple',
						),
						'tooltip' => 'Choose style for this spoiler'
					),

					array(
						'name' => 'icon',
						'type' => 'select',
						'label' => 'Icon',
						'default' => 'plus',
						'options' => array(
							'plus' => 'Plus',
							'plus-cicle' => 'Plus-cicle',
							'plus-square-1' => 'Plus-square-1',
							'plus-square-2' => 'Plus-square-2',
							'arrow'	=> 'Arrow',
							'arrow-circle-1' => 'Arrow-circle-1',
							'arrow-circle-2' => 'Arrow-circle-1e',
							'chevron' => 'Chevron',
							'chevron-circle'=> 'Chevron-circle',
							'caret' => 'Caret',
							'caret-square' => 'Caret-square',
							'folder-1' => 'Folder-1',
							'folder-2' => 'Folder-2',
						),
						'tooltip' => 'Choose style for this spoiler'
					),

					array(
						'type' => 'text',
						'name' => 'anchor',
						'label' => 'Anchor',
						'tooltip' => 'You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in.'
					),
			
				),
				
			),
			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockDummySpoiler extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-Spoiler';	
	public $name 			= 'Spoiler';
	public $options_class 	= 'PadmaVisualElementsBlockDummySpoilerOptions';	
	public $description 	= 'This shortcode allows you to create blocks with hidden content – spoilers (toggles). Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'spoiler',
			'name' => 'spoiler',
			'selector' => '.su-spoiler',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

        $title = parent::get_setting($block, 'title');
		$open = parent::get_setting($block, 'open');
		$style = parent::get_setting($block, 'style');
		$icon = parent::get_setting($block, 'icon');
		$anchor = parent::get_setting($block, 'anchor');


		if(is_null($title))
			$title = '';

		if(is_null($open))
			$open = 'no';

		if(is_null($style))
			$style = 'default';

		if(is_null($icon))
			$icon = 'plus';

		if(is_null($anchor))
			$anchor = 'none';


		$html = do_shortcode('[su_spoiler title="'.$title.'" open="'.$open.'" style="'.$style.'" icon="'.$icon.'" anchor="'.$anchor.'" class=""]');
		
		// remove inline CSS for color
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}	
