<?php 
get_header();

    if(have_posts()):
        while(have_posts()): the_post();
?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php the_content(); ?>


<?php endwhile;

    else:
        echo '<p>No content found</p>'; 
    endif;

    get_footer();
?>