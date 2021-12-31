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
                <h1>Books</h1>
                <p><i>All books by Greenhouse Authors</i></p>
            </div>
        </div>
        <div class="col--1-of-1">
            <ul class="nav-menu nav-filter grid">
            <?php
                // show buttons for each taxonomy
                $taxonomy_term = "book_category";
                $taxonomy_posttype = "book";
                $taxonomies = get_terms($taxonomy_term);
                ?>
                <li class="col set-center">
                    <div class="content">
                        <a href="<?php echo get_post_type_archive_link( $taxonomy_posttype ); ?>" class="button <?php echo 0 == get_queried_object_id() ? "button--active" : ""; ?>">All</a>
                    </div>
                </li>
                <?php
                foreach($taxonomies as $taxonomy) {
                ?>
                    <li class="col set-center">
                        <div class="content">
                            <a href="<?php echo esc_attr(get_term_link($taxonomy, $taxonomy_term)) ?>" 
                               title="<?php echo sprintf( __( "View all posts in %s" ), $taxonomy->name ) ?>" 
                               class="button <?php echo $taxonomy->term_id == get_queried_object_id() ? "button--active" : ""; ?>">
                                   <?php echo $taxonomy->name ?>
                            </a>
                        </div>
                    </li>
                <?php
                }
            ?>
            </ul>
        </div>
    </div>
</section>				<div class="grid set-center">
			<?php
			while ( have_posts() ) : the_post();
				?>
					<div class="col--1-of-4">
					<?php get_template_part( '_content_grid', 'book' ); ?>					</div>
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