<?php

class PadmaVisualElementsBlockColumnsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			/*'size' => array(
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
			),*/
			'text' => array(
				'name' => 'text',
				'type' => 'text',
				'label' => 'Text'
			)

			'columns' => array(
				'type' => 'repeater',
				'name' => 'tabs',
				'label' => 'Tabs',
				'tooltip' => 'Content for your tabs.',
				'inputs' => array(
					array(
						'type' => 'text',
						'name' => 'title',
						'label' => 'Title'
					),

					array(
						'type' => 'select',
						'name' => 'disabled',
						'label' => 'Disabled',
						'options' => array(
							'yes' => 'Yes',
							'no'	=> 'No',
						),
						'default' => 'no',
					),
					
					array(
						'type' => 'text',
						'name' => 'anchor',
						'label' => 'Anchor',
						'tooltip' => 'You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in.'
					),
					
					array(
						'type' => 'text',
						'name' => 'url',
						'label' => 'Url',
						'tooltip' => 'Link tab to any webpage. Use full URL to turn the tab title into link.'
					),

					array(
						'name' => 'target',
						'type' => 'select',
						'label' => 'Target',
						'default' => 'blank',
						'options' => array(
							'self'		=> 'Open in same tab',
							'blank'		=> 'Open in new tab',
						),
						'tooltip' => 'Choose how to open the custom tab link'
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
