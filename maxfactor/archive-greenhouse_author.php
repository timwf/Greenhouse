<?php
	get_header();
?>
<main class="main">
		<?php
		if ( have_posts() ) {
			// we have content to display
			?>
				<section>
    <div class="grid">
        <div class="col--1-of-1">
            <div class="content set-center set-pad-bottom-50">
                <h1>Authors</h1>
                <p><i>Greenhouse Authors</i></p>
            </div>
        </div>
    </div>
</section>				<div class="grid set-center">
			<?php
			while ( have_posts() ) : the_post();
				?>
					<div class="col--1-of-4">
						<?php get_template_part( '_content_grid', 'greenhouse_author' ); ?>
					</div>
				<?php
			endwhile;
			?>
					<?php
						// show post navigation
						the_posts_navigation();
					?>
				</div>
							<?php
		} else {
			// no content available
			get_template_part( '_content_grid', 'none' );
		}
	?>

</main>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "<?php echo bloginfo('name'); ?>",
			"url": "<?php echo bloginfo('url'); ?>",
			"logo": "<?php echo(get_theme_mod("site_logo")); ?>",
			"sameAs":
				<?php
				$menu_name = 'utility-menu';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

				$links = array_column(json_decode(json_encode($menuitems), true), "url");
				echo json_encode($links, JSON_UNESCAPED_SLASHES);
				?>,
			"contactPoint": [{
				"@type": "ContactPoint",
				"telephone": "+44-20-7841-3958",
				"contactType": "customer service",
				"areaServed": "GB",
				"availableLanguage": "English"
			},{
				"@type": "ContactPoint",
				"telephone": "+1-571-758-5615",
				"contactType": "customer service",
				"areaServed": "US",
				"availableLanguage": "English"
			}]
		}, {
			"@context": "http://schema.org",
			"@type": "WebSite",
			"name": "<?php echo bloginfo('name'); ?>",
			"url": "<?php echo bloginfo('url'); ?>"
		}, {
			"@context": "http://schema.org",
			"@type": "Person",
			"name": "sarah davies",
			"sameAs": "https://twitter.com/SarahGreenhouse"
		}, {
			"@context": "http://schema.org",
			"@type": "Person",
			"name": "polly nolan",
			"sameAs": "https://twitter.com/NolanPolly"
		}
	</script>
<?php
	get_footer();
?>
<!--[if IE 9]>
    <script>
        window.onload = new function() {
            var ie9data;
            $('.swiper-slide .content--featured-image').each(function () {
                ie9data = $(this).data('background');
				this.style.backgroundImage = 'url(' + ie9data + ')';
            });
        }
    </script>
<![endif]-->