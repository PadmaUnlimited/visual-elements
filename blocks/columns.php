<?php

class PadmaVisualElementsBlockColumnsOptions extends PadmaBlockOptionsAPI {
	
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
				'type' => 'select',
				'default' => '1/2',
				'options' => array(
					'default'		=> 'Default',
					'success'		=> 'Success',
					'warning'		=> 'Warning',
					'important'		=> 'Important',
					'black'			=> 'Black',
					'info'			=> 'Info',
				),
				'tooltip' => 'Style of the label'
			),
			'text' => array(
				'name' => 'text',
				'type' => 'text',
				'label' => 'Text'
			)
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockColumns extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-columns';	
	public $name 			= 'Columns';
	public $options_class 	= 'PadmaVisualElementsBlockColumnsOptions';	
	public $description 	= 'Will help you to divide page content into columns.';
	public $categories 		= array('box');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'columns',
			'name' => 'Columns',
			'selector' => 'span.su-columns',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {


		$text = parent::get_setting($block, 'text');
		$type = parent::get_setting($block, 'type');

		if(!$text)
			$text = 'Hello';

		if(!$type)
			$type = 'default';

		echo do_shortcode('[su_label type="'.$type.'"]'.$text.'[/su_label]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
