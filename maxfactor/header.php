<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

?>
<!doctype>
<html>
<!--[if lte IE 9]>
<html class="ie">
<![endif]-->
	<head>
		<title><?php wp_title('–', true, 'right'); ?><?php bloginfo('name'); ?></title>

		<meta http-equiv="Content-Type" content="text/html" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="language" content="en" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="<?php echo get_the_excerpt(); ?>">

<!-- Open Graph -->
<meta property="og:type" content="<?php if ( is_home() ) { echo "article"; } else { echo "website"; } ?>" />
<meta property="og:url" content="<?php echo get_permalink(); ?>" />
<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>" />

<meta property="og:title" content="<?php echo get_the_title(); ?>" />
<meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
<?php if ( has_post_thumbnail() ) : ?>
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
<?php endif; ?>

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@SarahGreenhouse">

<meta name="twitter:title" content="<?php echo get_the_title(); ?>">
<meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>">
<?php if ( has_post_thumbnail() ) : ?>
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
<?php endif; ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T75QZRH');</script>
<!-- End Google Tag Manager -->
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

        <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<section class="background-colour-utility section--utility" id="">
    	<div class="grid ">
		<div class="col--1-of-2">
			    <div class="content content--tagline">
	<p><?php bloginfo('description'); ?></p>
</div>		</div>
		<div class="col--1-of-2">
			    <div class="content content--nav content--nav-utility set-right" role="navigation">
	<nav>
        <?php wp_nav_menu( array( 'theme_location' => 'utility-menu', 'container' => '', 'menu_class' => 'nav-menu' ) ); ?>    </nav>
</div>		</div>
	</div>
</section><div class="section" id="header">
	<div class="grid set-middle">
		<div class="col--1-of-4 col--large-1-of-1" id="logo">
			<?php $description = get_bloginfo( 'description', 'display' ); ?>
<div class="content content--logo-text">
<?php
    is_front_page() && is_home() ? $site_branding_tag = "h2" : $site_branding_tag = "p"; ?>
	<<?php echo($site_branding_tag); ?> class="site-title">
	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php 
                if (get_theme_mod("site_logo")) {
            ?>
                <img src="<?php echo(get_theme_mod("site_logo")) ?>" alt="<?php echo($description); ?>">
            <?php 
                } else {
            ?>
                <span><?php echo(bloginfo( 'name' )); ?></span>
            <?php
                }
            ?>
	    </a>
	</<?php echo($site_branding_tag); ?>>
</div>		</div>
		<div class="col" id="navigation">			
			<div class="content content--nav content--nav-main" role="navigation">
				<nav>
            	<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '', 'menu_class' => 'nav-menu' ) ); ?>				</nav>
            </div>
		</div>
	</div>
</div>