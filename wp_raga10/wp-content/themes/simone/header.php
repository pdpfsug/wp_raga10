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
<script type='text/javascript'>
    function showDiv() {
        if (document.getElementById('header-immagine').style.display == 'block') {
            document.getElementById('header-immagine').style.display = 'none';
 	    document.getElementById('prova').innerHTML = "Espandi";
        } else {
            document.getElementById('header-immagine').style.display = 'block';
	    document.getElementById('prova').innerHTML = "Riduci";
        }
    }
</script>
<head>
<title>Raga10</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		
            <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'simone' ); ?></a>
			
                <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) { ?>
                <figure class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                    </a>
                </figure>
                <?php } // End header image check. ?>
            <?php
                if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
                    echo '<div id="header-immagine" class="site-branding header-background-image" style="background-image: url(' . get_header_image() . '); display: block">';
                } else {
                    echo '<div class="site-branding">';
                }
            ?>
                    <div class="title-box">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
		</div>
		
		<nav id="site-navigation" class="main-navigation clear" role="navigation">
                    <h1 class="menu-toggle"><a href="#"><?php _e( 'Menu', 'simone' ); ?></a></h1>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

                        <div class="search-toggle">
                            <i class="fa fa-search"></i>
                            <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'simone' ); ?></a>
                        </div>
                        <?php simone_social_menu(); ?>

			<!-- Custom nav btn -->
			<ul class="nav-menu sf-js-enabled sf-arrows" style="float:right">
				<li><a id="prova" href="#" onClick="showDiv();">Riduci</a></li>
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
