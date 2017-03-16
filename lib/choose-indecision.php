<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
$data 	   = json_decode(file_get_contents('php://input'), true);
$post_id   = ( empty($_POST['ID']) ) ? $data['ID'] : $_POST['ID'];
$output    = array();

require_once( $parse_uri[0] . 'wp-load.php' );


//Get All Indecisions
if( have_rows('indecisions', $post_id) ):

    while ( have_rows('indecisions', $post_id) ) : the_row();

		$row =  array
		(
			'name'   	  => get_sub_field('name'),
			'information' => get_sub_field('information'),
		);

		array_push($output, $row);

    endwhile;

endif;

$length = count($output) - 1;

//Select Option
$selected = rand(0, $length);


header('Content-Type: application/json');
echo json_encode($output[$selected]);
?>