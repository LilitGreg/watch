<?php get_header();?>


<div class="container">
  <div class="wrap">

  <div class="row">

  <?php
   // set the variable to the value entered for the "Weather" custom field
    // $rightside = get_post_meta($post->ID, 'right-side', true);
    $fulltside = get_post_meta($post->ID, 'full-side', true);
    //$leftside = get_post_meta($post->ID, 'left-side', true);


    $rightsiden = get_post_meta($post->ID, 'right-siden', true);
    $leftsiden = get_post_meta($post->ID, 'left-siden', true);
   // check if the weather variable has a value
   if( $rightsiden ){ ?>
     <!-- if the weather variable has a value and echo out this sentence in addition to the value of the variable -->

     <div class="single_left col-md-9  col-sm-9  col-xs-12">
         <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              <div class="clearfix">
                 <div class="post clearfix">
                         <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                             <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                 <?php the_post_thumbnail('full');  ?>

                                 <h3>
                                     <?php the_title(); ?>
                                 </h3>
                             </a>
                         <?php endif; ?>
                         <div class="text">
                             <?php  the_content(); ?>
                         </div>

                 </div>
                 <div class="postnav navigation">
                     <p class="navicon"><?php  previous_post_link('%link','< Prev'); ?></p>
                     <p class="navicon"><?php  next_post_link('%link','Next >'); ?></p>
                 </div>

              <?php endwhile; ?>
             </div>
         <?php endif; ?>


          <?php comments_template(); ?>



         <div class="clearfix" id="cust_post">
           <div class="row">

            <h3>   Related Posts   </h3>
           <div class="latest_post">
           <?php
             $argscus = array( 'post_type' => 'post', 'posts_per_page' => -1);
          $loop = new WP_Query( $argscus );
          while ( $loop->have_posts()  ) :
            $loop->the_post();

                 // $post = get_post();
                  $id = get_the_ID();

                 $count_posts = $loop->current_post + 1;
                 if ($count_posts%3 == 1  && $count_posts!= 1) {
                     var_dump($count_posts);
                     // echo '</div>';
                      echo '</div>';
                      echo '<div class="row_news">';
                       //echo '<div class="news_content clearfix">';
                  }
                  echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                  echo '<div class="innernews">';
                   if ($count_posts==4) {
                       break;
                   }
                  ?>
                     <?php if ( has_post_thumbnail()) :  ?>
                          <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                              <?php the_post_thumbnail('large');  ?>
                          </a>
                      <?php endif; ?>
                      <a href="<?php echo get_permalink(); ?>">
                       <h4>
                           <?php the_title(); ?>

                       </h4>
                      </a>
                       <span class="date"><?php the_time('F j, Y'); ?>   </span>
                      <?php
                      echo "<span class='divider'>/</span>";
                       $comments_count = wp_count_comments(   $id );
                        echo "<span class='comment-icon'>  $comments_count->total_comments  </span>";

                        echo "<span class='divider'>/</span>";
                  echo '</div>';
                  echo '</div>';

              endwhile;
                      ?>
               </div>

            </div>
          </div>



       </div>

       <div class="col-md-3 col-sm-3 col-xs-12">
         <div class="row">


           <?php  if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
            <ul class="sidebar">
                <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </ul>
        <?php endif; ?>

                 </div>
       </div>



 <?php
   // if the weather variable does not have a value then do the following
 }else  if($fulltside){  ?>


     <div class="single_left col-md-12  col-sm-12  col-xs-12">
         <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              <div class="clearfix">
                 <div class="post clearfix">
                         <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                             <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                 <?php the_post_thumbnail('full');  ?>

                                 <h3>
                                     <?php the_title(); ?>
                                 </h3>
                             </a>
                         <?php endif; ?>
                         <div class="text">
                             <?php  the_content(); ?>
                         </div>

                 </div>
                 <div class="postnav navigation">
                     <p class="navicon"><?php  previous_post_link('%link','< Prev'); ?></p>
                     <p class="navicon"><?php  next_post_link('%link','Next >'); ?></p>
                 </div>

              <?php endwhile; ?>
             </div>
         <?php endif; ?>


          <?php comments_template(); ?>



         <div class="clearfix" id="cust_post">
            <h3>   Related Posts   </h3>
           <div class="latest_post">
           <?php
             $argscus = array( 'post_type' => 'post', 'posts_per_page' => -1);
          $loop = new WP_Query( $argscus );
          while ( $loop->have_posts()  ) :
            $loop->the_post();

                 // $post = get_post();
                  $id = get_the_ID();

                 $count_posts = $loop->current_post + 1;
                 if ($count_posts%3 == 1  && $count_posts!= 1) {
                     var_dump($count_posts);
                     // echo '</div>';
                      echo '</div>';
                      echo '<div class="row_news">';
                       //echo '<div class="news_content clearfix">';
                  }
                  echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                  echo '<div class="innernews">';
                   if ($count_posts==4) {
                       break;
                   }
                  ?>
                     <?php if ( has_post_thumbnail()) :  ?>
                          <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                              <?php the_post_thumbnail('large');  ?>
                          </a>
                      <?php endif; ?>
                      <a href="<?php echo get_permalink(); ?>">
                       <h4>
                           <?php the_title(); ?>

                       </h4>
                      </a>
                       <span class="date"><?php the_time('F j, Y'); ?>   </span>
                      <?php
                      echo "<span class='divider'>/</span>";
                       $comments_count = wp_count_comments(   $id );
                        echo "<span class='comment-icon'>  $comments_count->total_comments  </span>";

                        echo "<span class='divider'>/</span>";
                  echo '</div>';
                  echo '</div>';

              endwhile;
                      ?>
               </div>

            </div>



 <!-- <php comments_template( '', true ); ?> -->
     </div>

  <?php }

   else {  ?>
     <div class="col-md-3 col-sm-3 col-xs-12">
       <div class="row">

         <?php  if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
          <ul class="sidebar">
              <?php dynamic_sidebar( 'blog-sidebar' ); ?>
          </ul>
      <?php endif; ?>

             </div>
     </div>
       <div class="single_left col-md-9  col-sm-9  col-xs-12">
           <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                <div class="clearfix">
                   <div class="post clearfix">
                           <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                               <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                   <?php the_post_thumbnail('full');  ?>

                                   <h3>
                                       <?php the_title(); ?>
                                   </h3>
                               </a>
                           <?php endif; ?>
                           <div class="text">
                               <?php  the_content(); ?>
                           </div>

                   </div>
                   <div class="postnav navigation">
                       <p class="navicon"><?php  previous_post_link('%link','< Prev'); ?></p>
                       <p class="navicon"><?php  next_post_link('%link','Next >'); ?></p>
                   </div>

                <?php endwhile; ?>
               </div>
           <?php endif; ?>


           	<?php comments_template(); ?>



           <div class=" clearfix" id="cust_post">
             <div class="row">

              <h3>   Related Posts   </h3>
             <div class="latest_post">
             <?php
               $argscus = array( 'post_type' => 'post', 'posts_per_page' => -1);
         		$loop = new WP_Query( $argscus );
         		while ( $loop->have_posts()  ) :
         		  $loop->the_post();

                   // $post = get_post();
                    $id = get_the_ID();

                   $count_posts = $loop->current_post + 1;
                   if ($count_posts%3 == 1  && $count_posts!= 1) {
                       var_dump($count_posts);
                       // echo '</div>';
                        echo '</div>';
                        echo '<div class="row_news">';
                         //echo '<div class="news_content clearfix">';
                    }
                    echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                    echo '<div class="innernews">';
                     if ($count_posts==4) {
                         break;
                     }
                    ?>
                       <?php if ( has_post_thumbnail()) :  ?>
                            <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('large');  ?>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo get_permalink(); ?>">
                         <h4>
                             <?php the_title(); ?>

                         </h4>
                        </a>
                         <span class="date"><?php the_time('F j, Y'); ?>   </span>
                        <?php
                        echo "<span class='divider'>/</span>";
                         $comments_count = wp_count_comments(   $id );
                          echo "<span class='comment-icon'>  $comments_count->total_comments  </span>";

                          echo "<span class='divider'>/</span>";
                    echo '</div>';
                    echo '</div>';

                endwhile;
                        ?>
                 </div>

              </div>
            </div>



         </div>
   <!-- <php comments_template( '', true ); ?> -->
       </div>

   <?php  }
 ?>



   </div>

   </div>
 </div>
<?php get_footer(); ?>
