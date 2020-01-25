<?php 
get_header();

    if(have_posts()):
        while(have_posts()): the_post();
?>
    <?php 
    if(has_children() OR $post->post_parent > 0) {?>
        <div>
            <div>
                <!-- print the parent link title -->
                <a href="<?php the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a>
            </div>
            <!-- add sub pages -->
            <?php 
            $args = array(
                // child of current page being viewed 
                'child_of' => get_top_ancestor_id(),
                // remove the title of listed page
                'title_li' => ''

            )
            ?>
            <?php wp_list_pages($args) ?>
        </div>
    <?php };?>
    <?php the_post_thumbnail('small-thumbnail'); ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php the_content(); ?>


<?php endwhile;

    else:
        echo '<p>No content found</p>'; 
    endif;

    get_footer();
?>