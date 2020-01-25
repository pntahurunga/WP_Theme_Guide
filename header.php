<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- site-header -->
<header>
    <h1><a href="<?php home_url();?>"><?php bloginfo('name'); ?></a></h1>
    <h3><?php bloginfo('description'); ?></h3>

    <!-- display thank you if page id is 14 -->
    <?php if(is_page(14)){?>
        Thank you for viewing our work
        <?php }?>
    <nav>
        <?php
            $args = array(
                'theme_location' => 'primary',
            );
        ?>
        
        <?php wp_nav_menu($args); ?>
    </nav>
</header>