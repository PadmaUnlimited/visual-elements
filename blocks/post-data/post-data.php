<?php

class PadmaVisualElementsBlockPostDataOptions extends PadmaBlockOptionsAPI {
	
	public $tabs = array(
		'general' 			=> 'General',
	);

	public $sets = array(
		
	);

	public $inputs = array(
		'general' => array(

			'field' =>	array(
				'name' => 'field',
				'type' => 'select',
				'label' => 'Field',
				'default' => 'post_title',
				'options' => array(
					''	=> '',
					'ID' => 'Post ID',
					'post_author' => 'Post author',
					'post_date' => 'Post date',
					'post_date_gmt' => 'Post date GMT',
					'post_content' => 'Post content',
					'post_title' => 'Post title',
					'post_excerpt' => 'Post excerpt',
					'post_status' => 'Post status',
					'comment_status' => 'Comment status',
					'ping_status' => 'Ping status',
					'post_name' => 'Post name',
					'post_modified' => 'Post modified',
					'post_modified_gmt' => 'Post modified GMT',
					'post_content_filtered' => 'Filtered post content',
					'post_parent' => 'Post parent',
					'guid' => 'GUID',
					'menu_order' => 'Menu order',
					'post_type' => 'Post type',
					'post_mime_type' => 'Post mime type',
					'comment_count' => 'Comment count',
				),				
				'tooltip' => 'Post data field name',
			),
			'default' => array(
				'name' => 'default',
				'type' => 'text',
				'label' => 'Default',
				'tooltip' => 'This text will be shown if data is not found'
			),
			'before' => array(
				'name' => 'before',
				'type' => 'text',
				'label' => 'Before',
				'tooltip' => 'This content will be shown before the value'
			),
			'after' => array(
				'name' => 'after',
				'type' => 'text',
				'label' => 'After',
				'tooltip' => 'This content will be shown after the value'
			),
				
			'post-id' => array(
				'name' => 'post-id',
				'type' => 'text',
				'label' => 'Post ID',
				'tooltip' => 'You can specify custom post ID. Post slug is also allowed. Leave this field empty to use ID of the current post. Current post ID may not work in Live Preview mode'
			),	
		),

	);


	public function modify_arguments($args = false) {

	}
	
}

class PadmaVisualElementsBlockPostData extends PadmaBlockAPI {
	
	public $id 				= 've-postdata';	
	public $name 			= 'Post Data';
	public $options_class 	= 'PadmaVisualElementsBlockPostDataOptions';	
	public $description 	= 'Allows to display various post fields, including post title, post content, modified date etc.';
	public $categories 		= array('content');
	
	public function init() {

		if(!class_exists('Shortcodes_Ultimate'))
			return false;

		session_start();
	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'content',
			'name' => 'Content',
			'selector' => '.ve-postdata',			
		));

		$this->register_block_element(array(
			'id' => 'text',
			'name' => 'Text',
			'selector' => '.ve-postdata p',
		));

		$this->register_block_element(array(
			'id' => 'content-h1',
			'name' => 'Content h1',
			'selector' => '.ve-postdata h1',
		));

		$this->register_block_element(array(
			'id' => 'content-h2',
			'name' => 'Content h2',
			'selector' => '.ve-postdata h2',
		));

		$this->register_block_element(array(
			'id' => 'content-h3',
			'name' => 'Content h3',
			'selector' => '.ve-postdata h3',
		));

		$this->register_block_element(array(
			'id' => 'content-h4',
			'name' => 'Content h4',
			'selector' => '.ve-postdata h4',
		));

		$this->register_block_element(array(
			'id' => 'content-h5',
			'name' => 'Content h5',
			'selector' => '.ve-postdata h5',
		));

		$this->register_block_element(array(
			'id' => 'content-h6',
			'name' => 'Content h6',
			'selector' => '.ve-postdata h6',
		));

		$this->register_block_element(array(
			'id' => 'content-li',
			'name' => 'Content li',
			'selector' => '.ve-postdata li',
		));

		$this->register_block_element(array(
			'id' => 'content-a',
			'name' => 'Content link',
			'selector' => '.ve-postdata a',
		));

		$this->register_block_element(array(
			'id' => 'content-image',
			'name' => 'Content image',
			'selector' => '.ve-postdata image',
		));

		$this->register_block_element(array(
			'id' => 'content-figure',
			'name' => 'Content figure',
			'selector' => '.ve-postdata figure',
		));

	}


	public static function dynamic_css($block_id, $block = false) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

	}
	
	public function content($block) {

		global $post;

		$session_id = 've-postdata-post-id-' . $block['id'];

		if( !isset( $_SESSION[ $session_id ] ) && empty( $_SESSION[ $session_id ] ) ){
			if($post->ID && is_null($_SESSION[ $session_id ])){			
				$_SESSION['ve-postdata-post-id-' . $block['id']] = $post->ID;
			}			
		}
		

		$field = trim(parent::get_setting($block, 'field', 'post_title'));
		$default = parent::get_setting($block, 'default');
		$before = parent::get_setting($block, 'before');
		$after = parent::get_setting($block, 'after');
		$post_id = (parent::get_setting($block, 'post-id')) ? parent::get_setting($block, 'post-id') : $post->ID;

		if(!$post_id && !is_null($_SESSION['ve-postdata-post-id-' . $block['id']]))
			$post_id = $_SESSION['ve-postdata-post-id-' . $block['id']];


		$shortcode = '[su_post field="'.$field.'" post_id="'.$post_id.'"]';
		$html = '<div class="ve-postdata">'.do_shortcode( $shortcode ).'</div>';
		
		echo $html;
		

	}

	public static function enqueue_action($block_id, $block = false) {

		
	}
	
}
