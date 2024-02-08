<?php

namespace plgREM;


class Core
{
	static private string $assets_url=plgREM_URL . 'assets/';

	static public function Initialization(){
		self::Include();
        Ajax::Initialization();
        Post::Initialization();
        self::enqueue_css_js();
	}

    static public function Include(){
        include_once(__DIR__ . '/post.php');
        include_once(__DIR__ . '/ajax.php');
    }

    static public function enqueue_css_js(){

    	if(is_admin())return false;

    	wp_enqueue_style(
            'real-estate-manager-css',
            self::$assets_url . 'style.css',
            null,
            plgREM_VAERISON
        );

        wp_enqueue_script(
            'real-estate-manager-js',
            self::$assets_url. 'script.js',
            array( 'jquery', 'wp-util' ),
            plgREM_VAERISON,
            true
        );

        wp_localize_script('real-estate-manager-js', 'my_ajax_obj', [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);
    }


}

Core::Initialization();