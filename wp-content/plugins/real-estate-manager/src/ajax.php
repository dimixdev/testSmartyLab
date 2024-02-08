<?php

namespace plgREM;


class Ajax
{
	
	static public function Initialization(){
		add_action('wp_ajax_ajax_rem_search', [__CLASS__, 'Search']);
		add_action('wp_ajax_nopriv_ajax_rem_search', [__CLASS__, 'Search']);
	}

	static public function Search(){

		$list = [];
		$args = [
	        'post_type' => 'real_estate',
	        'posts_per_page' => 10,
	        'meta_query' => []
	    ];


	   if (!empty($_POST['house_name'])) {
	        $args['meta_query'][] = array(
	            'key' => 'house_name',
	            'value' => sanitize_text_field($_POST['house_name']),
	            'compare' => 'LIKE'
	        );
	    }

	    if (!empty($_POST['location_coordinates'])) {
	        $args['meta_query'][] = array(
	            'key' => 'location_coordinates',
	            'value' => sanitize_text_field($_POST['location_coordinates']),
	            'compare' => 'LIKE'
	        );
	    }

	    if (!empty($_POST['number_of_floors'])) {
	        $args['meta_query'][] = array(
	            'key' => 'number_of_floors',
	            'value' => sanitize_text_field($_POST['number_of_floors']),
	            'compare' => '='
	        );
	    }

	    if (!empty($_POST['type_of_structure'])) {
	        $args['meta_query'][] = array(
	            'key' => 'type_of_structure',
	            'value' => sanitize_text_field($_POST['type_of_structure']),
	            'compare' => '='
	        );
	    }

		$query = new \WP_Query($args);

		if ($query->have_posts()){
			while ($query->have_posts()){
	    		$query->the_post();
	    		$list[] = [
	    			'house_name' => get_field('house_name'),
	    			'location_coordinates' => get_field('location_coordinates'),
	    			'number_of_floors' => get_field('number_of_floors'),
	    			'type_of_structure' => get_field('type_of_structure'),
	    		];
	    		wp_reset_postdata();
	    	} 
		}
    	
    	echo json_encode($list);
		wp_die();
	}


}
