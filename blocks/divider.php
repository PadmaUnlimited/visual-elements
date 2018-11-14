<?php

class PadmaVisualComponentsBlockDividerOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'top' => array(
				'name' => 'top',
				'label' => 'Top',
				'type' => 'select',
				'default' => 'yes',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show link to top of the page or not'
			),
			'text' => array(
				'name' => 'text',
				'type' => 'text',
				'label' => 'Text',
				'tooltip' => 'Text for the GO TOP link'
			),
			'style' => array(
				'name' => 'style',
				'label' => 'Style',
				'type' => 'select',
				'default' => 'none',
				'options' => array(
					'default'		=> 'Default',
					'dotted'		=> 'Dotted',
					'dashed'		=> 'Dashed',
					'double'		=> 'Double',
				),
				'tooltip' => 'Choose style for this divider'
			),
			'divider-color' => array(
				'name' => 'divider-color',
				'label' => 'Divider color',
				'type' => 'colorpicker',
				'tooltip' => 'Pick the color for divider'
			),
			'link-color' => array(
				'name' => 'link-color',
				'label' => 'Link color',
				'type' => 'colorpicker',
				'tooltip' => 'Pick the color for TOP link'
			),
			'margin' => array(
				'name' => 'margin',
				'label' => 'Margin',
				'type' => 'integer',
				'tooltip' => 'Adjust the top and bottom margins of this divider (in pixels)',
				'default' => 20
			),
			'size' => array(
				'name' => 'size',
				'label' => 'Size',
				'type' => 'integer',
				'tooltip' => 'Height of the divider (in pixels)',
				'default' => 3
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualComponentsBlockDivider extends PadmaBlockAPI {
	
	public $id 				= 'visual-components-divider';	
	public $name 			= 'Divider';
	public $options_class 	= 'PadmaVisualComponentsBlockDividerOptions';	
	public $description 	= 'Allows you to divide page content with styled divider. You can customize colours, hide “Got to top” link and adjust divider size.';
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
	
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$top = parent::get_setting($block, 'top');
		$text = parent::get_setting($block, 'text');
		$style = parent::get_setting($block, 'style');
		$divider_color = parent::get_setting($block, 'divider-color');
		$link_color = parent::get_setting($block, 'link-color');
		$size = parent::get_setting($block, 'size');
		$margin = parent::get_setting($block, 'margin');

		if(!$top)
			$top = 'yes';

		if(!$text)
			$text = 'Go to top';

		if(!$style)
			$style = 'default';

		if(!$divider_color)
			$divider_color = '#999999';

		if(!$link_color)
			$link_color = '#999999';

		if(!$size || $size < 0 || $size > 40)
			$size = 3;

		if(!$margin || $margin < 0 || $margin > 200)
			$margin = 15;

		echo do_shortcode('[su_divider top="'.$top.'" text="'.$text.'" style="'.$style.'" divider_color="'.$divider_color.'" link_color="'.$link_color.'" size="'.$size.'" margin="'.$margin.'"]');

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
