<?php

class PadmaVisualElementsBlock3dNavOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' => 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(			
		),
	);


	public function modify_arguments($args = false) {

		$this->tab_notices['general'] = 'To add items to this navigation menu, go to <a href="' . admin_url( 'nav-menus.php' ) . '" target="_blank">WordPress Admin &raquo; Appearance &raquo; Menus</a>. Then, create a menu and assign it to <em>' . PadmaBlocksData::get_block_name( $args['blockID'] ) . '</em> in the <strong>Theme Locations</strong> box. Add <a href="https://fontawesome.com/icons">fontawesome</a> class as icon.';
	}
	
}

class PadmaVisualElementsBlock3dNav extends PadmaBlockAPI {
	
	public $id 				= 've-3d-nav';	
	public $name 			= '3D Rotating Navigation';
	public $options_class 	= 'PadmaVisualElementsBlock3dNavOptions';	
	public $description 	= 'A 3D rotating navigation, powered by CSS transformations.';
	public $categories 		= array('navigation');

	private static $block_id  = '';
	private static $menuitems = array();
	
	public function init() {

		add_action('padma_body_close',array(__CLASS__,'add_menu_to_body'));
		
	}

	public static function init_action( $block_id, $block = false ) {

		if ( ! $block ) {
			$block = PadmaBlocksData::get_block( $block_id );
		}

		self::$block_id = $block_id;

		$name = PadmaBlocksData::get_block_name( $block ) . ' &mdash; ' . 'Layout: ' . PadmaLayout::get_name( $block['layout'] );

		register_nav_menu( 'navigation_block_' . $block_id, $name );



		$menu_name = 'navigation_block_' . self::$block_id;
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		self::$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

	}
	
	public function setup_elements() {
		/*
		$this->register_block_element(array(
			'id' => 'button',
			'name' => 'button',
			'selector' => 'a.su-button',
			'states' => array(
				'Hover' => 'a.su-button:hover', 
				'Clicked' => 'a.su-button:active'
			)
		));
		$this->register_block_element(array(
			'id' => 'icon',
			'name' => 'icon',
			'selector' => 'a.su-button span i',
		));
		$this->register_block_element(array(
			'id' => 'text',
			'name' => 'text',
			'selector' => 'a.su-button span small',
		));
		*/
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);


		$total = count(self::$menuitems);
		$width = 100/$total;

		$css = '.cd-3d-nav li{';
		$css .= 'width: '. $width . '%;';
		$css .= '}';

		echo $css;

		
	}
	
	public function content($block) {

		$html = '<div class="cd-header">				   
				   <a href="#0" class="cd-3d-nav-trigger">Menu<span></span></a>
				</div>';

		echo $html;

	}

	public static function add_menu_to_body(){


		global $post;		

		if ( !$block )
			$block = PadmaBlocksData::get_block(self::$block_id);

		/*
		$menu_name = 'navigation_block_' . self::$block_id;
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
		*/
		$html = '<nav class="cd-3d-nav-container">';
		$html .= '<ul class="cd-3d-nav">';

		foreach (self::$menuitems as $key => $item) {

			$current = ($post->ID == $item->ID) ? 'current': '';
			
			$html .= '<li class="'. $current .'">';			
			$html .= '<a href="'.$item->url.'">';
			$html .= '<i class="';
			foreach ($item->classes as $key => $class) {
				$html .= $class . ' ';
			}
			$html .= '"></i>';
			$html .= '<span>'.$item->title.'</span>';
			$html .= '</a>';
			$html .= '</li>';
			
				
			
		}
		
		$html .= '</ul>';
		$html .= '</nav>';

		echo $html;
	}

	public static function enqueue_action($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));		

		/* CSS */		
		wp_enqueue_style('padma-ve-3dnav', $path . 'css/3dnav.css');
		wp_enqueue_style('padma-ve-fontawesome', $path . 'css/fontawesome.css');


		/* JS */
		wp_enqueue_script( 'padma-ve-3dnav', $path . 'js/3dnav.js', array( 'jquery' ) );
		
	}


	public static function home_link_filter( $menu ) {

		return PadmaNavigationBlock::home_link_filter( $menu );

	}
	
}
