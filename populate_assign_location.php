<?php

function populate_assign_location_field( $args, $field, $post_id ) {

	//query locations available only to that logged user
	$args = array(
		'post_type' => 'location',
		'author' 	=> get_current_user_id()
	);

	// $field['required'] = true;

	// return
	return $args;

}

// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=artitem_assign_location', 'my_post_object_query', 10, 3);

?>
