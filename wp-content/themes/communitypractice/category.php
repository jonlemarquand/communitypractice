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
          'taxonomy' => 'category',
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
    else {
      echo 'No discusssions found';
    }
  ?>
              </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();