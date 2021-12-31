<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

	<section>
		<div class="grid set-center">
    <div class="col--10-of-12">
		<article id="post-<?php the_ID(); ?>" class="author">
			<div class="grid">
				<div class="col--2-of-5">
					<div class="content set-pad-right-sp2">
						<?php
							function get_cover_url($cover) {
								if (is_numeric($cover) && $cover > 0) {
									// id
									return wp_get_attachment_image_src( $cover, 'book-cover' )[0];
								} else {
									return $cover;
								}
							}
							// us and uk editions
							$uk_cover = get_cover_url(get_post_meta(get_the_id(), "extras-jacket_uk", true));
							$us_cover = get_cover_url(get_post_meta(get_the_id(), "extras-jacket_us", true));

						?>
						<ul class="grid location-switch">
							<?php if ($uk_cover) { ?><li id="uk" class="col active"><?php _e( 'UK Edition', 'maxfactor' ) ?></li><?php } ?>
							<?php if ($us_cover) { ?><li id="us" class="col <?php echo $uk_cover ? '' : 'active' ?>"><?php _e( 'US Edition', 'maxfactor' ) ?></li><?php } ?>
						</ul>
						<div id="uk" class="book-image <?php echo $uk_cover ? '' : 'hide' ?>">
					<?php

						// ** United Kingdom **

						// book cover

						if ( has_post_thumbnail() ) {
							printf('<img src="%s" class="image--full-width">', $uk_cover);
						}

						// buy button
						if ($link_buy_online = get_post_meta(get_the_id(), "extras-amazon_uk", true)) {
							printf('<div class="content set-center"><p><a href="%s" class="button button--slim button--round">%s</a></p></div>', $link_buy_online, __( 'Buy online', 'maxfactor' ));
						}
						?>
						</div>
						<div id="us" class="book-image <?php echo ($uk_cover or !$us_cover) ? 'hide' : '' ?>">
						<?php
						// ** United States **

						// book cover
						if ( has_post_thumbnail() ) {
							printf('<img src="%s" class="image--full-width">', $us_cover);
						}

						// buy button
						if ($link_buy_online = get_post_meta(get_the_id(), "extras-amazon_us", true)) {
							printf('<div class="content set-center"><p><a href="%s" class="button button--slim button--round">%s</a></p></div>', $link_buy_online, __( 'Buy online', 'maxfactor' ));
						}
						?>
						</div>
					</div>
						<?php
						// series
						$currentbook = get_the_id();
						$connected = p2p_type( 'books_to_series' )->get_connected( $post_id );
						foreach ( $connected as $post ) : setup_postdata( $post );
							if (get_the_title()) {
								?>
								<div class="content set-center">
									<p><?php _e( 'More from this series', 'maxfactor' ) ?></p>
									<h3 class="set-pad-bottom-0"><?php the_title(); ?></h3>
								</div>
								<?php
								// Find connected pages
								$connected = new WP_Query( array(
									'connected_type' => 'books_to_series',
									'connected_items' => $post,
									'nopaging' => true
								) );
								?>
								<div class="grid">
								<div class="content set-pad-right-sp2 set-pad-0-i set-center"><hr></div>
								<?php
								while ( $connected->have_posts() ) : $connected->the_post();
									if (get_the_title() && get_the_id() != $currentbook) {
										?>
										<div class="col--1-of-2">
											<div class="content set-pad-right-sp2 set-center">
												<a href="<?php echo get_permalink(); ?>">
												<h5 class="set-pad-bottom-sp"><?php the_title(); ?></h5>
												<p><img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'book-cover' )[0]; ?>" class="image--full-width"></p>
												<p><?php _e( 'Read more', 'maxfactor' ) ?></p>
												</a>
											</div>
										</div>
										<?php

									}
								endwhile;
								?>
								</div>
								<?php
								wp_reset_postdata(); // set $post back to original post
							}
						endforeach;
						wp_reset_postdata(); // set $post back to original post
					?>
				</div>
				<div class="col--3-of-5">
					<div class="content set-pad-top-0 set-pad-left-sp2 content--book">
						<?php
							// book title
                            $sd_book_name = get_the_title();
							the_title("<h2>", "</h2>");

							// excerpt sub-heading
							printf("<h3>%s</h3>", get_the_excerpt());

							// main description
							the_content();

							// rights and licensing
							printf("<h4>%s</h4><p>%s</p>", __( 'Rights details', 'maxfactor' ), wpautop(get_post_meta(get_the_id(), "extras-rights_details", true)));

							// list categories
							$taxonomy_term = "book_category";
							$taxonomy_posttype = "book";
							$taxonomies = wp_get_post_terms(get_the_id(), $taxonomy_term);
							echo '<ul class="nav-menu">';
							foreach($taxonomies as $taxonomy) {
								echo '<li class="menu-item">' . '<a href="' . esc_attr(get_term_link($taxonomy, $taxonomy_term)) . '" title="' . sprintf( __( "View all posts in %s" ), $taxonomy->name ) . '" ' . ' class="button">' . $taxonomy->name.'</a></li>';
							}
							echo '</ul>';
						?>
					</div>
				</div>
				<?php
					// ** awards **
					$connected = new WP_Query( array(
						'connected_type' => 'books_to_awards',
						'connected_items' => $post,
						'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected->have_posts() ) :

				?>
				<div class="col--1-of-1">
					<div class="grid">
						<div class="col--1-of-1">
							<div class="content line-through set-center">
								<h3><?php _e( 'Good news', 'maxfactor' ) ?></h3>
							</div>
						</div>
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
						<div class="grid grid--awards">
							<div class="col">
								<div class="content set-center">
									<i class="icon-bookmark-empty"></i>
								</div>
							</div>
							<div class="col--8-of-10">
								<div class="content content--awards">
									<h4><?php the_title(); //name ?></h4>
									<?php
										// description
										the_content();
									?>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;

					// ** author **
					$connected = new WP_Query( array(
						'connected_type' => 'books_to_greenhouse_authors',
						'connected_items' => $post,
						'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected->have_posts() ) :

				?>
				<div class="col--1-of-1">
					<div class="grid">
						<div class="col--1-of-1">
							<div class="content line-through set-center">
								<h3><?php _e( 'The Author', 'maxfactor' ) ?></h3>
							</div>
						</div>
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
							<div class="col--1-of-3">
								<div class="content">
									<?php
										// picture
										if ( has_post_thumbnail() ) {
											printf('<img src="%s" class="image--full-width image--circle">', wp_get_attachment_image_src( get_post_thumbnail_id(), 'author-profile' )[0]);
										}
									?>
								</div>
							</div>
							<div class="col--2-of-3">
								<div class="content">
									<h4><?php the_title(); //name ?></h4>
									<?php
										// about
                                        $sd_author_name = get_the_title();
                                        the_content();

										// profile link
									?>

									<p><a href="<?php the_permalink(); ?>" class="button button--solid button--slim"><?php _e( 'View author profile', 'maxfactor' ); ?></a></p>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;
				?>
			</div>
		</article>
    </div>
</div>

<script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "Book",
        "author": "<?php echo $sd_author_name; ?>",
        "name": "<?php echo $sd_book_name; ?>"
    }
</script>
	</section>