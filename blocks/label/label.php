<?php

class PadmaVisualElementsBlockLabelOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'type' => array(
				'name' => 'type',
				'label' => 'Type',
				'type' => 'select',
				'default' => 'default',
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

class PadmaVisualElementsBlockLabel extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-label';	
	public $name 			= 'Label';
	public $options_class 	= 'PadmaVisualElementsBlockLabelOptions';	
	public $description 	= 'Will help you to create colourful labels. You can choose among 6 various label colours.';
	public $categories 		= array('content');
	public $inline_editable = array('block-title', 'block-subtitle', 'su-label');	
	public $inline_editable_equivalences = array('su-label' => 'text');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'label',
			'name' => 'Label',
			'selector' => 'span.su-label',
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

		echo do_shortcode('[su_label type="'.$type.'" class="text"]'.$text.'[/su_label]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
