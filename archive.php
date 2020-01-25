<?php 
get_header();

    if(have_posts()):
        while(have_posts()): the_post();
?>
    <?php
        if(is_category()){
            //echo 'This is a category archive';
            single_cat_title();
        }
        elseif(is_tag()){
           // echo 'This is a tag archive';
           single_tag_title();
        }
        elseif(is_author()){
            the_post();
            echo 'Auther archive: '. get_the_author();
            rewind_posts();
        }elseif(is_day()){
            echo 'Daily Archives: ' . get_the_date();
        }
        elseif(is_month()){
            echo 'Monthly Archives: ' . get_the_date('F Y');
        }elseif(is_year()){
            echo 'Yearly Archives: ' . get_the_date('Y');
        }
        else{
            echo 'Archives';
        }
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
    <?php the_content(); ?>


<?php endwhile;

    else:
        echo '<p>No content found</p>'; 
    endif;

    get_footer();
?>