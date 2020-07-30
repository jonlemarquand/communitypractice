<?php get_header(); ?>
<main id="content" class="home-content">

<?php /*
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?> */?>
<?php if (is_user_logged_in()) { ?>
    <div class="home-div">
    <img class="home-logo" src="/wp-content/uploads/2020/07/2012-transparency-international-logo-subline-01.png"/>
<h1>Community of Practice</h1>
<div class="subtext">Bringing together Experts and Members 
of the Open Contracting community.</div>
</div>
<div class="home-div">
<p>Here you will find resources, discussions, events and contacts for those looking to implement or improve their practices.</p>
</div>
<div class="options-section">
    <div class="next-step">
        <a class="link-button" href="/knowledge-base">Explore
        </a>
        <p>Explore our Knowledge Base by category or region, see Expert profiles or find upcoming events.</p>
    </div>
    <div class="next-step">
        <div class="link-button">Engage
        </div>
        <p>Join the discussion and see what other practitioners have to say.</p>
    </div>
</div>
<?php } else { // not logged in ?>
<div class="home-div">
    <img class="home-logo" src="/wp-content/uploads/2020/07/2012-transparency-international-logo-subline-01.png"/>
<h1>Community of Practice</h1>
<div class="subtext">Bringing together Experts and Members 
of the Open Contracting community.</div>
</div>
<div class="home-div">
<p>Here you will find resources, discussions, events and contacts for those looking to implement or improve their practices.</p>
<p>We encourage all visitors to register as a member, or if you have specific expertise in one or more category you can create an Expert profile and begin curating discussions and sharing your expertise.</p>
</div>
<div class="options-section">
    <div class="next-step">
        <div class="link-button">Register
        </div>
        <p>Join discussions, share your resources and get the most out of the Knowledge Base by signing up.</p>
    </div>
    <div class="next-step">
    <a class="link-button" href="/knowledge-base">Explore
        </a>
        <p>Explore our Knowledge Base by category or region, see Expert profiles or find upcoming events.</p>
    </div>
    <div class="next-step">
        <div class="link-button">Engage
        </div>
        <p>Join the discussion and see what other practitioners have to say.</p>
    </div>
</div>
</main>
<?php } ?>
<?php get_footer(); ?>