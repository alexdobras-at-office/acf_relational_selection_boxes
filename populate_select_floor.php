<?php
function populate_field_select_floor( $field) {

	//get the ID of this post
	//print_r(get_the_ID() . ' - this is the current post ID');

    // reset choices
	$field['choices'] = array();

	//dynamically get the ID of the assigned location for this art item:
	$fieldfrom = get_field_object('artitem_assign_location')[value]->ID;
	//for testing try with a static $fieldfrom = 394 which is a real location post type ID

    // if has rows
	if( have_rows('location_space_builder', $fieldfrom) ) :
	

        // while has rows
        while( have_rows('location_space_builder', $fieldfrom) ) :

            // instantiate row
			the_row();

			//get the index of this row
			$floor_index = get_row_index();

			// vars
			$floor_number = get_sub_field('floor_number');
			?> <pre><?php print_r($floor_number); ?> </pre> <?php
			$floor_name = get_sub_field('floor_name');
			?> <pre><?php print_r($floor_name); ?> </pre> <?php

            // append to choices
			$field['choices'][ $floor_number ] =/* $floor_index .  " : "  . */ $floor_number . " - " . $floor_name;

		endwhile;

    endif;

	// return the field
	return $field;

}

// filter for a specific field based on it's name
add_filter('acf/load_field/name=dropdown_floors', 'show_space_constructor_based_on_location');

//end of show_space_constructor_based_on_location( $field)
?>
