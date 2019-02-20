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

			'style' =>	array(
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
			'icon' =>	array(
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
		
		$category_options = array();		
		$categories_select_query = get_categories();
		
		foreach ($categories_select_query as $category)
			$category_options[$category->term_id] = $category->name;

		return $category_options;
		
	}

	function get_tags() {
		
		$tag_options = array();
		$tags_select_query = get_terms('post_tag');
		foreach ($tags_select_query as $tag)
			$tag_options[$tag->term_id] = $tag->name;
		$tag_options = (count($tag_options) == 0) ? array('text' => 'No tags available') : $tag_options;
		return $tag_options;
	}
	
	
	function get_authors() {
		
		$author_options = array();
		
		$authors = get_users(array(
			'orderby' => 'post_count',
			'order' => 'desc',
			'who' => 'authors'
		));
		
		foreach ( $authors as $author )
			$author_options[$author->ID] = $author->display_name;
			
		return $author_options;
		
	}
	
	
	function get_post_types() {
		
		$post_type_options = array();

		$post_types = get_post_types(false, 'objects'); 
			
		foreach($post_types as $post_type_id => $post_type){
			
			//Make sure the post type is not an excluded post type.
			if(in_array($post_type_id, array('revision', 'nav_menu_item'))) 
				continue;
			
			$post_type_options[$post_type_id] = $post_type->labels->name;
		
		}
		
		return $post_type_options;
		
	}

	function get_taxonomies() {

		$taxonomy_options = array('&ndash; Default: Category &ndash;');

		$taxonomy_select_query=get_taxonomies(false, 'objects', 'or');

		
		foreach ($taxonomy_select_query as $taxonomy)
			$taxonomy_options[$taxonomy->name] = $taxonomy->label;
		
		
		return $taxonomy_options;
		
	}

	function get_post_status() {
		
		return get_post_stati();
		
	}
	
}

class PadmaVisualElementsBlockContentToAccordion extends PadmaBlockAPI {
	
	public $id 				= 've-content-to-accordion';	
	public $name 			= 'Content to Accordion';
	public $options_class 	= 'PadmaVisualElementsBlockContentToAccordionOptions';	
	public $description 	= 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.';
	public $categories 		= array('box','content');
	
	public function init() {


		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
	}


	public static function dynamic_css($block_id, $block) {

		
	}
	
	public function content($block) {


		$accordion_class = parent::get_setting($block, 'accordion-class', array());
		$style = parent::get_setting($block, 'style', array());
		$icon = parent::get_setting($block, 'icon', array());
		
		$categories = parent::get_setting($block, 'categories', array());
		$categories_mode = parent::get_setting($block, 'categories-mode', array());
		$enable_tags = parent::get_setting($block, 'enable-tags', array());
		$tags = parent::get_setting($block, 'tags', array());
		$post_type = parent::get_setting($block, 'post-type', array());
		$post_status = parent::get_setting($block, 'post-status', array());
		$author = parent::get_setting($block, 'author', array());
		$number_of_posts = parent::get_setting($block, 'number-of-posts', array());
		$offset = parent::get_setting($block, 'offset', array());
		$order_by = parent::get_setting($block, 'order-by', array());
		$order = parent::get_setting($block, 'order', array());
		$byid_include = parent::get_setting($block, 'byid-include', array());
		$byid_exclude = parent::get_setting($block, 'byid-exclude', array());

		debug($block);
		

		$posts = array();
		$args = array(
			'category' => $categories,
			'numberposts' => $max_posts,
			'offset' => 0,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'include' => '',
			'exclude' => '',
			'meta_key' => '',
			'meta_value' =>'',
			'post_type' => 'post',
			'post_status' => 'publish',
			'suppress_filters' => true
		);

		$recent_posts = wp_get_recent_posts( $args, ARRAY_A );


		// Container
		echo "<div class='altica-last-posts'>";
		foreach ($recent_posts as $key => $post) {

			$id = $post['ID'];
			$image = get_the_post_thumbnail_url($post['ID']);
			$desc	= $post['post_excerpt'];
			$title	= $post['post_title'];
			$url	= get_post_permalink($post['ID']);
			$date	= date("M d, Y", strtotime($post['post_date']));
			$author	= get_the_author_meta('display_name',$post['post_author']);

			// single post
			echo "<div class='altica-post-item items-$max_posts'>";

				// head
				echo "<div class='head' style='background-image:url($image)'>";
				echo "</div>";

				// body
				echo "<div class='body'>";
				echo "<h2>$title</h2>";
				echo "<h3><span class='date'>$date</span><span class='author'>$author</span></h3>";
				echo "<p>$desc</p>";
				echo "<a href='$url'>Read More</a>";
				echo "</div>";


			echo "</div>";

			/*
			$posts[] = array(
				'id' => $post['ID'],
				'image' => get_the_post_thumbnail_url($post['ID']),
				'desc' => $post['post_excerpt'],
				'title' => $post['post_title'],
				'url' => get_post_permalink($post['ID']),
				'date' => date("M d, Y", strtotime($post['post_date'])),
				'author' => get_the_author_meta('display_name',$post['post_author']),
			);*/

		}

		/*
		$content_block_display = new PadmaContentBlockDisplay($block);		
		$content_block_display->display();

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
		*/

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}	
