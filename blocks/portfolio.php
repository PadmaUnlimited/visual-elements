<?php

class PadmaVisualElementsBlockPortfolioOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
		'query-filters' 	=> 'Query Filters',
	);

	public $sets = array(
		
	);

	/*
		Filter 
			yes/no
			
			Filter styles
				style 1-4


		Columns
			1-6

		Alternar lados ( portfolio-1-alt.html )
			yes/no

		Image full width (solo con 1 columna)
			yes/no

		Masonry
			yes/no

		Margin
			yes/no

		Masonry - title-overlay (sólo con masonry)
			yes/no

		Mixed Masonry  (sólo con masonry)
			yes/no

		Title position
			Default
			No title
			Overlay

		Style 1-4
		Center Aligned yes/no
		Shuffle Icon yes/no
		show Title yes/no
		No Margin yes/no
		Full Width yes/no
		Sidebar yes/no
		Sidebar yes/no
	*/
	public $inputs = array(

		'general' => array(

			'columns' => array(
				'type' => 'slider',
				'name' => 'columns',
				'label' => 'Columns',
				'tooltip' => 'Amount of portfolio columns.',
				'unit' => null,
				'default' => 4,
				'slider-min' => 1,
				'slider-max' => 6
			),

			'show-filter' => array(
				'name' => 'show-filter',
				'label' => 'Show filter',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show filter',
				'toggle'    => array(
					'yes' => array(
						'show' => array(
							'#input-filter-style',
							'#input-show-all-text'
						),
					),
					'no' => array(						
						'hide' => array(
							'#input-filter-style',
							'#input-show-all-text',
						)
					),
				),
			),
			'filter-style' => array(
				'name' => 'filter-style',
				'label' => 'Filter style',
				'type' => 'select',
				'default' => 'style-1',
				'options' => array(
					'style-1' => 'Style 1',
					'style-2' => 'Style 2',
					'style-3' => 'Style 3',
					'style-4' => 'Style 4',
				),
				'tooltip' => 'Select filter style',				
			),
			'show-all-text' => array(
				'name' => 'show-all-text',
				'label' => 'Show All text',
				'type' => 'text',
				'default' => 'Show All',				
				'tooltip' => 'Default text for "Show all" button',				
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

class PadmaVisualElementsBlockPortfolio extends PadmaBlockAPI {
	
	public $id 				= 've-portfolio';	
	public $name 			= 'Portfolio';
	public $options_class 	= 'PadmaVisualElementsBlockPortfolioOptions';	
	public $description 	= 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.';
	public $categories 		= array('box','content','dynamic-content');
	
	public function init() {
		
	}
	
	public function setup_elements() {
		
	}


	public static function dynamic_css($block_id, $block) {		
	}
	
	public function content($block) {

		$html 			= '';
		$columns 		= parent::get_setting($block, 'columns', 4);
		$show_filter 	= parent::get_setting($block, 'show-filter', 'no');
		$filter_style 	= parent::get_setting($block, 'filter-style', 'style-1');
		$show_all_text 	= parent::get_setting($block, 'show-all-text', 'Show all');

		$posts 				= PadmaQuery::get_posts($block);		
		$portfolio_style 	= 'portfolio-' . $columns;


		if($show_filter == 'yes'){

			$html .= '<ul class="portfolio-filter '.$filter_style.' clearfix" data-container="#portfolio">';
			$html .= '<li class="activeFilter"><a href="#" data-filter="*">'.$show_all_text.'</a></li>';

			
			$categories_mode = parent::get_setting($block, 'categories-mode', 'include');
			$categories = parent::get_setting($block, 'categories', array());

			foreach (PadmaQuery::get_categories() as $key => $category) {

				
				if(!in_array($key, $categories) && $categories_mode == 'include')
					continue;
				
				if(in_array($key, $categories) && $categories_mode == 'exclude')
					continue;
					
				$action_text = strtolower($category);
				$action_text = preg_replace('/\s+/', '-', $action_text);
				$html .= '<li><a href="#" data-filter=".pf-'.$action_text.'">'.$category.'</a></li>';

			}

			$html .= '</ul>';
			$html .= '<div class="clear"></div>';

		}





		$item_class = parent::get_setting($block, 'item-class', '');
		$style = parent::get_setting($block, 'style', array());
		$icon = parent::get_setting($block, 'icon', '');
		$open = parent::get_setting($block, 'open', 0);
		
		

		$html .= '<div id="portfolio" class="portfolio  '.$portfolio_style.' grid-container clearfix" style="position: relative; height: 714px;">';

		foreach ($posts as $key => $post) {

			//debug($post);
			$id 	= $post->ID;
			$image 	= get_the_post_thumbnail_url($post->ID);
			$desc	= $post->post_excerpt;
			$title	= $post->post_title;
			$url	= get_post_permalink($post->ID);
			$date	= date("M d, Y", strtotime($post->post_date));
			$author	= get_the_author_meta('display_name',$post->post_author);

			$categories = '';
			foreach (get_the_category($id) as $key => $category) {
				$categories .= 'pf-' . $category->slug . ' ';
			}
			

			$html .= '<article class="portfolio-item '.$categories.'">';
			$html .= '	<div class="portfolio-image">';
			$html .= '		<a href="portfolio-single.html">';
			$html .= '			<img src="'.$image.'" alt="Open Imagination">';
			$html .= '		</a>';
			$html .= '		<div class="portfolio-overlay">';
			$html .= '			<a href="'.$image.'" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>';
			$html .= '			<a href="'.$url.'" class="right-icon"><i class="icon-line-ellipsis"></i></a>';
			$html .= '		</div>';
			$html .= '	</div>';
			$html .= '	<div class="portfolio-desc">';
			$html .= '		<h3><a href="'.$url.'">'.$title.'</a></h3>';
			$html .= '		<span><a href="#">Media</a>, <a href="#">Icons</a></span>';
			$html .= '	</div>';
			$html .= '</article>';	

		}

		$html .= '</div>';

		echo $html;

		
					
		
	}

	public static function enqueue_action($block_id, $block = false) {
		
		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));		

		/* JS */
		wp_enqueue_script( 'padma-ve-isotope', $path . 'js/isotope.js', array( 'jquery' ) );
		wp_enqueue_script( 'padma-ve-portfolio', $path . 'js/portfolio.js', array( 'jquery', 'padma-ve-isotope' ) );
		
		/* CSS */		
		wp_enqueue_style('padma-ve-portfolio', $path . 'css/portfolio.css');
	}

	
}	
