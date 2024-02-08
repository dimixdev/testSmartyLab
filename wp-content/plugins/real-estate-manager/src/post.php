<?php

namespace plgREM;


class Post
{

    static private $post_type_name='Объект недвижимости';
    static private $taxonomy_name='Район';
	
	static public function Initialization(){
		add_action('init', [__CLASS__, 'register_post_type']);
        add_action('init', [__CLASS__, 'register_taxonomy']);
        add_shortcode('real_estate_manager', [__CLASS__, 'start_render_real_estate']);
	}

	static public function register_post_type()
    {
        $args = [
            'labels' => [
                'name' => __(self::$post_type_name),
                'singular_name' => 'real_estate_objects'
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'rewrite' => ['slug' => 'real-estate']
        ];
        register_post_type('real_estate', $args);
    }

    static public function register_taxonomy()
    {
        $args = [
            'labels' => [
                'name' => __(self::$taxonomy_name),
                'singular_name' => 'area'
            ],
            'public' => true,
            'hierarchical' => true,
        ];
        register_taxonomy('district', 'real_estate', $args);
    }

    static public function start_render_real_estate()
    {
        ob_start();
        include_once(__DIR__ . '/template.php');
        return ob_get_clean();

       
    }
    
}


class RealEstateFilterWidget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'real_estate_filter_widget',
            __('Real Estate Manager', 'text_domain'),
            array('description' => __('Real Estate Manager', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . __('Real Estate Manager') . $args['after_title'];
        
        echo Post::start_render_real_estate();
        echo $args['after_widget'];
    }
}


function register_real_estate_filter_widget()
{
    \register_widget('plgREM\\RealEstateFilterWidget');
}
\add_action('widgets_init', 'plgREM\\register_real_estate_filter_widget');
