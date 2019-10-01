<?php
/* Template Name: page-blog*/
?>
<?php get_header(); ?>

<div class="container container-main">
<div class="wrap clearfix">
    <div class="row">
        <div class="news_content clearfix">

             <h3 class="p_title">  <?php  the_title(); ?> </h3>

             <div class="col-md-3 col-sm-3">
               <div class="row">

                 <?php  if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                  <ul class="sidebar">
                      <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                  </ul>
              <?php endif; ?>

                 </div>
             </div>

             <div class="col-md-9  col-sm-9">
                <?php
                   $argscus = array( 'post_type' => 'post',  'posts_per_page' => -1 );
                  $loop = new WP_Query( $argscus );
                  while ( $loop->have_posts()) :
                    $loop->the_post();
                    $id = get_the_ID();


                       echo '<div class="single_post_new  clearfix">';
                           ?>
                       <?php if ( has_post_thumbnail()) :  ?>
                            <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('full');  ?>
                            </a>
                        <?php endif; ?>
                         <div class="right_cont_single">
                          <a href="<?php echo get_permalink(); ?>">
                           <h3>
                               <?php the_title(); ?>
                           </h3>
                          </a>
                              <span> <?php  echo "By "; echo $author = get_the_author(); ?> </span> <span class="divider">/</span>  <span class="date"><?php the_time('F j, Y'); ?>   </span>
                              <span>  <?php
                                 echo "<span class='divider'>/</span>";
                                 $comments_count = wp_count_comments(   $id );
                                  echo "<span class='comment-count'>  $comments_count->total_comments Comments   </span>";  ?>
                              </span>
                            <?php  the_excerpt(); ?>
                           <a href="<?php echo get_permalink(); ?>" class="btn btn-theme btn-theme-transparent btn-icon-left read_more">Read More </a>
                       </div>
                       <?php
                       echo '</div>';
                   endwhile;
                ?>
          </div>

        </div>
     </div>
</div>

</div>



<!-- <div  class="nav-links">
<php if ( function_exists('base_pagination') ) { base_pagination(); } else if ( is_paged() ) { ?>
<div class="navigation clearfix">
    <div class="alignleft"><php next_posts_link('&laquo; Previous Entries') ?></div>
    <div class="alignright"><php previous_posts_link('Next Entries &raquo;') ?></div>
</div>
<php } ?> -->


<?php get_footer(); ?>
