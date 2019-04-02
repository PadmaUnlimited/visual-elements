<?php

class PadmaVisualElementsBlockContentToCardsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(		
		'general' 	=> 'General',
		'query-filters' 	=> 'Query Filters',
	);

	public $sets = array(
		
	);

	public $inputs = array(

		'general' => array(
			'scroll-text' => array(
				'name' => 'scroll-text',
				'type' => 'text',
				'label' => 'Scroll text',
				'tooltip' => 'Scroll text',
				'default' => 'Scroll down'
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

class PadmaVisualElementsBlockContentToCards extends PadmaBlockAPI {
	
	public $id 				= 've-content-to-cards';	
	public $name 			= 'Content to Cards';
	public $options_class 	= 'PadmaVisualElementsBlockContentToCardsOptions';	
	public $description 	= 'Allows you to display expandable posts.';
	public $categories 		= array('box','content','dynamic-content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => '.ve-card-posts-container',
			'name' => 'Container',
			'selector' => '.ve-card-posts-container',
		));

		$this->register_block_element(array(
			'id' => '.ve-card-posts-container-item',
			'name' => 'item',
			'selector' => '.ve-card-posts-container li',
		));
		
		/*
		$this->register_block_element(array(
			'id' => 'cards-options',
			'name' => 'Tab options',
			'selector' => '.su-cards-nav',
		));
		$this->register_block_element(array(
			'id' => 'cards-options-item',
			'name' => 'Tab options item',
			'selector' => '.su-cards-nav span',
		));
		$this->register_block_element(array(
			'id' => 'tab-panes',
			'name' => 'Tab Panes',
			'selector' => '.su-cards .su-cards-panes',
		));
		$this->register_block_element(array(
			'id' => 'tab-panes-content',
			'name' => 'Tab Pane content',
			'selector' => '.su-cards .su-cards-pane',
		));		
		$this->register_block_element(array(
			'id' => 'tab-content-p',
			'name' => 'Tab content paragraph',
			'selector' => '.su-cards .su-cards-pane p',
		));
		$this->register_block_element(array(
			'id' => 'tab-h1',
			'name' => 'Tab h1',
			'selector' => '.su-cards .su-cards-pane h1',
		));
		$this->register_block_element(array(
			'id' => 'tab-h2',
			'name' => 'Tab h2',
			'selector' => '.su-cards .su-cards-pane h2',
		));
		$this->register_block_element(array(
			'id' => 'tab-h3',
			'name' => 'Tab h3',
			'selector' => '.su-cards .su-cards-pane h3',
		));
		$this->register_block_element(array(
			'id' => 'tab-h2',
			'name' => 'Tab h2',
			'selector' => '.su-cards .su-cards-pane h2',
		));
		$this->register_block_element(array(
			'id' => 'tab-h4',
			'name' => 'Tab h4',
			'selector' => '.su-cards .su-cards-pane h4',
		));
		$this->register_block_element(array(
			'id' => 'tab-h5',
			'name' => 'Tab h5',
			'selector' => '.su-cards .su-cards-pane h5',
		));
		$this->register_block_element(array(
			'id' => 'tab-h6',
			'name' => 'Tab h6',
			'selector' => '.su-cards .su-cards-pane h6',
		));
		$this->register_block_element(array(
			'id' => 'tab-ul',
			'name' => 'Tab list',
			'selector' => '.su-cards .su-cards-pane ul',
		));
		$this->register_block_element(array(
			'id' => 'tab-ol',
			'name' => 'Tab list',
			'selector' => '.su-cards .su-cards-pane ol',
		));
		$this->register_block_element(array(
			'id' => 'tab-li',
			'name' => 'Tab list item',
			'selector' => '.su-cards .su-cards-pane li',
		));
		$this->register_block_element(array(
			'id' => 'tab-span',
			'name' => 'Tab span',
			'selector' => '.su-cards .su-cards-pane span',
		));
		*/
	}


	public static function dynamic_css($block_id, $block) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		$posts = PadmaQuery::get_posts($block);

		$css = '';
		$total = count($posts);
		$offset = 100/($total + 1);
		$offset_incremental = $offset;
		$counter = 1;
		foreach ($posts as $key => $post) {

			$image 	= get_the_post_thumbnail_url($post->ID);
			$css .= '.single-post.post-id-'.$post->ID.' .cd-title::before { background-image: url('.$image.'); }';
			
			if($counter > 1){				
				$css .= '.ve-card-posts-container .single-post.post-id-'.$post->ID.'{';						
				$css .= '-webkit-transform: translateY('.$offset_incremental.'%);';
				$css .= '-moz-transform: translateY('.$offset_incremental.'%);';
				$css .= '-ms-transform: translateY('.$offset_incremental.'%);';
				$css .= '-o-transform: translateY('.$offset_incremental.'%);';
				$css .= 'transform: translateY('.$offset_incremental.'%);';
				$css .= '}';
			}
  
  			$offset_incremental += $offset;
  			++$counter;
		}

		$css .= '.cd-title{ height:'.$offset.'%; }';
		echo $css;

	}
	
	public function content($block) {

		

		$scroll_text = parent::get_setting($block, 'scroll-text', 'Scroll down');
		$posts = PadmaQuery::get_posts($block);


		$html = '<button class="cd-nav-trigger"><span aria-hidden="true" class="cd-icon"></span></button>';
		$html .= '<div class="ve-card-posts-container">';
		$html .= '<ul>';
		foreach ($posts as $key => $post) {

			debug($post);
			$id 	= $post->ID;
			$image 	= get_the_post_thumbnail_url($post->ID);
			$desc	= $post->post_excerpt;
			$title	= $post->post_title;
			$url	= get_post_permalink($post->ID);
			$date	= date("M d, Y", strtotime($post->post_date));
			$author	= get_the_author_meta('display_name',$post->post_author);
			$post_link = get_permalink($id);



			$html .= '<li class="single-post post-id-'.$id.'">';
			$html .= 	'<div class="cd-title">';
			$html .= 		'<h2>'.$title.'</h2>';
			$html .= 	'</div>';
			$html .= 	'<div class="ve-card-post-info">';
			$html .= 		'<button class="ve-card-scroll">'.$scroll_text.'</button>';
			$html .= 		'<div class="content-wrapper">';
			$html .= 			$post->post_content;
			$html .= 		'</div>';			
			$html .= 	'</div>';			
			$html .= '</li>';

		}

		$html .= '</ul>';
		$html .= '</div>';

		echo $html;
	}

	public static function enqueue_action($block_id, $block = false) {
		
		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));		
		
		/* CSS */		
		wp_enqueue_style('padma-ve-content-to-cards', $path . 'css/content-to-cards.css');

		/* JS */
		wp_enqueue_script( 'padma-ve-content-to-cards', $path . 'js/content-to-cards.js', array( 'jquery' ) );
	}

	
}	
