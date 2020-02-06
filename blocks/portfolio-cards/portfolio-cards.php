<?php

class PadmaVisualElementsBlockPortfolioCardsOptions extends PadmaBlockOptionsAPI {
	
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
				'callback' => 'reloadBlockOptions(block.id)'
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

			'custom-length' => array(
					'type' => 'select',
					'name' => 'custom-length',
					'label' => 'Custom length',
					'options' => array(
						'no' => 'No',
						'yes' => 'Yes',
					),
					'default' => 'no',
					'tooltip' => '',
					'toggle'    => array(
						'yes' => array(
							'show' => array(
								'#input-custom-length-number'
							)
						),
						'no' => array(
							'hide' => array(
								'#input-custom-length-number'
							)
						),
					)
				),

			'custom-length-number' => array(
				'name' => 'custom-length-number',
				'type' => 'integer',
				'default' => 15,
				'label' => 'Words to show',
				'tooltip' => '',
			),
		),
			
		
	);


	public function modify_arguments($args = false) {


	}
	
	function get_categories() {

		if( isset($this->block['settings']['post-type']) )
			return PadmaQuery::get_categories($this->block['settings']['post-type']);
		else
			return array();

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

class PadmaVisualElementsBlockPortfolioCards extends PadmaBlockAPI {
	
	public $id 				= 've-portfolio-cards';	
	public $name 			= 'PortfolioCards';
	public $options_class 	= 'PadmaVisualElementsBlockPortfolioCardsOptions';	
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
		wp_enqueue_script( 'padma-ve-portfolio-cards', $path . 'js/portfolio-cards.js', array( 'jquery' ));

	}

	public function setup_elements() {

		/*
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
			'name' => 'PortfolioCards',
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
		*/
	}


	public static function dynamic_css($block_id, $block) {		
	}
	
	public function content($block) {

		$html_content = '';
		$portfolio_classes 	= '';
		$columns 			= parent::get_setting($block, 'columns', 4);
		$content_to_show 	= parent::get_setting($block, 'content-to-show', 'excerpt');		
		$post_type 			= (isset($block['settings']['post-type'])) ? $block['settings']['post-type'] : ['post'];
		$posts 				= PadmaQuery::get_posts($block);
		$categories_in_posts = array();

		$custom_length 			= ( !empty($block['settings']['custom-length']) ) ? $block['settings']['custom-length']: 'no';
		$custom_length_number 	= ( !empty($block['settings']['custom-length-number']) ) ? $block['settings']['custom-length-number']: 15;

		
		// Columns
		$portfolio_classes .= 'portfolio-' . $columns;


		$html_content .= '<div id="portfolio-cards" class="portfolio-cards">';

		$alt_counter = 1;		
		foreach ( $posts as $key => $post ) {

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

			if( $custom_length === 'yes' ){
				$content = wp_trim_words( do_shortcode($shortcode), $custom_length_number );
			}else{
				$content = do_shortcode($shortcode);
			}

			
			// Categories
			$item_classes = '';

			if ( $post_type == 'product' || in_array('product', $post_type))
				$post_categories = wp_get_post_terms( $id, 'product_cat' );
			else
				$post_categories = get_the_category( $id );


			// save categories ids to use later
			foreach ($post_categories as $key => $term) {
				$categories_in_posts[] = $term->term_id;				
			}
			
			foreach ( $post_categories as $key => $category) {				
				$item_classes .= 'pf-' . $category->slug;
			}
		
			++$alt_counter;

			$html_content .= '<div class="'.$portfolio_classes.'">';
			$html_content .= '	<a class="portfolio-item" href="'.$url.'" style="background-image:url('.$image.')">';
	        $html_content .= '		<span class="caption">';
	        $html_content .= '      	<span class="caption-content">';
	        $html_content .= '        		<h2>'.$title.'</h2>';
	        $html_content .= '        		<p class="">'.$content .'</p>';
	        $html_content .= '      	</span>';
	        $html_content .= '    	</span>';
	        //$html_content .= '    <img class="img-fluid" src="'.$image.'" alt="">';
	        $html_content .= '  </a>';
			$html_content .= '</div>';		

		}

		$html_content .= '</div>';		

		echo $html_content;

		
					
		
	}

	public static function enqueue_action($block_id, $block = false) {
		
		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
		$path = str_replace('/blocks/portfolio-cards', '', plugin_dir_url( __FILE__ ));

		/* JS */
		wp_enqueue_script( 'padma-ve-portfolio-cards', $path . 'js/portfolio-cards.js', array( 'jquery') );
		
		/* CSS */				
		wp_enqueue_style('padma-ve-portfolio-cards', $path . 'css/portfolio-cards.css');
	}

	
}	
