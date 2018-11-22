<?php

class PadmaVisualElementsBlockTabsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			/*
			'style' => array(
				'name' => 'style',
				'label' => 'Style',
				'type' => 'select',
				'default' => 'default',
				'options' => array(
					'default'	=> 'Default',
					'carbon'	=> 'Carbon',
					'sharp'		=> 'Sharp',
					'grid'		=> 'Grid',
					'wood'		=> 'Wood',
					'fabric'	=> 'Fabric',
					'modern-dark'	=> 'Modern: Dark',
					'modern-light'	=> 'Modern: Light',
					'modern-blue'	=> 'Modern: Blue',
					'modern-orange'	=> 'Modern: Orange',
					'flat-dark'		=> 'Flat: Dark',
					'flat-light'	=> 'flat: Light',
					'flat-blue'		=> 'flat: Blue',
					'flat-green'	=> 'flat: Green',
				),
				'tooltip' => 'Choose style for this tabs'
			),
			*/
			'active' => array(
				'name' => 'active',
				'label' => 'Active',
				'type' => 'integer',
				'tooltip' => 'which tab is open by default. Number from 1 to 100.',
				'default' => 1
			),
			'vertical' => array(
				'name' => 'vertical',
				'label' => 'Vertical',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Align tabs vertically'
			),
			'tabs' => array(
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

class PadmaVisualElementsBlockTabs extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-tabs';	
	public $name 			= 'Tabs';
	public $options_class 	= 'PadmaVisualElementsBlockTabsOptions';	
	public $description 	= 'This shortcode allows you to divide your content with horizontal or vertical tabs. You can specify which tab will be selected by default and turn any tab into link. You can use any HTML code or even other shortcodes as a content.';
	public $categories 		= array('box');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;
		

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'tabs',
			'name' => 'tabs',
			'selector' => 'div.su-tabs',
		));
		$this->register_block_element(array(
			'id' => 'navs',
			'name' => 'navs',
			'selector' => 'div.su-tabs .su-tabs-nav',
		));
		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => 'div.su-tabs .su-tabs-nav span',
		));
		$this->register_block_element(array(
			'id' => 'panes',
			'name' => 'Panes',
			'selector' => 'div.su-tabs .su-tabs-panes',
		));
		$this->register_block_element(array(
			'id' => 'pane',
			'name' => 'Pane',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane',
		));
		$this->register_block_element(array(
			'id' => 'p',
			'name' => 'Text',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane p',
		));
		$this->register_block_element(array(
			'id' => 'a',
			'name' => 'Link',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane a',
		));
		$this->register_block_element(array(
			'id' => 'h1',
			'name' => 'Header 1',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 1',
		));
		$this->register_block_element(array(
			'id' => 'h2',
			'name' => 'Header 2',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 2',
		));
		$this->register_block_element(array(
			'id' => 'h3',
			'name' => 'Header 3',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 3',
		));
		$this->register_block_element(array(
			'id' => 'h4',
			'name' => 'Header 4',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 4',
		));
		$this->register_block_element(array(
			'id' => 'h5',
			'name' => 'Header 5',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 5',
		));
		$this->register_block_element(array(
			'id' => 'h6',
			'name' => 'Header 6',
			'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 6',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$style = (parent::get_setting($block, 'style')) ? parent::get_setting($block, 'style') : 'default';
		$active = (parent::get_setting($block, 'active')) ? parent::get_setting($block, 'active') : 1;
		$vertical = parent::get_setting($block, 'vertical');
		$tabs = parent::get_setting($block, 'tabs', array());

		if($vertical == 'yes')
			$shortcode = '[su_tabs vertical="'.$vertical.'"]';
		else
			$shortcode = '[su_tabs]';
		
		
		$index = 1;
		foreach ($tabs as $tab => $params) {

			$title 		= $params[ 'title-' . $index ];
			$disabled 	= $params[ 'disabled-' . $index ];
			$anchor 	= $params[ 'anchor-' . $index ];
			$url 		= $params[ 'url-' . $index ];
			$target 	= $params[ 'target-' . $index ];
			$content 	= $params[ 'content-' . $index ];
			
			$shortcode .= '[su_tab ';
			$shortcode .= 'title="'.$title.'" ';
			$shortcode .= 'disabled="'.$disabled.'" ';
			$shortcode .= 'anchor="'.$anchor.'" ';
			$shortcode .= 'url="'.$url.'" ';
			$shortcode .= 'target="'.$target.'" ';
			$shortcode .= ']';
			$shortcode .= $content;
			$shortcode .= '[/su_tab]';

			++$index;
		}

		$shortcode .= '[/su_tabs]';

		echo do_shortcode($shortcode);

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}
