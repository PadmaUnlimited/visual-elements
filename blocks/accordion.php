<?php

class PadmaVisualElementsBlockAccordionOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'accordion-class' => array(
				'name' => 'accordion-class',
				'type' => 'text',
				'label' => 'CSS Accordion Class',
				'tooltip' => 'Additional CSS class name(s) separated by space(s)'
			),
			'spoilers' => array(
				'type' => 'repeater',
			 	'name' => 'spoilers',
			 	'label' => 'Accordion',
			 	'tooltip' => 'Accordion with hidden content',
			  	'inputs' => array(
					array(
						'type' => 'text',
						'name' => 'title',
						'label' => 'Title'
					),

					array(
						'type' => 'select',
						'name' => 'open',
						'label' => 'Open',
						'options' => array(
							'yes' => 'Yes',
							'no'	=> 'No',
						),
						'default' => 'no',
					),
					
					array(
						'name' => 'style',
						'type' => 'select',
						'label' => 'Style',
						'default' => 'default',
						'options' => array(
							'default'		=> 'Default',
							'fancy'		=> 'Fancy',
							'simple'		=> 'Simple',
						),
						'tooltip' => 'Choose style for this spoiler'
					),

					array(
						'name' => 'icon',
						'type' => 'select',
						'label' => 'Icon',
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
						'label' => 'Anchor',
						'tooltip' => 'You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in.'
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

class PadmaVisualElementsBlockAccordion extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-accordion';	
	public $name 			= 'Accordion';
	public $options_class 	= 'PadmaVisualElementsBlockAccordionOptions';	
	public $description 	= 'Allows you to create blocks with hidden content – spoilers (toggles). Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.';
	public $categories 		= array('box');
	
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
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$accordion_class = parent::get_setting($block, 'accordion-class', array());
		$spoilers = parent::get_setting($block, 'spoilers', array());
		$shortcode = "[su_accordion class=".$accordion_class."]";
		$index = 1;

		foreach ($spoilers as $spoiler => $params) {

			//debug($params);

			$title 		= $params[ 'title-' . $index ];
			$open 		= $params[ 'open-' . $index ];
			$style 		= $params[ 'style-' . $index ];			
			$icon 		= $params[ 'icon-' . $index ];			
			$anchor 	= $params[ 'anchor-' . $index ];			
			$content 	= $params[ 'content-' . $index ];
			
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
			

			++$index;
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
