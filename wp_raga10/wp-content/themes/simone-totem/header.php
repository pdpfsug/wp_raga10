<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Simone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>Raga10</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        setTimeout(function() {
            window.location.href = "http://localhost/wp_raga10/?post_type=tribe_events";
        }, 600000);
    });
</script> 

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
		
		<nav id="site-navigation" class="main-navigation clear" role="navigation">
                    <h1 class="menu-toggle"><a href="#"><?php _e( 'Menu', 'simone' ); ?></a></h1>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

                        <div class="search-toggle">
                            <i class="fa fa-search"></i>
                            <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'simone' ); ?></a>
                        </div>
                        <?php simone_social_menu(); ?>

			<!-- Custom nav btn -->
			<ul class="nav-menu hidden sf-js-enabled sf-arrows" style="float:right">
				<li><a href="wp-content/uploads/2016/06/Manuale_Utilizzo.pdf">Istruzioni</a></li>
				<li><a href="wp-login.php">Login</a></li>
			</ul>
			<!-- Custom nav btn -->

		</nav><!-- #site-navigation -->
                <div id="header-search-container" class="search-box-wrapper clear hide">
			<div class="search-box clear">
				<?php get_search_form(); ?>
			</div>
		</div>

	</header><!-- #masthead -->
	
	<div id="content" class="site-content">
