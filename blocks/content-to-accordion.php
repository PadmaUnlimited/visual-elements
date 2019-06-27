<?php

class PadmaVisualElementsBlockContentToAccordionOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
		'query-filters' 	=> 'Query Filters',
	);

	public $sets = array(
		
	);

	public $inputs = array(

		'general' => array(

			'accordion-class' => array(
				'name' => 'accordion-class',
				'type' => 'text',
				'label' => 'CSS Class',
				'tooltip' => 'Additional CSS class name(s) separated by space(s)'
			),

			'item-class' => array(
				'name' => 'item-class',
				'type' => 'text',
				'label' => 'CSS Class for the items',
				'tooltip' => 'Additional CSS class name(s) separated by space(s)'
			),

			'style' =>	array(
				'name' => 'style',
				'type' => 'select',
				'label' => 'Style',
				'default' => 'default',
				'options' => array(
					'default'	=> 'Default',
					'fancy'		=> 'Fancy',
					'simple'	=> 'Simple',
				),
				'tooltip' => 'Choose style for this spoiler'
			),
			'icon' =>	array(
				'name' => 'icon',
				'type' => 'select',
				'label' => 'Icon',
				'default' => 'plus',
				'options' => array(
					''	=> '',
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
			'open' =>	array(
				'name' => 'open',
				'type' => 'integer',
				'label' => 'Default opened item',
				'default' => 0,
				'tooltip' => 'Spoiler item open by default'
			)
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

class PadmaVisualElementsBlockContentToAccordion extends PadmaBlockAPI {
	
	public $id 				= 've-content-to-accordion';	
	public $name 			= 'Content to Accordion';
	public $options_class 	= 'PadmaVisualElementsBlockContentToAccordionOptions';	
	public $description 	= 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.';
	public $categories 		= array('box','content','dynamic-content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;
		
	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'accordion',
			'name' => 'Accordion',
			'selector' => '.su-accordion',
		));
		$this->register_block_element(array(
			'id' => 'spoiler',
			'name' => 'Spoiler',
			'selector' => '.su-accordion .su-spoiler',
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
	}


	public static function dynamic_css($block_id, $block) {

		
	}
	
	public function content($block) {


		$accordion_class = parent::get_setting($block, 'accordion-class', '');
		$item_class = parent::get_setting($block, 'item-class', '');
		$style = parent::get_setting($block, 'style', 'default');
		$icon = parent::get_setting($block, 'icon', '');
		$open = parent::get_setting($block, 'open', 0);
		
		$posts = PadmaQuery::get_posts($block);

		$shortcode = '[su_accordion class="'.$accordion_class.'"]';

		$open_item = 1;
		foreach ($posts as $key => $post) {
			
			$id 	= $post->ID;
			$image 	= get_the_post_thumbnail_url($post->ID);
			$desc	= $post->post_excerpt;
			$title	= $post->post_title;
			$url	= get_post_permalink($post->ID);
			$date	= date("M d, Y", strtotime($post->post_date));
			$author	= get_the_author_meta('display_name',$post->post_author);

			// Open Spoiler
			$shortcode .= '[su_spoiler title="'.$title.'" ';
			if ($open_item == $open)
				$shortcode .= 'open="yes" ';
			else
				$shortcode .= 'open="no" ';

			$shortcode .= 'style="'.$style.'" icon="'.$icon.'" anchor="'.$title.'" class="'.$item_class.'"]';

			// Content
			$shortcode .= $post->post_content;

			// Close Spoiler
			$shortcode .= '[/su_spoiler]';

			$open_item++;

		}
		$shortcode .= '[/su_accordion]';

		echo do_shortcode($shortcode);
	}

	public static function enqueue_action($block_id, $block = false) {
	
	}

	
}	
