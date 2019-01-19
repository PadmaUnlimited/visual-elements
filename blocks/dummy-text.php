<?php

class PadmaVisualElementsBlockDummyTextOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(
			'what' => array(
				'name' => 'what',
				'type' => 'select',
				'label' => 'What',
				'tooltip' => 'What to generate',
				'default' => 'paras',
				'options' => array(
					'paras' => 'Paragraphs',
					'words'=> 'Words',
					'bytes'=> 'Bytes'
				),
			),

			'amount' => array(
				'name' => 'amount',
				'type' => 'integer',
				'label' => 'Amount',
				'tooltip' => 'How many items (paragraphs or words) to generate. Minimum words amount is 5',
				'default' => 1
			),

			'cache' => array(
				'name' => 'cache ',
				'type' => 'select',
				'label' => 'Cache ',
				'default' => 'yes',
				'options' => array(
					'yes' => 'Yes',
					'no'=> 'No',
					
				),
			),
		)
	);


	public function modify_arguments($args = false) {


	}
	
}

class PadmaVisualElementsBlockDummyText extends PadmaBlockAPI {
	
	public $id 				= 'visual-elements-dummy-Text';	
	public $name 			= 'Dummy Text';
	public $options_class 	= 'PadmaVisualElementsBlockDummyTextOptions';	
	public $description 	= 'This shortcode allows you to display “lorem ipsum” text. You can choose how much paragraphs or words will be generated.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

	}
	
	public function setup_elements() {
		$this->register_block_element(array(
			'id' => 'dummy-Text',
			'name' => 'dummy-Text',
			'selector' => '.su-dummy-Text',
		));
	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		
	}
	
	public function content($block) {

		$what = parent::get_setting($block, 'what');
		$amount = parent::get_setting($block, 'amount');
		$cache = parent::get_setting($block, 'cache');

		if(is_null($what))
			$what = 'paras';

		if(is_null($amount))
			$amount = 1;

		if($amount < 1)
			$amount = 1;

		if($amount > 100)
			$amount = 100;

		if(is_null($cache))
			$cache = 'yes';

		$html = do_shortcode('[su_dummy_text what="'.$what.'" amount="'.$amount.'" cache="'.$cache.'" class=""]');
		
		// remove inline CSS for color
		$html = preg_replace('(style=("|\Z)(.*?)("|\Z))', '', $html);

		echo $html;

	}

	public static function enqueue_action($block_id, $block = false) {
	
	}
	
}	




	

