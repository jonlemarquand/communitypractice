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
<script>
jQuery(document).ready(function(){
    jQuery('input[type="radio"]').click(function(){
        var inputValue = jQuery(this).attr("value");
        var targetOptions = jQuery("." + inputValue);
        jQuery(".options").not(targetOptions).hide();
        jQuery(targetOptions).show();
    });
});
</script>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="general-page-content">
                <h1>Register</h1>
                <form class="registration-form">
                    <div>
                        <h2>I'm signing up as a:</h2>
                        <div class="member-type">
                        <div>
                            <input type="radio" id="member" name="drone" value="member" checked>
                            <label for="member">Member</label>
                        </div>
                        <div>
                            <input type="radio" id="expert" name="drone" value="expert">
                            <label for="expert">Expert</label>
                        </div>
                    </div>
                    </div>
                    <div class="member-info">
                    <h2>1. Sign-Up Information:</h2>
                    <label for="email">Email:</label>
                        <input type="email">
                        <label for="password">Password:</label>
                        <input type="password">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password">
                    <h2>2. About You:</h2>
                        <label for="first_name">First Name:</label>
                        <input type="text">
                        <label for="last_name">Surname:</label>
                        <input type="text">
                        <label for="last_name">Your Organisation:</label>
                        <input type="text">
                        <label for="last_name">Job Title:</label>
                        <input type="text">
                    </div>
                    <div class="expert options">
                    <h2>3. Your Areas of Expertise:</h2>
                    <div class="expert-columns">
                        <div class="expert-column">
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
                            <div>
                                <input type="checkbox"  name="<?php $cat->term_id?>">  
                                <label for="<?php $cat->term_id?>"><?php echo $cat->name ?></label>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="expert-column">
                            <?php
                                $args = array(
                                    'taxonomy'         => 'region',
                                    'hide_empty'       => 0,
                                    'orderby'          => 'name'
                                );

                                $cats = get_categories($args);

                                foreach($cats as $cat) {
                            ?>
                            <div>
                                <input type="checkbox"  name="<?php $cat->term_id?>">  
                                <label for="<?php $cat->term_id?>"><?php echo $cat->name ?></label>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    </div>
                <input type="submit">
                </form>
<?php
/* Member & Expert
Bio
Profile Picture
*/
?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

