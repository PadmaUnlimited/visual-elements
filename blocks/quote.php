<?php

class PadmaVisualElementsBlockQuoteOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(

			/*
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
				'tooltip' => 'Choose style for this'
			),*/

			'cite' => array(
				'name' => 'cite',
				'type' => 'text',
				'label' => 'Cite',
				'tooltip' => 'Quote author name'
			),

			'quote' => array(
				'name' => 'quote',
				'type' => 'text',
				'label' => 'Quote',
				'tooltip' => 'Quote text'
			),
			
			'url' => array(
				'name' => 'url',
				'type' => 'text',
				'label' => 'Url',
				'tooltip' => 'Url of the quote author. Leave empty to disable link'
			),			
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockQuote extends PadmaBlockAPI {
	
	public $id 				= 've-quote';	
	public $name 			= 'Quote';
	public $options_class 	= 'PadmaVisualElementsBlockQuoteOptions';	
	public $description 	= 'Allows you to insert quotes in your content. You can specify quote author and link.';
	public $categories 		= array('content');
	public $inline_editable = array('block-title', 'block-subtitle', 'su-quote-inner');	
	public $inline_editable_equivalences = array('su-quote-inner' => 'quote');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'quote',
			'name' => 'quote',
			'selector' => 'div.su-quote',			
		));

		$this->register_block_element(array(
			'id' => 'quote-pre-img',
			'name' => 'quote pre-img',
			'selector' => 'div.su-quote:before',
		));

		$this->register_block_element(array(
			'id' => 'quote-post-img',
			'name' => 'quote post-img',
			'selector' => 'div.su-quote:after',
		));

		$this->register_block_element(array(
			'id' => 'quote-content',
			'name' => 'quote content',
			'selector' => 'div.su-quote .su-quote-inner',
		));

		$this->register_block_element(array(
			'id' => 'quote-cite',
			'name' => 'quote cite',
			'selector' => 'div.su-quote .su-quote-inner .su-quote-cite',
		));

		$this->register_block_element(array(
			'id' => 'quote-cite-link',
			'name' => 'quote cite link',
			'selector' => 'div.su-quote .su-quote-inner .su-quote-cite a',
		));

	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {
		
		$style = parent::get_setting($block, 'style', 'default');
		$url = parent::get_setting($block, 'url');
		$cite = parent::get_setting($block, 'cite');
		$quote = parent::get_setting($block, 'quote');

		$shortcode = '[su_quote url="'.$url.'" style="'.$style.'" cite="'.$cite.'" class="quote"]';
		$shortcode .= $quote;
		$shortcode .= '[/su_quote]';
			
		$html = do_shortcode( $shortcode );

		// remove inline CSS
		//$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);
		
	}
	
}
