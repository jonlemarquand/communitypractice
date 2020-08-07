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
                <h1><?php single_term_title(); ?></h1>
                <h2 class="tax-header">Discussions:</h2>
                <?php
    $term = get_queried_object()->slug;
    $args = array(
      'post_type' => 'discussion',
      'tax_query' => array(
        array(
          'taxonomy' => 'region',
          'field' => 'slug',
          'terms' => $term
        )
      )
    );
    $discussions = new WP_Query( $args );
    if( $discussions->have_posts() ) {
      while( $discussions->have_posts() ) {
        $discussions->the_post();
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
          <a class="view-button" href="<?php the_permalink() ?>">View Discussion</a>
      </div>
        <?php
      }
    }
    else { ?>
      <p class="no-found"><?php echo 'No discussions found'; ?></p> 
  <?php
    }
  ?>
      <h2 class="tax-header">Upcoming Events:</h2>
      <?php
              $today = date ('Ymd');
    $args = array(
      'post_type' => 'event',
      'meta_key'		=> 'date_start_date',
      'orderby'			=> 'meta_value',
      'order'				=> 'DESC',
      'meta_query' => array(
        array(
          'key'		=> 'date_start_date',
	        'compare'	=> '>=',
	        'value'		=> $today,
        )
        ),
      'tax_query' => array(
        array(
          'taxonomy' => 'region',
          'field' => 'slug',
          'terms' => $term
        )
      )
    );
    $events = new WP_Query( $args );
    if( $events->have_posts() ) {
      while( $events->have_posts() ) {
        $events->the_post();
        ?>
        <div class="post-summary">
          <a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
            <div class="post-info-box">
                  <p class="post-info"><i class="far fa-clock"></i> <?php the_field('date_start_date');?> - <?php the_field('date_end_date') ?></p>

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
            <?php the_field('description') ?>
          </div>
          <a class="view-button" href="<?php the_permalink() ?>">View Event</a>
      </div>
        <?php
      }
    }
    else { ?>
      <p class="no-found"><?php echo 'No events found'; ?></p> 
  <?php
    }
  ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();