<?php

class PadmaVisualElementsBlockAccordionOptions extends PadmaBlockOptionsAPI {
	
	public $tabs;
	public $sets;
	public $inputs;

	public function __construct(){
		$this->tabs = array(
			'general' => 'General',
		);

		$this->sets = array(
			
		);

		$this->inputs = array(
			'general' => array(
				'accordion-class' => array(
					'name' => 'accordion-class',
					'type' => 'text',
					'label' => __('CSS Accordion Class','padma'),
					'tooltip' => __('Additional CSS class name(s) separated by space(s)','padma')
				),
				'spoilers' => array(
					'type' => 'repeater',
				 	'name' => 'spoilers',
				 	'label' => __('Accordion','padma'),
				 	'tooltip' => __('Accordion with hidden content','padma'),
				  	'inputs' => array(
						array(
							'type' => 'text',
							'name' => 'title',
							'label' => __('Title','padma')
						),

						array(
							'type' => 'select',
							'name' => 'open',
							'label' => __('Open','padma'),
							'options' => array(
								'yes' => __('Yes','padma'),
								'no'	=> __('No','padma'),
							),
							'default' => 'no',
						),
						
						array(
							'name' => 'style',
							'type' => 'select',
							'label' => __('Style','padma'),
							'default' => 'default',
							'options' => array(
								'default'	=> __('Default','padma'),
								'fancy'		=> __('Fancy','padma'),
								'simple'	=> __('Simple','padma'),
							),
							'tooltip' => __('Choose style for this spoiler','padma')
						),

						array(
							'name' => 'icon',
							'type' => 'select',
							'label' => __('Icon','padma'),
							'default' => 'plus',
							'options' => array(
								'plus' => 'Plus',
								'plus-cicle' => 'Plus-cicle',
								'plus-square-1' => 'Plus-square-1',
								'plus-square-2' => 'Plus-square-2',
								'arrow'	=> 'Arrow',
								'arrow-circle-1' => 'Arrow-circle-1',
								'arrow-circle-2' => 'Arrow-circle-1e',
								'chevron' => 'Chevron',
								'chevron-circle'=> 'Chevron-circle',
								'caret' => 'Caret',
								'caret-square' => 'Caret-square',
								'folder-1' => 'Folder-1',
								'folder-2' => 'Folder-2',
							),
							'tooltip' => 'Choose style for this spoiler'
						),

						array(
							'type' => 'text',
							'name' => 'anchor',
							'label' => __('Anchor','padma'),
							'tooltip' => __('You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in.','padma')
						),

						array(
							'type' => 'wysiwyg',
							'name' => 'content',
							'label' => __('Content','padma'),
							'default' => null
						)
				
					),
			 	'sortable' => true,
				'limit' => 100
					
				),
				
			)
		);
	}


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockAccordion extends PadmaBlockAPI {

	public $id;
	public $name;
	public $options_class;
	public $description;
	public $categories;
	
	public function __construct(){

		$this->id = 'visual-elements-accordion';	
		$this->name = __('Accordion','padma');
		$this->options_class = 'PadmaVisualElementsBlockAccordionOptions';	
		$this->description = __('Allows you to create blocks with hidden content – spoilers (toggles). Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.','padma');
		$this->categories = array('box');
	}
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'spoiler',
			'name' => 'spoiler',
			'selector' => '.su-spoiler',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-title',
			'name' => 'Spoiler Title',
			'selector' => '.su-accordion .su-spoiler-title',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-icon',
			'name' => 'Spoiler icon',
			'selector' => '.su-accordion .su-spoiler-icon',
		));		
		$this->register_block_element(array(
			'id' => 'spoiler-title',
			'name' => 'Spoiler Title',
			'selector' => '.su-accordion .su-spoiler-title',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-content',
			'name' => 'Spoiler content',
			'selector' => '.su-accordion .su-spoiler-content',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-content-p',
			'name' => 'Spoiler content paragraph',
			'selector' => '.su-accordion .su-spoiler-content p',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h1',
			'name' => 'Spoiler h1',
			'selector' => '.su-accordion .su-spoiler-content h1',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h2',
			'name' => 'Spoiler h2',
			'selector' => '.su-accordion .su-spoiler-content h2',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h3',
			'name' => 'Spoiler h3',
			'selector' => '.su-accordion .su-spoiler-content h3',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h2',
			'name' => 'Spoiler h2',
			'selector' => '.su-accordion .su-spoiler-content h2',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h4',
			'name' => 'Spoiler h4',
			'selector' => '.su-accordion .su-spoiler-content h4',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h5',
			'name' => 'Spoiler h5',
			'selector' => '.su-accordion .su-spoiler-content h5',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-h6',
			'name' => 'Spoiler h6',
			'selector' => '.su-accordion .su-spoiler-content h6',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-ul',
			'name' => 'Spoiler list',
			'selector' => '.su-accordion .su-spoiler-content ul',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-ol',
			'name' => 'Spoiler list',
			'selector' => '.su-accordion .su-spoiler-content ol',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-li',
			'name' => 'Spoiler list item',
			'selector' => '.su-accordion .su-spoiler-content li',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-span',
			'name' => 'Spoiler span',
			'selector' => '.su-accordion .su-spoiler-content span',
		));
		$this->register_block_element(array(
			'id' => 'spoiler-a',
			'name' => 'Spoiler link',
			'selector' => '.su-accordion .su-spoiler-content a',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$accordion_class = parent::get_setting($block, 'accordion-class', array());
		if( empty($accordion_class) )
			$accordion_class = '';

		$spoilers = parent::get_setting($block, 'spoilers', array());
		$shortcode = "[su_accordion class=".$accordion_class."]";
		
		foreach ($spoilers as $spoiler => $params) {

			$title 		= isset( $params[ 'title' ] ) ? $params[ 'title' ] : '';
			$open 		= isset( $params[ 'open' ] ) ? $params[ 'open' ] : '';
			$style 		= isset( $params[ 'style' ] ) ? $params[ 'style' ] : '';			
			$icon 		= isset( $params[ 'icon' ] ) ? $params[ 'icon' ] : '';			
			$anchor 	= isset( $params[ 'anchor' ] ) ? $params[ 'anchor' ] : '';			
			$content 	= isset( $params[ 'content' ] ) ? $params[ 'content' ] : '';
			
			if(is_null($title))
				$title = 'Title';

			if(is_null($open))
				$open = 'no';

			if(is_null($style))
				$style = 'default';

			if(is_null($icon))
				$icon = 'plus';

			if(is_null($anchor))
				$anchor = 'none';


			$shortcode .= '[su_spoiler title="'.$title.'" open="'.$open.'" style="'.$style.'" icon="'.$icon.'" anchor="'.$anchor.'" class=""]'.$content.'[/su_spoiler]';
		}

		$shortcode .= "[/su_accordion]";
	
		$html = do_shortcode($shortcode);
		// remove inline CSS for color
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;	

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}	
