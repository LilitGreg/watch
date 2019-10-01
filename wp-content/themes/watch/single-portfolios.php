<?php get_header();?>

<div class="portfolio-header">
  <h1>
     <?php the_title(); ?>
   </h1>
</div>


<div class="container single-portfolios-container">

  <?php
    $argscus = array( 'post_type' => 'portfolios', 'posts_per_page' => -1);
    $loop = new WP_Query( $argscus );

    // if(have_posts()) : ><php while(have_posts()) : the_post();

      $postid = get_the_ID();
      $meta = get_post_meta( $postid, 'your_fields', true ); ?>



   <div class="col-md-6 col-md-6 col-sm-12 project-media">

     <div class="slider owl-carousel owl-theme">
             <div>  <img  src="<?php  echo get_theme_mod( 'slide1', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" /> </div>
            <div>  <img  src="<?php  echo get_theme_mod( 'slide1', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" /> </div>
            <div>  <img  src="<?php  echo get_theme_mod( 'slide1', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" /> </div>


       </div>
    </div>


  <div class="col-md-6 col-md-6 col-sm-12">


                  <div class="clearfix">
                     <div class="post">

                                 <?php  the_content(); ?>
                     </div>

                  </div>


</div>
  <!-- <php endwhile; ?>
     <php endif; -->

<?php  wp_reset_postdata(); ?>

<hr class="page-divider">
<div class="container">
   <!-- <div class="row"> -->
     <ul class="postnav clearfix">
         <li class="navicon  btn-theme-transparent pull-right btn-icon-right"><?php  next_post_link('%link','<< Newer'); ?></li>
         <li class="navicon  btn-theme-transparent pull-left btn-icon-left"><?php  previous_post_link('%link','<< Older'); ?></li>

     </ul>
   <!-- </div> -->
</div>


</div>


<div class="container  single-related-portfolios  clearfix">
    <hr class="page-divider half">
    <h2 class="block-title"><span>Related project</span></h2>
        <?php echo '<div class="row row_portfolio">';
             ?>
            <?php
           $argscus = array( 'post_type' => 'portfolios',  'posts_per_page' => -1 );
          // $argscus = array( 'category_name' => 'more-top-stories', 'post_type' => 'post',  'posts_per_page' => -1, 'order'=>DESC );
    		$loop = new WP_Query( $argscus );
    		while ( $loop->have_posts()  ) :
    		  $loop->the_post();
           $postid = get_the_ID();


              $count_posts = $loop->current_post + 1;
              if ($count_posts%4 == 1  && $count_posts!= 1) {


                   echo '</div>';
                   echo '<div class="row row_portfolio">';

               }
               echo '<div class="col-md-3 col-sm-3 col-xs-12">';
               echo '<div class="innerportfolio">';
                   ?>
                   <?php if ( has_post_thumbnail()) :  ?>
                       <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                           <?php the_post_thumbnail('medium');  ?>
                       </a>
                   <?php endif; ?>
                   <div class="portfolio_content">

                       <a href="<?php echo get_permalink(); ?>">
                        <h3>
                            <?php the_title(); ?>

                        </h3>


                           <?php
                              $category_detail = get_the_category($postid);//$post->ID
                                foreach($category_detail as $cd){
                                echo  "<h5>" . $cd->cat_name . "</h5>";
                            }  ?>


                       </a>
                   </div>

                   <?php
               echo '</div>';
               echo '</div>';
               if($count_posts==4) {
                    break;
               }
           endwhile;



        echo "</div>"; ?>


</div>



<?php get_footer(); ?>
