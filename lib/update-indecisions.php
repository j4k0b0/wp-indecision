<?php
$data 	     = json_decode(file_get_contents('php://input'), true);
$parse_uri   = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
$post_id     = ( empty($_POST['ID']) )          ? $data['ID']          : $_POST['ID'];
$name        = ( empty($_POST['name']) )        ? $data['name']        : $_POST['name'];
$information = ( empty($_POST['information']) ) ? $data['information'] : $_POST['information'];

require_once( $parse_uri[0] . 'wp-load.php' );
add_action('acf/save_post', 'my_save_post');

if( !empty($_POST['name']) && !empty($_POST['information']) || !empty($data['name']) && !empty($data['information'])  ) :

	$output  = array();
	$value   = get_field('indecisions', $post_id);
	$value[] = array
	(
		'name'        => $name,
		'information' => $information,
		'ind_id'	  => uniqid()
	);

	update_field('indecisions', $value, $post_id);

endif;
?>