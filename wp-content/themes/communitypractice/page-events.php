<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage communitypractice
 * @since 2.0.0
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="general-page-content">
                <h1>Events</h1>
                <h2>Upcoming Events</h2>
                <?php
    $args = array(
      'post_type' => 'event',
      /*'tax_query' => array(
        array(
          'taxonomy' => 'product_category',
          'field' => 'slug',
          'terms' => 'boardgames'
        )
      )*/
    );
    $events = new WP_Query( $args );
    if( $events->have_posts() ) {
      while( $events->have_posts() ) {
        $events->the_post();
        ?>
        <div class="post-summary">
          <a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
            <div class="post-info-box">
                  <p class="post-info">Started by: <?php the_author() ?></p>
                  <p class="post-info"><i class="far fa-clock"></i> <?php the_date() ?></p>

            </div>
            <div class="post-info-box">
                  <p class="post-info">
                        <i class="fas fa-tags"></i> 
                        <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?> 
                  </p>
                  <p class="post-info">
                        <i class="fas fa-globe-americas"></i>
                        <?php echo get_the_term_list( $post->ID, 'region', '', ', ', '' ); ?> 
                  </p>
            </div>
          <div class="post-content">
            <?php the_content() ?>
          </div>
          <a class="view-button" href="<?php the_permalink() ?>">View Event</a>
      </div>
        <?php
      }
    }
    else {
      echo 'No discusssions found';
    }
  ?>
                  <h2>Past Events</h2>

              </div>

            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
