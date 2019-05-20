<?php

class PadmaVisualElementsBlockPortfolioOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
		'query-filters' 	=> 'Query Filters',
	);

	public $sets = array(
		
	);

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
				'slider-max' => 6,
				'toggle'   => array(
					'1' => array(
						'show' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
						'hide' => array(
							'#input-title-overlay',
							'#input-show-margin',
						)

					),
					'2' => array(
						'show' => array(
							'#input-title-overlay',
							'#input-show-margin',
						),
						'hide' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
					),		
					'3' => array(
						'show' => array(
							'#input-title-overlay',
							'#input-show-margin',
						),
						'hide' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
					),		
					'4' => array(
						'show' => array(
							'#input-title-overlay',
							'#input-show-margin',
						),
						'hide' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
					),		
					'5' => array(
						'show' => array(
							'#input-title-overlay',
							'#input-show-margin',
						),
						'hide' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
					),
					'6' => array(
						'show' => array(
							'#input-title-overlay',
							'#input-show-margin',
						),
						'hide' => array(
							'#input-alternate-content',
							'#input-full-width-image',
							'#input-show-open-button',
							'#input-open-button-text',
						),
					),					
				),
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

			'show-margin' => array(
				'name' => 'show-margin',
				'label' => 'Show margin',
				'type' => 'select',
				'default' => 'yes',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show margin',
			),

			'alternate-content' => array(
				'name' => 'alternate-content',
				'label' => 'Alternate content and image',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Alternate content and image',
			),

			'full-width-image' => array(
				'name' => 'full-width-image',
				'label' => 'Show full width image',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show full width image',
			),

			'title-overlay' => array(
				'name' => 'title-overlay',
				'label' => 'Title overlay',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show title over the image',
			),

			'show-open-button' => array(
				'name' => 'show-open-button',
				'label' => 'Show open button',
				'type' => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no'	=> 'No',
				),
				'tooltip' => 'Show open button',
			),

			'open-button-text' => array(
				'name' => 'open-button-text',
				'label' => 'Open button text',
				'type' => 'text',
				'default' => 'Open article',
				'tooltip' => 'Default text for open article button',				
			),

			/*
			'mode' => array(
				'name' => 'mode',
				'label' => 'Layout mode',
				'type' => 'select',
				'default' => 'masonry',
				'options' => array(
					'masonry' => 'Masonry',
					'fitRows' => 'Fit rows',
					'vertical' => 'Vertical',
				),
				'tooltip' => 'Layout mode',
			),*/



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
			),

			'content-to-show' => array(
				'type' => 'select',
				'name' => 'content-to-show',
				'label' => 'Content To Show',
				'options' => array(
					'none' => '&ndash; Do Not Show Content &ndash;',
					'excerpt' => 'Excerpts',
					'content' => 'Full Content'
				),
				'default' => 'excerpt',
				'tooltip' => 'The content is the written text or HTML for the entry.  This is edited in the WordPress or ClassicPress admin panel.'
			),
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

	public static function portfolio_admin_styles() {

	}
	public static function portfolio_admin_scripts() {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));	

        /* JS */
		wp_enqueue_script( 'padma-ve-isotope', $path . 'js/isotope.js', array( 'jquery' ) );
		wp_enqueue_script( 'padma-ve-portfolio', $path . 'js/portfolio.js', array( 'jquery', 'padma-ve-isotope' ) );

	}

	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'portfolio-filter',
			'name' => 'Filter',
			'selector' => '.portfolio-filter',
		));

		$this->register_block_element(array(
			'id' => 'portfolio-filter-item',
			'parent' => 'portfolio-filter',
			'name' => 'Filter item',
			'selector' => '.portfolio-filter li',
		));

		$this->register_block_element(array(
			'id' => 'portfolio-filter-link',
			'parent' => 'portfolio-filter',
			'name' => 'Filter link',
			'selector' => '.portfolio-filter li a',
			'states' => array(
				'Hover' => '.portfolio-filter li a:hover', 
				'Clicked' => '.portfolio-filter li a:active'
			)
		));

		$this->register_block_element(array(
			'id' => 'portfolio-active-item',
			'parent' => 'portfolio-filter',
			'name' => 'Active item',
			'selector' => '.portfolio-filter li.activeFilter a',			
		));

		$this->register_block_element(array(
			'id' => 'portfolio',
			'name' => 'Portfolio',
			'selector' => '.portfolio',
		));

		$this->register_block_element(array(
			'id' => 'article',
			'parent' => 'portfolio',
			'name' => 'Article',
			'selector' => '.portfolio article.portfolio-item',
		));

		$this->register_block_element(array(
			'id' => 'image',
			'parent' => 'portfolio',
			'name' => 'Image',
			'selector' => '.portfolio .portfolio-image',
		));

		$this->register_block_element(array(
			'id' => 'left-icon',
			'parent' => 'portfolio',
			'name' => 'Left icon',
			'selector' => '.portfolio .portfolio-image .left-icon',
		));

		$this->register_block_element(array(
			'id' => 'right-icon',
			'parent' => 'portfolio',
			'name' => 'Right icon',
			'selector' => '.portfolio .portfolio-image .right-icon',
		));

		$this->register_block_element(array(
			'id' => 'portfolio-desc',
			'parent' => 'portfolio',
			'name' => 'Description container',
			'selector' => '.portfolio .portfolio-desc',
		));

		$this->register_block_element(array(
			'id' => 'title',
			'parent' => 'portfolio',
			'name' => 'Article title',
			'selector' => '.portfolio .portfolio-desc h3',
		));
		
		$this->register_block_element(array(
			'id' => 'content',
			'parent' => 'portfolio',
			'name' => 'Content',
			'selector' => '.portfolio .portfolio-desc .description',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h1',
			'parent' => 'portfolio',
			'name' => 'Content H1',
			'selector' => '.portfolio .portfolio-desc .description h1',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h2',
			'parent' => 'portfolio',
			'name' => 'Content H2',
			'selector' => '.portfolio .portfolio-desc .description h2',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h3',
			'parent' => 'portfolio',
			'name' => 'Content H3',
			'selector' => '.portfolio .portfolio-desc .description h3',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h4',
			'parent' => 'portfolio',
			'name' => 'Content H4',
			'selector' => '.portfolio .portfolio-desc .description h4',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h5',
			'parent' => 'portfolio',
			'name' => 'Content H5',
			'selector' => '.portfolio .portfolio-desc .description h5',
		));
		
		$this->register_block_element(array(
			'id' => 'content-h6',
			'parent' => 'portfolio',
			'name' => 'Content H6',
			'selector' => '.portfolio .portfolio-desc .description h6',
		));
		
		$this->register_block_element(array(
			'id' => 'content-p',
			'parent' => 'portfolio',
			'name' => 'Content p',
			'selector' => '.portfolio .portfolio-desc .description p',
		));
		
		$this->register_block_element(array(
			'id' => 'content-a',
			'parent' => 'portfolio',
			'name' => 'Content a',
			'selector' => '.portfolio .portfolio-desc .description a',
		));

		$this->register_block_element(array(
			'id' => 'content-ul',
			'parent' => 'portfolio',
			'name' => 'Content ul',
			'selector' => '.portfolio .portfolio-desc .description ul',
		));

		$this->register_block_element(array(
			'id' => 'content-ul-li',
			'parent' => 'portfolio',
			'name' => 'Content ul li',
			'selector' => '.portfolio .portfolio-desc .description ul li',
		));
		
		$this->register_block_element(array(
			'id' => 'button',
			'parent' => 'portfolio',
			'name' => 'Button',
			'selector' => '.portfolio .portfolio-desc .button',
			'states' => array(
				'Hover' => '.portfolio .portfolio-desc .button:hover', 
				'Clicked' => '.portfolio .portfolio-desc .button:active'
			)
		));

	}


	public static function dynamic_css($block_id, $block) {		
	}
	
	public function content($block) {

		$html 				= '';
		$portfolio_classes 	= '';
		$columns 			= parent::get_setting($block, 'columns', 4);
		$show_filter 		= parent::get_setting($block, 'show-filter', 'no');
		$filter_style 		= parent::get_setting($block, 'filter-style', 'style-1');
		$show_all_text 		= parent::get_setting($block, 'show-all-text', 'Show all');
		$show_margin 		= parent::get_setting($block, 'show-margin', 'yes');
		$alternate_content 	= parent::get_setting($block, 'alternate-content', 'yes');
		$full_width_image 	= parent::get_setting($block, 'full-width-image', 'no');
		$content_to_show 	= parent::get_setting($block, 'content-to-show', 'excerpt');
		$mode 				= parent::get_setting($block, 'mode', 'masonry');
		$title_overlay		= parent::get_setting($block, 'title-overlay', 'no');
		$show_open_button	= parent::get_setting($block, 'show-open-button', 'no');
		$open_button_text	= parent::get_setting($block, 'open-button-text', 'Open article');
		$posts 				= PadmaQuery::get_posts($block);


		if($show_filter == 'yes'){

			$html .= '<ul class="portfolio-filter '.$filter_style.' clearfix" data-container="#portfolio">';
			$html .= '<li class="activeFilter"><a href="#" data-filter="*">'.$show_all_text.'</a></li>';
			
			$categories_mode = parent::get_setting($block, 'categories-mode', 'include');
			$categories = parent::get_setting($block, 'categories', array());

			foreach (PadmaQuery::get_categories() as $key => $category) {

				if(count($categories) > 0){

					if(!in_array($key, $categories) && $categories_mode == 'include')
						continue;
					
					if(in_array($key, $categories) && $categories_mode == 'exclude')
						continue;

				}
					
				$action_text = strtolower($category);
				$action_text = preg_replace('/\s+/', '-', $action_text);
				$html .= '<li><a data-filter=".pf-'.$action_text.'">'.$category.'</a></li>';

			}

			$html .= '</ul>';
			$html .= '<div class="clear"></div>';

		}
	

		// Columns
		$portfolio_classes .= 'portfolio-' . $columns;

		// Full Width
		if($full_width_image == 'yes')
			$portfolio_classes .= ' portfolio-fullwidth';

		// Layout mode		
		$data_atts = 'data-layout="' . $mode . '"';

		// No margin
		if($show_margin !== 'yes')
			$portfolio_classes .= ' portfolio-nomargin';


		$html .= '<div id="portfolio" class="portfolio  '.$portfolio_classes . ' grid-container clearfix" '.$data_atts.'>';

		$alt_counter = 1;
		foreach ($posts as $key => $post) {

			$id 	= $post->ID;
			$image 	= get_the_post_thumbnail_url($post->ID);
			$desc	= $post->post_excerpt;
			$title	= $post->post_title;
			$url	= get_permalink($post->ID);
			$date	= date("M d, Y", strtotime($post->post_date));
			$author	= get_the_author_meta('display_name',$post->post_author);

			switch ($content_to_show) {
				
				case 'content':					
					$shortcode = $post->post_content;
					break;
				
				case 'excerpt':
					$shortcode = $post->post_excerpt;
					break;
				
				case 'none':
					$shortcode = '';
					break;
				
				default:
					$shortcode = $post->post_content;
					break;
			}

			
			// Categories
			$item_classes = '';
			foreach (get_the_category($id) as $key => $category) {
				$item_classes .= ' pf-' . $category->slug;
			}

			// Alternate content
			if($alternate_content == 'yes' && ($alt_counter % 2 == 0) && $alt_counter > 1){
				$item_classes = ' alt';
			}			
			++$alt_counter;


			/**
			 *
			 * Description structure
			 *
			 */			
			$description = '	<div class="portfolio-desc">';
			$description .= '		<h3><a href="'.$url.'">'.$title.'</a></h3>';
			
			if($title_overlay == 'no' || $columns == 1)
				$description .= '<div class="description">'.do_shortcode($shortcode) .'</div>';

			if($columns == 1 && $show_open_button == 'yes'){
				$description .= '<a href="'.$url.'" class="button button-3d noleftmargin">'.$open_button_text.'</a>';
			}			

			$description .= '	</div>';


			/**
			 *
			 * Article structure
			 *
			 */
			$html .= '<article class="portfolio-item' . $item_classes . '">';
			$html .= '	<div class="portfolio-image">';
			$html .= '		<a href="'.$url.'">';
			$html .= '			<img src="'.$image.'" alt="Open Imagination">';
			$html .= '		</a>';
			$html .= '		<div class="portfolio-overlay">';
			
			if($title_overlay == 'yes' && $columns > 1)
				$html .= $description;

			$html .= '			<a href="'.$image.'" class="left-icon" data-lightbox="image"><i class="fas fa-plus"></i></a>';
			$html .= '			<a href="'.$url.'" class="right-icon"><i class="fas fa-ellipsis-h"></i></a>';
			$html .= '		</div>';
			$html .= '	</div>';

			if($title_overlay == 'no' || $columns == 1)
				$html .= $description;
			
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
		wp_enqueue_script( 'padma-ve-magnific', $path . 'js/jquery.magnific.js', array( 'jquery' ) );
		wp_enqueue_script( 'padma-ve-portfolio', $path . 'js/portfolio.js', array( 'jquery', 'padma-ve-isotope' ) );
		
		/* CSS */		
		wp_enqueue_style('padma-ve-magnific', $path . 'css/magnific-popup.css');
		wp_enqueue_style('padma-ve-portfolio', $path . 'css/portfolio.css');
		wp_enqueue_style('padma-ve-fontawesome', $path . 'css/fontawesome.css');
	}

	
}	
