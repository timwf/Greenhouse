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
    <div class="col--5-of-6">
	    <div class="content">
	    	<article id="post-<?php the_ID(); ?>">
		    	<div class="grid">
		    		<div class="col--1-of-3">
		    			<div class="content">
			    			<?php
			    				//  cover
				    			if ( has_post_thumbnail() ) {
								    printf('<img src="%s" class="image--full-width image--circle">', wp_get_attachment_image_src( get_post_thumbnail_id(), 'author-profile' )[0]);
								}
							?>
						</div>
		    		</div>
		    		<div class="col--2-of-3">
		    			<div class="content">
			    			<?php
				    			// title
				    			the_title("<h2>", "</h2>");

				    			// excerpt sub-heading
				    			printf("<h3>%s</h3>", get_the_excerpt());

				    			// main description
								the_content();
							?>
						</div>
		    		</div>
		    		<?php
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
					<div class="content set-pad-50-i">
						<hr>
					</div>
						<div class="grid">
							<div class="col--1-of-1">
								<div class="content">
									<h3><?php _e( 'Books', 'maxfactor' ) ?></h3>
								</div>
							</div>
							<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								<div class="col--1-of-4">
					    			<?php get_template_part( '_content_grid', 'book' ); ?>
					    		</div>
				    		<?php endwhile; ?>
						</div>
		    		</div>
				</div>
		    		<?php
		    			// Prevent weirdness
						wp_reset_postdata();

						endif;
					?>
				<div class="grid set-center">
				<div class="content set-pad-50-i">
					<hr>
				</div>
		    		<?php
	    				// interview
	    				if ($author_interview = get_post_meta(get_the_id(), "extras-interview", true)) {
		    		?>
		    		<div class="col--2-of-3">
						<div class="content">
							<h3>Author Interview</h3>
							<p>
								<?php echo wpautop(stripslashes($author_interview)); // interview ?>
							</p>
						</div>
		    		</div>
		    		<?php
						}
					?>



		    	</div>
			</article>
	    </div>
    </div>
</div>
	</section>