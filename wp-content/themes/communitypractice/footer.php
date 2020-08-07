</div>
<footer id="footer">
    <div class="footer-content">
    <div class="footer-columns">
        <div class="footer-column">
            <div class="bigmenuhead">Categories</div>
            <ul>
            <?php
   $args = array(
               'taxonomy'         => 'category',
               'hide_empty'       => 0,
               'orderby'          => 'name',
           );

   $cats = get_categories($args);

   foreach($cats as $cat) {
?>
       <a class="white-link" href="<?php echo get_category_link($cat->term_id); ?>">
           <li><?php echo $cat->name; ?></li>
       </a>
<?php
   }
?>
</ul>
        </div>
        <div class="footer-column">            
            <div class="bigmenuhead">Regions</div>
            <?php
   $args = array(
               'taxonomy'         => 'region',
               'hide_empty'       => 0,
               'orderby'          => 'name'
           );

   $cats = get_categories($args);

   foreach($cats as $cat) {
?>
       <a class="white-link" href="<?php echo get_category_link($cat->term_id); ?>">
           <li><?php echo $cat->name;?></li>
       </a>
<?php
   }
?>
        </div>
        <div class="footer-column">            
            <div class="bigmenuhead">Discussions</div>
            <ul>
            <?php
                $args = array(
                    'post_type' => 'discussion',
                    /*'tax_query' => array(
                      array(
                        'taxonomy' => 'product_category',
                        'field' => 'slug',
                        'terms' => 'boardgames'
                      )
                    )*/
                  );
            $discussions = new WP_Query( $args );
    if( $discussions->have_posts() ) {
      while( $discussions->have_posts() ) {
        $discussions->the_post();
        ?>
          <a class="white-link" href="<?php the_permalink() ?>"><li><?php the_title() ?></li></a>
        <?php
      }
    }
    else { ?>
      <p class="no-found"><?php echo 'No discussions found'; ?></p> 
  <?php
    }
  ?>
  </ul>
        </div>
    </div>
</div>
</footer>
</div>
<?php /*<script src="/wp-content/themes/communitypractice/js/login.js"*/ ?>
<?php wp_footer(); ?>
</body>
</html>