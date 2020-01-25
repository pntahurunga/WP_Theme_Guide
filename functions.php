<?php 
    // Load the theme stylesheets
    
    function theme_styles()  
    { 
        wp_enqueue_style( 'style', get_stylesheet_uri());
    }

    add_action('wp_enqueue_scripts', 'theme_styles');

    //navigation
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ));


    //Get top ancestor 
    function get_top_ancestor_id()
    {
        global $post;

        if($post->post_parent){
            $ancerstor = array_reverse(get_post_ancestors($post->ID));
            return $ancerstor[0];
        }
        return $post->ID;
    }


    //deas page has_children
    function has_children(){
        global $post;

        $pages = get_pages('child_of='. $post->ID);
        //this will evaluate in number if 0 it will be false
        return count($pages);
    }

    // customize excerpt word count length
    function custom_excerpt_length(){
        return 50;
    }
    add_filter('excerpt_length', 'custom_excerpt_length');

    //add support for featured
    function support_for_featured(){
        add_theme_support('post-thumbnails');
        //define thumnial sizes
        add_image_size('small-thumbnail',180,120,true);
        add_image_size('banner-image',920,210,array('left', 'top'));
    }

    add_action('after_setup_theme','support_for_featured');

?>