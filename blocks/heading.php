<?php

class PadmaVisualElementsBlockHeadingOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'heading-text' => array(
				'name' => 'heading-text',
				'type' => 'text',
				'label' => 'Heading text'
			),
			'style' => array(
				'name' => 'style',
				'label' => 'Style',
				'type' => 'select',
				'default' => 'none',
				'options' => array(
					'default'		=> 'Default',
					'modern-1-dark'		=> 'Modern 1: Dark',
					'modern-1-light'	=> 'Modern 1: Light',
					'modern-1-blue'		=> 'Modern 1: Blue',
					'modern-1-orange'	=> 'Modern 1: Orange',
					'modern-1-violet'	=> 'Modern 1: Violet',
					'modern-2-dark'		=> 'Modern 2: Dark',
					'modern-2-light'	=> 'Modern 2: Light',
					'modern-2-blue'		=> 'Modern 2: Blue',
					'modern-2-orange'	=> 'Modern 2: Orange',
					'modern-2-violet'	=> 'Modern 2: Violet',
					'line-dark'			=> 'Line: Dark',
					'line-light'		=> 'Line: Light',
					'line-blue'			=> 'Line: Blue',
					'line-orange'		=> 'Line: Orange',
					'line-violet'		=> 'Line: Violet',
					'dotted-line-dark'	=> 'Dotted line: Dark',
					'dotted-line-light'	=> 'Dotted line: Light',
					'dotted-line-blue'	=> 'Dotted line: Blue',
					'dotted-line-orange'	=> 'Dotted line: Orange',
					'dotted-line-violet'	=> 'Dotted line: Violet',
					'flat-dark'		=> 'Flat: Dark',
					'flat-light'		=> 'Flat: Light',
					'flat-blue'		=> 'Flat: Blue',
					'flat-green'		=> 'Flat: Green',
				),
				'tooltip' => 'Choose style for this heading'
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockHeading extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-heading';	
	public $name 			= 'Heading';
	public $options_class 	= 'PadmaVisualElementsBlockHeadingOptions';	
	public $description 	= 'Allows you to create styled headings with customisable size and margin.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'heading',
			'name' => 'heading',
			'selector' => '.su-heading',
		));
		$this->register_block_element(array(
			'id' => 'su-heading-inner',
			'name' => 'Text',
			'selector' => '.su-heading-inner',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$style = parent::get_setting($block, 'style');
		$heading_text = parent::get_setting($block, 'heading-text');

		if(!$style)
			$style = 'default';

		$html = do_shortcode('[su_heading style="'.$style.'"]'.$heading_text.'[/su_heading]');

		// remove inline CSS for color
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
