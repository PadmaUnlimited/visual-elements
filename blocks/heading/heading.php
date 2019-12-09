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
	public $inline_editable = array('block-title', 'block-subtitle', 'su-heading-inner');	
	public $inline_editable_equivalences = array('su-heading-inner' => 'heading-text');
	
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
