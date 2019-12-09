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
	public $inline_editable = array('block-title', 'block-subtitle', 'basic-heading');
	
	public function init() {

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'basic-heading-h1',
			'name' => 'Basic Heading',
			'selector' => 'h1',
			'states' => array(
				'Hover' => 'h1:hover',
			)
		));
		$this->register_block_element(array(
			'id' => 'basic-heading-h2',
			'name' => 'Basic Heading',
			'selector' => 'h2',
			'states' => array(
				'Hover' => 'h2:hover',
			)
		));
		$this->register_block_element(array(
			'id' => 'basic-heading-h3',
			'name' => 'Basic Heading',
			'selector' => 'h3',
			'states' => array(
				'Hover' => 'h3:hover',
			)
		));
		$this->register_block_element(array(
			'id' => 'basic-heading-h4',
			'name' => 'Basic Heading',
			'selector' => 'h4',
			'states' => array(
				'Hover' => 'h4:hover',
			)
		));
		$this->register_block_element(array(
			'id' => 'basic-heading-h5',
			'name' => 'Basic Heading',
			'selector' => 'h5',
			'states' => array(
				'Hover' => 'h5:hover',
			)
		));
		$this->register_block_element(array(
			'id' => 'basic-heading-h6',
			'name' => 'Basic Heading',
			'selector' => 'h6',
			'states' => array(
				'Hover' => 'h6:hover',
			)
		));
	}

	public function content($block) {

		$text = parent::get_setting($block, 'basic-heading');
		$tag = parent::get_setting($block, 'tag', 'h1');

		echo '<' . $tag . ' class="basic-heading" >' . $text . '</' . $tag . '>';

	}

	public static function enqueue_action($block_id, $block = false) {}
	
}
