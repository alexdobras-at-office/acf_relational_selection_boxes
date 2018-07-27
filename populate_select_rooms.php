<?php
function populate_field_select_room( $field) {

	//get the ID of the assigned location
	$fieldfrom = get_field_object('artitem_assign_location')[value]->ID;

    // reset choices
	$field['choices'] = array();

    // $value_selected_floor = get_sub_field('floor_number');
	// print_r($value_selected_floor);

	// var_dump( get_sub_field_object('floor_number') );

	if( have_rows('location_space_builder', $fieldfrom) ) :

        // while has rows
        while( have_rows('location_space_builder', $fieldfrom) ) :

			// instantiate row
			the_row();
			// echo "<h3>Floor is: " .get_row_index() . "</h3>";

			// CONDITIONAL: return true if the floor row index = DYNAMIC current floor selected //CURRENTLY IS STATIC!!!
			if( get_row_index() == 2 ) : //change this number dynamically <---------------------------------

				if( have_rows('rooms') ) :

					// while has rows
					while( have_rows('rooms') ) :

						// instantiate row
						the_row();
						// echo "<h5>room is: " .get_row_index() . "</h5>";

						//get the index of the rooms:
						$room_index = get_row_index();

						// vars
						$room_value = get_sub_field('room_number');
						$room_label = get_sub_field('room_name');

						$field['choices'][ $room_value ] = /* $room_index . " : " .  */ $room_value . " - " . $room_label;

					endwhile;

				endif;

			endif;

		endwhile;

    endif;

	// return the field
	return $field;

}

// filter for a specific field based on it's name
add_filter('acf/load_field/name=dropdown_rooms', 'populate_field_select_room');

//end of show_rooms_from_a_floor( $field)
?>
