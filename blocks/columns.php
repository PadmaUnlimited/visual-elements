<?php

class PadmaVisualElementsBlockColumnsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			
			'columns' => array(
				'type' => 'repeater',
				'name' => 'columns',
				'label' => 'Columns',
				'tooltip' => 'Content for your columns.',
				'inputs' => array(
					array(
						'name' => 'size',
						'label' => 'Size',
						'type' => 'select',
						'default' => 'one-half',
						'options' => array(
							'full-width'	=> 'Full width 1/1',
							'one-half'		=> 'One half 1/2',
							'one-third'		=> 'One third 1/3',
							'two-third'		=> 'Two third 2/3',
							'one-fourth'	=> 'One fourth 1/4',
							'three-fourth'	=> 'Three fourth 3/4',
							'one-fifth'		=> 'One fifth 1/5',
							'two-fifth'		=> 'Two fifth 2/5',
							'three-fifth'	=> 'Three fifth 3/5',
							'four-fifth'	=> 'Four fifth 4/5',
							'one-sixth'		=> 'One sixth 1/6',
							'five-sixth'	=> 'Five sixth 5/6',
						),
						'tooltip' => 'Select column width. This width will be calculated depend page width'
					),

					array(
						'type' => 'select',
						'name' => 'center',
						'label' => 'Center',
						'options' => array(
							'yes' => 'Yes',
							'no' => 'No',
						),
						'default' => 'no',
						'tooltip' => 'Is this column centered on the page'
					),
					
					array(
						'type' => 'text',
						'name' => 'class',
						'label' => 'Class',
						'tooltip' => 'Additional CSS class name(s) separated by space(s)'
					),

					array(
						'type' => 'wysiwyg',
						'name' => 'content',
						'label' => 'Content',
						'default' => null
					)
				),
				'sortable' => true,
				'limit' => 100
			),
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


		$columns = parent::get_setting($block, 'columns', array());
		$shortcode = '[su_row class=""]';
		
		$index = 1;
		foreach ($columns as $column => $params) {

			$size 		= $params[ 'size-' . $index ];
			$center 	= $params[ 'center-' . $index ];
			$class 		= $params[ 'class-' . $index ];			
			$content 	= $params[ 'content-' . $index ];
			
			$shortcode .= '[su_column ';
			$shortcode .= 'size="'.$size.'" ';
			$shortcode .= 'center="'.$center.'" ';
			$shortcode .= 'class="'.$class.'" ';			
			$shortcode .= ']';
			$shortcode .= $content;
			$shortcode .= '[/su_column]';

			++$index;
		}

		$shortcode .= '[/su_row]';

		echo do_shortcode($shortcode);

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
