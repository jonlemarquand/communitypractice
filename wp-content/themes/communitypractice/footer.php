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
               'exclude' => 'uncategorized'
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
        </div>
        <div class="footer-column">            
            <div class="bigmenuhead">Events</div>
        </div>
    </div>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>