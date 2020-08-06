<?php get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="general-page-content discussion-template">
              <h2>Discussion</h2>          
              <?php
get_header();
 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title()?></h1>
  <div class="post-info-box">
                  <p class="post-info">Started by: <?php the_author() ?></p>
                  <p class="post-info"><i class="far fa-clock"></i> <?php the_date() ?></p>
                  <p class="post-info">
                        <i class="fas fa-tags"></i> 
                        <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?> 
                  </p>
                  <p class="post-info">
                        <i class="fas fa-globe-americas"></i>
                        <?php echo get_the_term_list( $post->ID, 'region', '', ', ', '' ); ?> 
                  </p>
            </div>
  <h2>Summary:</h2>
  
<?php
        the_content();
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
?>
<h2>Discussion:</h2>
<?php comments_template();
?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();