<?php

class PadmaVisualElementsBlockLightboxOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
		'image' 			=> 'Image',
		'iframe' 			=> 'Iframe',
		'inline' 			=> 'Inline',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(

			'type' =>	array(
				'name' => 'type',
				'type' => 'select',
				'label' => 'Type',
				'default' => 'image',
				'options' => array(
					'image'	=> 'Image',
					'iframe'	=> 'Iframe',
					'inline' 	=> 'Inline',
				),
				'toggle'    => array(
					'image' => array(
						'show' => array(
							'li#sub-tab-image'
						),
						'hide' => array(
							'li#sub-tab-iframe',
							'li#sub-tab-inline',
						)
					),
					'iframe' => array(
						'show' => array(
							'li#sub-tab-iframe'
						),
						'hide' => array(
							'li#sub-tab-image',
							'li#sub-tab-inline',
						)
					),
					'inline' => array(
						'show' => array(
							'li#sub-tab-inline'
						),
						'hide' => array(
							'li#sub-tab-iframe',
							'li#sub-tab-image',
						)
					),
				),
				'tooltip' => 'Select type of the lightbox window content'
			),
			'title' => array(
				'name' => 'title',
				'type' => 'text',
				'label' => 'Title',
				'tooltip' => 'Text for the title'
			),
					
		),

		'image' => array(
			'image' =>	array(
				'name' => 'image',
				'type' => 'image',
				'label' => 'Image',
				'tooltip' => 'Select the image to show'
			)
		),

		'iframe' => array(
			'iframe' =>	array(
				'name' => 'iframe',
				'type' => 'text',
				'label' => 'URL',
				'tooltip' => 'URL to show'
			)
		),

		'inline' => array(
			'inline' =>	array(
				'name' => 'inline',
				'type' => 'wysiwyg',
				'label' => 'Content',
				'tooltip' => 'Content to show'
			)
		),
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockLightbox extends PadmaBlockAPI {
	
	public $id 				= 've-lightbox';	
	public $name 			= 'Lightbox';
	public $options_class 	= 'PadmaVisualElementsBlockLightboxOptions';	
	public $description 	= 'Allows you to display various elements in a pop-up window. You can display an image, a web page, or any HTML content.';
	public $categories 		= array('content');
	public $inline_editable = array('block-title', 'block-subtitle', 'su-lightbox');	
	public $inline_editable_equivalences = array('su-lightbox' => 'title');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => '.su-lightbox',			
		));

		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => '.su-lightbox',			
		));

		$this->register_block_element(array(
			'id' => 'content',
			'name' => 'Content',
			'selector' => 'div.su-lightbox-content',
		));

		$this->register_block_element(array(
			'id' => 'content-text',
			'name' => 'Content text',
			'selector' => '.su-lightbox-content p',
		));

		$this->register_block_element(array(
			'id' => 'content-h1',
			'name' => 'Content h1',
			'selector' => '.su-lightbox-content h1',
		));

		$this->register_block_element(array(
			'id' => 'content-h2',
			'name' => 'Content h2',
			'selector' => '.su-lightbox-content h2',
		));

		$this->register_block_element(array(
			'id' => 'content-h3',
			'name' => 'Content h3',
			'selector' => '.su-lightbox-content h3',
		));

		$this->register_block_element(array(
			'id' => 'content-h4',
			'name' => 'Content h4',
			'selector' => '.su-lightbox-content h4',
		));

		$this->register_block_element(array(
			'id' => 'content-h5',
			'name' => 'Content h5',
			'selector' => '.su-lightbox-content h5',
		));

		$this->register_block_element(array(
			'id' => 'content-h6',
			'name' => 'Content h6',
			'selector' => '.su-lightbox-content h6',
		));

		$this->register_block_element(array(
			'id' => 'content-li',
			'name' => 'Content li',
			'selector' => '.su-lightbox-content li',
		));

		$this->register_block_element(array(
			'id' => 'content-a',
			'name' => 'Content link',
			'selector' => '.su-lightbox-content a',
		));

	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

	}
	
	public function content($block) {
		
		$type = parent::get_setting($block, 'type', 'image');
		$title = parent::get_setting($block, 'title');
		$image = parent::get_setting($block, 'image');
		$iframe = parent::get_setting($block, 'iframe');
		$inline = parent::get_setting($block, 'inline');


		$shortcode = '[su_lightbox ';		
		switch ($type) {
			case 'image':				
				$shortcode .= 'type="image" src="'.$image.'" class="title"]'.$title.'[/su_lightbox]';
				break;

			case 'iframe':
				$shortcode .= 'type="iframe" src="'.$iframe.'" class="title"]'.$title.'[/su_lightbox]';						
				break;

			case 'inline':							
				$shortcode .= 'type="inline" src="#'.$block['id'].'" class="title"] '.$title.' [/su_lightbox]';
				$shortcode .= '[su_lightbox_content id="#'.$block['id'].'"]' . $inline . '[/su_lightbox_content]';
				break;
			
			default:
				$content = 'none';
				break;
		}

		$html = do_shortcode( $shortcode );

		// remove inline CSS
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		$path = str_replace('/blocks/lightbox', '', plugin_dir_path( __FILE__ ));				

		/* CSS */
		PadmaCompiler::register_file(array(
			'name' => 've-lightbox-css',
			'format' => 'css',
			'fragments' => array(
				$path . 'css/lightbox.css'
			),
			'dependencies' => array(),
			'enqueue' => true
		));

	}
	
}
