<?php

class PadmaVisualElementsBlockBoxOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(

			'style' =>	array(
				'name' => 'style',
				'type' => 'select',
				'label' => 'Style',
				'default' => 'default',
				'options' => array(
					'default'	=> 'Default',
					'soft'	=> 'Soft',
					'glass' => 'Glass',
					'bubbles' => 'Bubbles',
					'noise' => 'Noise',
				),
				'tooltip' => 'Box style preset'
			),


			'radius' => array(
				'name' => 'radius',
				'type' => 'text',
				'label' => 'Radius',
				'tooltip' => 'Box corners radius',
				'default' => 3
			),

			'title' => array(
				'name' => 'title',
				'type' => 'text',
				'label' => 'Title',
				'tooltip' => 'Text for the box title'
			),

			'content' => array(
				'name' => 'content',
				'type' => 'wysiwyg',
				'label' => 'content',
				'tooltip' => 'Box content'
			),

					
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockBox extends PadmaBlockAPI {
	
	public $id 				= 've-box';	
	public $name 			= 'Box';
	public $options_class 	= 'PadmaVisualElementsBlockBoxOptions';	
	public $description 	= 'Allows you to create boxes with colorful titles. You can easily change box appearance. Also, you can place any HTML code or even other shortcodes within it.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'box',
			'name' => 'Box',
			'selector' => 'div.su-box',			
		));

		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => '.su-box-title',
		));

		$this->register_block_element(array(
			'id' => 'content',
			'name' => 'Content',
			'selector' => '.su-box-content',
		));

		$this->register_block_element(array(
			'id' => 'content-text',
			'name' => 'Content text',
			'selector' => '.su-box-content p',
		));

		$this->register_block_element(array(
			'id' => 'content-h1',
			'name' => 'Content h1',
			'selector' => '.su-box-content h1',
		));

		$this->register_block_element(array(
			'id' => 'content-h2',
			'name' => 'Content h2',
			'selector' => '.su-box-content h2',
		));

		$this->register_block_element(array(
			'id' => 'content-h3',
			'name' => 'Content h3',
			'selector' => '.su-box-content h3',
		));

		$this->register_block_element(array(
			'id' => 'content-h4',
			'name' => 'Content h4',
			'selector' => '.su-box-content h4',
		));

		$this->register_block_element(array(
			'id' => 'content-h5',
			'name' => 'Content h5',
			'selector' => '.su-box-content h5',
		));

		$this->register_block_element(array(
			'id' => 'content-h6',
			'name' => 'Content h6',
			'selector' => '.su-box-content h6',
		));

		$this->register_block_element(array(
			'id' => 'content-li',
			'name' => 'Content li',
			'selector' => '.su-box-content li',
		));

		$this->register_block_element(array(
			'id' => 'content-a',
			'name' => 'Content link',
			'selector' => '.su-box-content a',
		));

	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {
		
		$style = parent::get_setting($block, 'style', 'default');
		$title = parent::get_setting($block, 'title');
		$content = parent::get_setting($block, 'content');
		$radius = parent::get_setting($block, 'radius');

		if($radius < 0)
			$radius = 1;

		if($radius > 20)
			$radius = 20;

		$shortcode = '[su_box title="'.$title.'" style="'.$style.'" radius="'.$radius.'"]';
		$shortcode .= $content;
		$shortcode .= '[/su_box]';
			
		$html = do_shortcode( $shortcode );

		// remove inline CSS
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));		
		
		/* CSS */		
		wp_enqueue_style('padma-ve-box', $path . 'css/box.css');

	}
	
}
