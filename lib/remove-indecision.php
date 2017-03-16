<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
$data 	   = json_decode(file_get_contents('php://input'), true);
$post_id   = ( empty($_POST['ID']) ) ? $data['ID'] : $_POST['ID'];
$ind_id    = ( empty($_POST['ind_id']) ) ? $data['ind_id'] : $_POST['ind_id'];

require_once( $parse_uri[0] . 'wp-load.php' );
add_action('acf/save_post', 'my_save_post');

function removeElementWithValue($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}

$value = get_field( 'indecisions', $post_id );
$value = removeElementWithValue($value, 'ind_id', $ind_id );

update_field( 'indecisions', $value, $post_id);
?>