<?php
	get_header();
?>
<main class="main">
		<?php
		/* Template Name: Generic page */
		if ( have_posts() ) {
			// we have content to display
			?>
				<section class="section--fullscreen section--fullscreen-60" style="background-image: url(<?php if ( has_post_thumbnail() ) echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>); background-repeat: no-repeat; background-size: cover;"> 
	<div class="vertical-center">
		<div class="grid set-center">
			<div class="col--2-of-3">
				<div class="content content--featured-image">
			        <h2 class="set-center">
			            <?php echo get_the_title(); ?>
			        </h2>
			        <p class="content--featured-image"></p>
			        				</div>
			</div>
		</div>
	</div>
</section>			<?php
			while ( have_posts() ) : the_post();
				get_template_part( '_content', 'page_generic' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				};
			endwhile;
			?>
							<?php
		} else {
			// no content available
			get_template_part( '_content', 'none' );
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