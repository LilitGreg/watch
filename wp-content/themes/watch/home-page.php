<?php
/* Template Name: home-page*/
?>
<?php get_header(); ?>

 <div class="container containter-main">
   <div class="row">

    <div class="backimg">

         <div class="col-md-3 col-sm-3 col-xs-12">
           <div class="row">

            <?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
              <ul class="sidebar">
                  <?php dynamic_sidebar( 'home-sidebar' ); ?>
              </ul>
          <?php endif; ?>

          </div>

         </div>

        <div class="col-md-9  col-sm-9  col-xs-12 slider owl-carousel owl-theme">
            <div class="slide1">
                <img  src="<?php  echo get_theme_mod( 'slide1', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" />
                <div class="caption-content">
                    <h2 class="caption-title"> <?php  echo get_theme_mod( 'caption-header-slide1', 'No copyright information has been saved yet.' );  ?></h2>
                      <h3 class="caption-subtitle"><?php  echo get_theme_mod( 'caption2-header-slide1', 'No copyright information has been saved yet.' );  ?></h3>

                        <a class="btn btn-theme" href="<?php  echo get_theme_mod( 'button-slide1', 'No copyright information has been saved yet.' );  ?>">Shop Now</a>

                </div>

            </div>

            <div class="slide2">
                <img  src="<?php  echo get_theme_mod( 'slide2', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" />
                <div class="caption-content">
                    <h2 class="caption-title"> <?php  echo get_theme_mod( 'caption-header-slide2', 'No copyright information has been saved yet.' );  ?></h2>
                      <h3 class="caption-subtitle"><?php  echo get_theme_mod( 'caption2-header-slide2', 'No copyright information has been saved yet.' );  ?></h3>

                        <a class="btn btn-theme" href="<?php  echo get_theme_mod( 'button-slide2', 'No copyright information has been saved yet.' );  ?>">Shop Now</a>

                </div>
            </div>
            <div class="slide3">
                <img  src="<?php  echo get_theme_mod( 'slide3', 'No copyright information has been saved yet.' );  ?>"  class="sldan" alt="learn" />
                <div class="caption-content">
                  <div class="caption-content-inner">
                    <h2 class="caption-title"> <?php  echo get_theme_mod( 'caption-header-slide3', 'No copyright information has been saved yet.' );  ?></h2>
                      <h3 class="caption-subtitle"><?php  echo get_theme_mod( 'caption2-header-slide3', 'No copyright information has been saved yet.' );  ?></h3>

                        <a class="btn btn-theme" href="<?php  echo get_theme_mod( 'button-slide3', 'No copyright information has been saved yet.' );  ?>">Shop Now</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
  </div>
 </div>


 <div class="container slider-sides home-containter">
    <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="backimg-home-slider"   style="background-image:url(
                        <?php  echo get_theme_mod( 'home-slider-left', 'No copyright information has been saved yet.' );?>
                    );">

            <div class="caption">
              <h2> <span>  <?php  echo get_theme_mod( 'caption-slider-title', 'No copyright information has been saved yet.' );?> </span> </h2>
               <h2>  <span> <?php  echo get_theme_mod( 'caption-slider-subtitle', 'No copyright information has been saved yet.' );?></span> </h2>
                 <a  class="btn btn-theme btn-slider"  href= "<?php  echo get_theme_mod( 'caption-slider-button', 'No copyright information has been saved yet.' );?>"> Shop Now </a>
            </div>

        </div>



          </div>

       <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="backimg-home-slider"   style="background-image:url(
                        <?php  echo get_theme_mod( 'home-slider-right', 'No copyright information has been saved yet.' );?>
                    );">

            <div class="caption">
              <h2> <span> <?php  echo get_theme_mod( 'caption-slider-right-title', 'No copyright information has been saved yet.' );?> </span></h2>
               <h2> <span> <?php  echo get_theme_mod( 'caption-slider-right-subtitle', 'No copyright information has been saved yet.' );?> </h2>
                 <a  class="btn btn-theme btn-slider"  href= "<?php  echo get_theme_mod( 'caption-slider-right-button', 'No copyright information has been saved yet.' );?>"> Shop Now </a>
            </div>

        </div>

       </div>
    </div>
 </div>


<div class="container  home-cont home-containter clearfix">

    <div class="row">

          <div class="col-md-4  col-sm-4  col-xs-4 line"> </div>

            <h4 class="col-md-4 col-sm-4 col-xs-4"> FEATURED - <span> NEWEST </span> - TOP SELLERS </h4>

          <div class="col-md-4  col-sm-4  col-xs-4 line"> </div>

      </div>

       <div class="row">
         <!-- <php  echo do_shortcode('[featured_products_slider slide_to_show="4"] '); -->
            <?php  echo do_shortcode('[featured_products]');
            ?>
       </div>



    <div class="row">
      <h3 class="section-title"> TOP RATED PRODUCTS </h3>
      <?php  echo do_shortcode('[top_rated_products per_page="6"]');
       ?>
    </div>
  </div>




  <div class="container home-containter  clearfix">
      <h2 class="block-title"><span>Our Recent posts</span></h2>
      <div class="row recent-post-home">

              <?php
             $argscus = array( 'post_type' => 'post',  'posts_per_page' => -1 );
            // $argscus = array( 'category_name' => 'more-top-stories', 'post_type' => 'post',  'posts_per_page' => -1, 'order'=>DESC );
      		$loop = new WP_Query( $argscus );
      		while ( $loop->have_posts()  ) :
      		  $loop->the_post();

               $postid = get_the_ID();

                $count_posts = $loop->current_post + 1;
                if ($count_posts%2 == 1  && $count_posts!= 1) {


                     echo '</div>';
                     echo '<div class="row recent-post-home">';

                 }
                 echo '<div class="col-md-6 col-sm-6 col-xs-12">';
                 echo '<div class="inner-post-home clearfix">';
                     ?>
                     <?php if ( has_post_thumbnail()) :  ?>
                         <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                             <?php the_post_thumbnail('medium');  ?>
                         </a>
                     <?php endif; ?>
                     <div class="post_content_home">

                         <a href="<?php echo get_permalink(); ?>">
                          <h4>
                              <?php the_title(); ?>

                          </h4>

                         </a>
                           <p> <?php the_excerpt(); ?>  </p>

                          <span class="date"><?php the_time('F j, Y'); ?>   </span>
                           <?php
                          echo "<span class='divider'>/</span>";
                            $comments_count = wp_count_comments(  $postid );
                            echo "<span class='comment-icon'>  $comments_count->total_comments  </span>";

                            echo "<span class='divider'>/</span>"; ?>

                     </div>

                     <?php
                 echo '</div>';
                 echo '</div>';
                 if($count_posts==20) {
                      break;
                 }
             endwhile;  ?>

       </div>
  </div>




  <div class="container product-lists">
     <div class="row">
           <div class="col-md-4 col-sm-4 col-xs-12">


             <div class="product-list">
                  <a class="btn btn-theme btn-title-more" href="product-category/men/">See All</a>
                  <h4 class="block-title"><span>TOP SELLERS </span></h4>

                     <?php   echo do_shortcode('[products limit="3" tag="top-sellers"]'); ?>

              </div>




           </div>
           <div class="col-md-4 col-sm-4 col-xs-12">

             <div class="product-list">
                  <a class="btn btn-theme btn-title-more" href="product-category/men/">See All</a>
                  <h4 class="block-title"><span>Men Watches</span></h4>

                  <?php   echo do_shortcode('[products limit="3" category="men"]'); ?>

              </div>

           </div>



           <div class="col-md-4 col-sm-4 col-xs-12">
             <div class="product-list">
                  <a class="btn btn-theme btn-title-more" href="product-category/women/">See All</a>
                  <h4 class="block-title"><span>Womens Watches</span></h4>

                       <?php   echo do_shortcode('[products limit="3" category="women"]'); ?>

              </div>
           </div>


        </div>
     </div>
  </div>



<?php get_footer(); ?>
