<?php get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="general-page-content discussion-template">
              <h2>Event</h2>          
              <?php
get_header();
 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title()?></h1>
  <div class="post-info-box">
                  <p class="post-info"><i class="far fa-clock"></i> 
                  <?php 
                           
                  the_field('date_start_date');?> - <?php the_field('date_end_date') ?></p>
                  <p class="post-info">
                        <i class="fas fa-tags"></i> 
                        <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?> 
                  </p>
                  <p class="post-info">
                        <i class="fas fa-globe-americas"></i>
                        <?php echo get_the_term_list( $post->ID, 'region', '', ', ', '' ); ?> 
                  </p>
      </div>
      <div class="event-info">
            <div>
                  <h2>Location:</h2> 
                  <p><?php echo get_post_meta($post->ID, 'location', true); ?></p>
            </div>
  <h2>Description:</h2>
  <p>
<?php echo get_post_meta($post->ID, 'description', true);?></p>
<?php if(get_post_meta($post->ID, 'booking_url', true)):?>
<a href="<?php echo get_post_meta($post->ID, 'booking_url', true);?>" class="view-button">Register Here</a>
</div>
<?php endif ?>
<?php
        the_content();
        
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();