<?php

class PadmaVisualElementsBlockButtonOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'url' => array(
				'name' => 'url',
				'type' => 'text',
				'label' => 'Url',
				'tooltip' => 'Button link'
			),
			'target' => array(
				'name' => 'target',
				'type' => 'select',
				'label' => 'Target',
				'default' => 'self',
				'options' => array(
					'self'		=> 'Open in same tab',
					'blank'		=> 'Open in new tab',
				),
				'tooltip' => 'Button link target'
			),
			
			'style' => array(
				'name' => 'style',
				'label' => 'Style',
				'type' => 'select',
				'default' => 'default',
				'options' => array(
					'none'		=> 'none',
					'default'	=> 'Default',
					'flat'		=> 'Flat',
					'ghost'		=> 'Ghost',
					'soft'		=> 'Soft',
					'glass'		=> 'Glass',
					'bubbles'	=> 'Bubbles',
					'noise'		=> 'Noise',
					'stroked'	=> 'Stroked',
					'3d'		=> '3D',
				),
				'tooltip' => 'Button background style preset'
			),
			'icon' => array(
				'name' => 'icon',
				'label' => 'Icon',
				'type' => 'text',
				'tooltip' => 'You can upload custom icon for this button or pick a built-in icon. FontAwesome icon name or icon image URL. Examples: "star", http://example.com/icon.png'
			),
			'desc' => array(
				'name' => 'desc',
				'label' => 'Desc',
				'type' => 'text',
				'tooltip' => 'Small description under button text. This option is incompatible with icon.'
			),
			'onclick' => array(
				'name' => 'onclick',
				'label' => 'onClick',
				'type' => 'text',
				'tooltip' => 'Advanced JavaScript code for onClick action.'
			),
			'rel' => array(
				'name' => 'rel',
				'label' => 'Rel',
				'type' => 'text',
				'tooltip' => 'Here you can add value for the rel attribute. Example values: nofollow, lightbox'
			),
			'title' => array(
				'name' => 'title',
				'label' => 'Title',
				'type' => 'text',
				'tooltip' => 'Here you can add value for the title attribute'
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockButton extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-button';	
	public $name 			= 'Button';
	public $options_class 	= 'PadmaVisualElementsBlockButtonOptions';	
	public $description 	= 'Allows create highly customizable buttons. You can change button style, colors, size, add an icon or description.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {

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
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$url = parent::get_setting($block, 'url');
		$target = parent::get_setting($block, 'target');
		$style = parent::get_setting($block, 'style');
		$icon = parent::get_setting($block, 'icon');
		$desc = parent::get_setting($block, 'desc');
		$onclick = parent::get_setting($block, 'onclick');
		$rel = parent::get_setting($block, 'rel');
		$title = parent::get_setting($block, 'title');


		$shortcode = '[su_button url="'.$url.'" target="'.$target.'"';
		
		//if($style != 'none')
			$shortcode .= ' style="'.$style.'"';
		
		if ($icon && !filter_var($icon, FILTER_VALIDATE_URL))
			$icon = 'icon:' . $icon;

		$shortcode .= ' icon="'.$icon.'" desc="'.$desc.'" onclick="'.$onclick.'" rel="'.$rel.'" title="'.$title.'"]';
		

		$html = do_shortcode( $shortcode );

		// remove inline CSS
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
		$path = str_replace('/blocks', '', plugin_dir_url( __FILE__ ));		
		$style = parent::get_setting($block, 'style');


		if($style != 'none'){

			/* CSS */		
			wp_enqueue_style('padma-ve-button', $path . 'css/button.css');

		}
		
	}
	
}
