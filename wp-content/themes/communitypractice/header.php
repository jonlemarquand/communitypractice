<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Oswald:wght@500&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/422386384b.js" crossorigin="anonymous"></script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header">
<?php if (is_user_logged_in()) { ?>

    <div class="loginbar">
    <a class="link-button log-button" href="<?php echo wp_logout_url(get_permalink()); ?>">
        Log Out
    </a>
    <a href="/profile" class="log-username"><i class="fas fa-user"></i><p><?php echo wp_get_current_user()->display_name; ?></p></a>
    </div>
    <div class="nav-menu">
        <img class="nav-logo" src="/wp-content/uploads/2020/07/2012-transparency-international-logo-subline-01.png" />
    <?php wp_nav_menu( array( 
        'theme_location' => 'header-menu',
        'link_before' => '<div class="nav-link">',
        'link_after' => '</div>'
        ) );?>
    </div>
<?php } else { // not logged in ?>

    <div class="loginbar">
        <div class="link-button log-button">
            Log In
        </div>
    </div>
    <div class="nav-menu">
        <img class="nav-logo" src="/wp-content/uploads/2020/07/2012-transparency-international-logo-subline-01.png" />
    <?php wp_nav_menu( array( 
        'theme_location' => 'logged-out-menu',
        'link_before' => '<div class="nav-link">',
        'link_after' => '</div>'
        ) );?>
    </div>

<?php } ?>
</header>
<?php /* ORIGINAL
<header id="header">
<div id="branding">
<div id="site-title">
<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
</div>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</div>
<nav id="menu">
<div id="search"><?php get_search_form(); ?></div>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
</header>
*/ ?>
<div id="container">