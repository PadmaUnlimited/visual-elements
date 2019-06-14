<?php

class PadmaVisualElementsBlockBasicHeadingOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array();

	public $inputs = array(
		'general' => array(
			'basic-heading' => array(
				'name' => 'basic-heading',
				'type' => 'text',
				'label' => 'Heading text'
			),
			'tag' => array(
						'name' => 'tag',
						'type' => 'select',
						'options' => array(
							'h1' => 'H1',
							'h2' => 'H2',
							'h3' => 'H3',
							'h4' => 'H4',
							'h5' => 'H5',
							'h6' => 'H6',
						),
						'label' => 'Tag',
						'tooltip' => 'HTML Tag to use.'
					)
		)
	);

	public function modify_arguments($args = false) {}
	
}

class PadmaVisualElementsBlockBasicHeading extends PadmaBlockAPI {
	
	public $id 				= 've-basic-heading';	
	public $name 			= 'Basic Heading';
	public $options_class 	= 'PadmaVisualElementsBlockBasicHeadingOptions';	
	public $description 	= 'A Heading can act as a title, section heading, and/or subheading. You can give each Heading a relative level of importance, from H1 to H6. Tip: Search engines (and people!) use Headings to determine the most important themes and topics of your content.';
	public $categories 		= array('content', 'basic', 'typography');

	// To allow inline editor
	public $inline_editable = 'basic-heading';
	
	public function init() {

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h1',
		));
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h2',
		));
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h3',
		));
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h4',
		));
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h5',
		));
		$this->register_block_element(array(
			'id' => 'basic-heading',
			'name' => 'Basic Heading',
			'selector' => 'h6',
		));
	}

	public function content($block) {

		$text = parent::get_setting($block, 'basic-heading');
		$tag = parent::get_setting($block, 'tag', 'h1');

		echo '<' . $tag . '>' . $text . '</' . $tag . '>';

	}

	public static function enqueue_action($block_id, $block = false) {}
	
}
