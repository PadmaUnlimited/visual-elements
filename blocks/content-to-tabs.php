<?php

class PadmaVisualElementsBlockContentToTabsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
		'query-filters' 	=> 'Query Filters',
	);

	public $sets = array(
		
	);

	public $inputs = array(

		'general' => array(
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
			'tabs-class' => array(
				'name' => 'tabs-class',
				'type' => 'text',
				'label' => 'CSS Class',
				'tooltip' => 'Additional CSS class name(s) separated by space(s)'
			),

			'style' =>	array(
				'name' => 'style',
				'type' => 'select',
				'label' => 'Style',
				'default' => 'default',
				'options' => array(
					'default'	=> 'Default',
					'carbon'	=> 'Carbon',
					'sharp' => 'Sharp',
					'grid' => 'Grid',
					'wood' => 'Wood',
					'fabric' => 'Fabric',
					'modern-dark' => 'Modern: Dark',
					'modern-light' => 'Modern: Light',
					'modern-blue' => 'Modern: Blue',
					'modern-orange' => 'Modern: Orange',
					'flat-dark' => 'Flat: Dark',
					'flat-light' => 'Flat: Light',
					'flat-blue' => 'Flat: Blue',
					'flat-green' => 'Flat: Green',
				),
				'tooltip' => 'Choose style for this tabs'
			),
			'active' =>	array(
				'name' => 'active',
				'type' => 'integer',
				'label' => 'Active (1-100)',
				'default' => 1,
				'tooltip' => 'Select which tab is open by default'
			),

			'post-link' => array(
				'type' => 'checkbox',
				'name' => 'url',
				'label' => 'Enable post link',
				'tooltip' => 'Link tab to any webpage. Use full URL to turn the tab title into link',
				'default' => false,
			),
			'item-target' => array(
				'name' => 'item-target',
				'type' => 'select',
				'default' => 'self',
				'options' => array(
					'self' => 'Open in same tab',
					'blank'	=> 'Open in new tab',
				),
				'label' => 'Target',
				'tooltip' => 'Choose how to open the custom tab link'
			),

			'item-class' => array(
				'name' => 'item-class',
				'type' => 'text',
				'label' => 'CSS Class for the items',
				'tooltip' => 'Additional CSS class name(s) separated by space(s)'
			),

		),

		'query-filters' => array(				
			
			'categories' => array(
				'type' => 'multi-select',
				'name' => 'categories',
				'label' => 'Categories',
				'tooltip' => '',
				'options' => 'get_categories()'
			),
			
			'categories-mode' => array(
				'type' => 'select',
				'name' => 'categories-mode',
				'label' => 'Categories Mode',
				'tooltip' => '',
				'options' => array(
					'include' => 'Include',
					'exclude' => 'Exclude'
				)
			),

			'enable-tags' => array(
				'type' => 'checkbox',
				'name' => 'tags-filter',
				'label' => 'Tags Filter',
				'tooltip' => 'Check this to allow the tags filter show.',
				'default' => false,
				'toggle'    => array(
					'false' => array(
						'hide' => array(
							'#input-tags'
						)
					),
					'true' => array(
						'show' => array(
							'#input-tags'
						)
					)
				)
			),

			'tags' => array(
				'type' => 'multi-select',
				'name' => 'tags',
				'label' => 'Tags',
				'tooltip' => '',
				'options' => 'get_tags()'
			),
			
			'post-type' => array(
				'type' => 'multi-select',
				'name' => 'post-type',
				'label' => 'Post Type',
				'tooltip' => '',
				'options' => 'get_post_types()',
				'callback' => 'reloadBlockOptions()'
			),

			'post-status' => array(
				'type' => 'multi-select',
				'name' => 'post-status',
				'label' => 'Post Status',
				'tooltip' => '',
				'options' => 'get_post_status()'
			),
			
			'author' => array(
				'type' => 'multi-select',
				'name' => 'author',
				'label' => 'Author',
				'tooltip' => '',
				'options' => 'get_authors()'
			),
			
			'number-of-posts' => array(
				'type' => 'integer',
				'name' => 'number-of-posts',
				'label' => 'Number of Posts',
				'tooltip' => '',
				'default' => 10
			),
			
			'offset' => array(
				'type' => 'integer',
				'name' => 'offset',
				'label' => 'Offset',
				'tooltip' => 'The offset is the number of entries or posts you would like to skip.  If the offset is 1, then the first post will be skipped.',
				'default' => 0
			),
			
			'order-by' => array(
				'type' => 'select',
				'name' => 'order-by',
				'label' => 'Order By',
				'tooltip' => '',
				'options' => array(
					'date' => 'Date',
					'title' => 'Title',
					'rand' => 'Random',
					'comment_count' => 'Comment Count',
					'ID' => 'ID',
					'author' => 'Author',
					'type' => 'Post Type',
					'menu_order' => 'Custom Order'
				)
			),
			
			'order' => array(
				'type' => 'select',
				'name' => 'order',
				'label' => 'Order',
				'tooltip' => '',
				'options' => array(
					'desc' => 'Descending',
					'asc' => 'Ascending',
				)
			),
			
			'byid-include' => array(
				'type' => 'text',
				'name' => 'byid-include',
				'label' => 'Include by ID',
				'tooltip' => 'In both Include and Exclude by ID, you use a comma separated list of IDs of your post type.'
				),

			'byid-exclude' => array(
				'type' => 'text',
				'name' => 'byid-exclude',
				'label' => 'Exclude by ID',
				'tooltip' => 'In both Include and Exclude by ID, you use a comma separated list of IDs of your post type.'
			)
		),
			
		
	);


	public function modify_arguments($args = false) {


	}
	
	function get_categories() {
		return PadmaQuery::get_categories();
	}
	
	function get_tags() {
		return PadmaQuery::get_tags();
	}

	function get_authors() {
		return PadmaQuery::get_authors();
	}

	function get_post_types() {
		return PadmaQuery::get_post_types();
	}

	function get_taxonomies() {
		return PadmaQuery::get_taxonomies();
	}

	function get_post_status() {
		return PadmaQuery::get_post_status();
	}
}

class PadmaVisualElementsBlockContentToTabs extends PadmaBlockAPI {
	
	public $id 				= 've-content-to-tabs';	
	public $name 			= 'Content to Tabs';
	public $options_class 	= 'PadmaVisualElementsBlockContentToTabsOptions';	
	public $description 	= 'Allows you to divide your content with horizontal or vertical tabs. You can specify which tab will be selected by default and turn any tab into a link.';
	public $categories 		= array('box','content','dynamic-content');
	
	public function init() {


		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'tabs',
			'name' => 'Tabs',
			'selector' => '.su-tabs',
		));
		$this->register_block_element(array(
			'id' => 'tabs-options',
			'name' => 'Tab options',
			'selector' => '.su-tabs-nav',
		));
		$this->register_block_element(array(
			'id' => 'tabs-options-item',
			'name' => 'Tab options item',
			'selector' => '.su-tabs-nav span',
		));
		$this->register_block_element(array(
			'id' => 'tab-panes',
			'name' => 'Tab Panes',
			'selector' => '.su-tabs .su-tabs-panes',
		));
		$this->register_block_element(array(
			'id' => 'tab-panes-content',
			'name' => 'Tab Pane content',
			'selector' => '.su-tabs .su-tabs-pane',
		));		
		$this->register_block_element(array(
			'id' => 'tab-content-p',
			'name' => 'Tab content paragraph',
			'selector' => '.su-tabs .su-tabs-pane p',
		));
		$this->register_block_element(array(
			'id' => 'tab-h1',
			'name' => 'Tab h1',
			'selector' => '.su-tabs .su-tabs-pane h1',
		));
		$this->register_block_element(array(
			'id' => 'tab-h2',
			'name' => 'Tab h2',
			'selector' => '.su-tabs .su-tabs-pane h2',
		));
		$this->register_block_element(array(
			'id' => 'tab-h3',
			'name' => 'Tab h3',
			'selector' => '.su-tabs .su-tabs-pane h3',
		));
		$this->register_block_element(array(
			'id' => 'tab-h2',
			'name' => 'Tab h2',
			'selector' => '.su-tabs .su-tabs-pane h2',
		));
		$this->register_block_element(array(
			'id' => 'tab-h4',
			'name' => 'Tab h4',
			'selector' => '.su-tabs .su-tabs-pane h4',
		));
		$this->register_block_element(array(
			'id' => 'tab-h5',
			'name' => 'Tab h5',
			'selector' => '.su-tabs .su-tabs-pane h5',
		));
		$this->register_block_element(array(
			'id' => 'tab-h6',
			'name' => 'Tab h6',
			'selector' => '.su-tabs .su-tabs-pane h6',
		));
		$this->register_block_element(array(
			'id' => 'tab-ul',
			'name' => 'Tab list',
			'selector' => '.su-tabs .su-tabs-pane ul',
		));
		$this->register_block_element(array(
			'id' => 'tab-ol',
			'name' => 'Tab list',
			'selector' => '.su-tabs .su-tabs-pane ol',
		));
		$this->register_block_element(array(
			'id' => 'tab-li',
			'name' => 'Tab list item',
			'selector' => '.su-tabs .su-tabs-pane li',
		));
		$this->register_block_element(array(
			'id' => 'tab-span',
			'name' => 'Tab span',
			'selector' => '.su-tabs .su-tabs-pane span',
		));
	}


	public static function dynamic_css($block_id, $block) {

		
	}
	
	public function content($block) {

		$vertical = parent::get_setting($block, 'vertical', '');
		$tabs_class = parent::get_setting($block, 'tabs-class', '');
		$item_class = parent::get_setting($block, 'item-class', '');
		$style = parent::get_setting($block, 'style', array());
		$icon = parent::get_setting($block, 'icon', '');
		$active = parent::get_setting($block, 'active', 0);
		$post_link = parent::get_setting($block, 'post_link', '');
		$item_target = parent::get_setting($block, 'item-target', '');
		
		$posts = PadmaQuery::get_posts($block);

		$shortcode = '[su_tabs class="'.$tabs_class.'" ';

		if($vertical=='yes')
			$shortcode .= 'vertical="yes" ';

		if(!$active || $active < 1 || !is_numeric($active))
			$active = '1';

		if($style)
			$shortcode .= 'style="'.$style.'" ';

		$shortcode .= 'active="'.$active.'" ';
		$shortcode .= ']';

		foreach ($posts as $key => $post) {

			$id 	= $post->ID;
			$image 	= get_the_post_thumbnail_url($post->ID);
			$desc	= $post->post_excerpt;
			$title	= $post->post_title;
			$url	= get_post_permalink($post->ID);
			$date	= date("M d, Y", strtotime($post->post_date));
			$author	= get_the_author_meta('display_name',$post->post_author);

			// Open Tab
			$shortcode .= '[su_tab title="'.$title.'" ';
			$shortcode .= 'anchor="'.$title.'" class="'.$item_class.'" ';

			if($post_link)
				$shortcode .= 'url="'.get_permalink($id) . '" ';

			$shortcode .= 'target="' . $item_target . '"]';

			// Content
			$shortcode .= $post->post_content;

			// Close Tab
			$shortcode .= '[/su_tab]';


		}
		$shortcode .= '[/su_tabs]';
		echo do_shortcode($shortcode);
	}

	public static function enqueue_action($block_id, $block = false) {
	
	}

	
}	
