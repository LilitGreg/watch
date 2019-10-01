<?php
/* Template Name:Portfolio page*/
?>
<?php get_header(); ?>

<div class="container-fluid clearfix">
  <div class="row">
    <div class="page-header">
         <h1> <?php  the_title();  ?> </h1>
     </div>
</div>
</div>

<div class="container   clearfix">

        <?php
         $args = array(
                     'taxonomy' => 'category',
                     'orderby' => 'name',
                     'order'   => 'ASC'
                 );

         $cats = get_categories($args);
          echo "<ul class='portf-cat-lists'>"; ?>

            <!-- <div class="page-header">
                 <h1> <php  the_title();  ?> </h1>
             </div> -->

         <?php
         foreach($cats as $cat) {
            ?>
              <li>  <a href="#"> <?php echo $cat->name; ?>  </a>   </li>
            <?php
          }

        echo "</ul>"; ?>

      <?php

      $index_cat = 0;

      foreach($cats as $cat) {
           $index_cat ++;

            $catn = $cat->name;

        ?>


        <div class="tab-content-portfolio  animated fadeInUp   portfolio-<?php echo $index_cat ?>">

         <?php echo '<div class="row row_portfolio">';
              ?>
             <?php
             $argscus = array( 'post_type' => 'portfolios', 'category_name' =>  $catn,   'posts_per_page' => -1 );
            // $argscus = array( 'category_name' => 'more-top-stories', 'post_type' => 'post',  'posts_per_page' => -1, 'order'=>DESC );
     	    	$loop = new WP_Query( $argscus );
         		while ( $loop->have_posts()  ) :
         		  $loop->the_post();

                  $postid = get_the_ID();
                   $count_posts = $loop->current_post + 1;
                   if ($count_posts%3 == 1  && $count_posts!= 1) {

                        echo '</div>';
                        echo '<div class="row row_portfolio">';

                    }
                    echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                    echo '<div class="innerportfolio items">';
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
                    if($count_posts==20) {
                         break;
                    }
                endwhile;

             echo "</div>"; ?>

           </div>  <?php

       }


       ?>


</div>
<?php get_footer(); ?>
