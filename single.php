<?php 
get_header();

    if(have_posts()):
        while(have_posts()): the_post();
?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <p><?php the_time('m/d/y');  ?></p>
    <p><?php the_time('F jS, Y');?></p>
    <p><?php the_time('F jS, Y g:i a');?></p> |

    <!-- this will display a link that link to all post for this author -->
    <p>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a></p>
    
    <!-- print category for the post -->
    | Posted in 
    <?php 
        $categories = get_the_category();
        $separator = ", ";
        $output = '';

        if($categories){
            foreach($categories as $category){
                //$output .= $category->cat_name .$separator;
                $output .=' <a href="'.get_category_link($category->term_id).'">' .$category->cat_name .'</a>' .$separator;
            }
            echo trim($output, $separator) ;
        }
    ?>
    <br />
    <?php the_post_thumbnail('banner-image') ?>
    <!-- < ?php the_excerpt('Read more &raquo;'); ?> -->
    <?php the_content('Read more &raquo;'); ?>


<?php endwhile;

    else:
        echo '<p>No content found</p>'; 
    endif;

    get_footer();
?>