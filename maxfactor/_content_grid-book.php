<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>



    	<article id="post-<?php the_ID(); ?>">
			<div class="content">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<div class="content--featured-image image-cover book-cover <?php echo has_post_thumbnail() ? '' : 'no-image' ?>" style="background-image: url(<?php if ( has_post_thumbnail() ) echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'book-cover' )[0]; ?>); background-repeat: no-repeat; background-position: center center; background-size: contain;">
						<div class="overlay">
							<div class="content">
								<div class="overflow-hidden">
									<h3><?php the_title(); ?></h3>
									<hr>
									<?php the_excerpt(); ?>
								</div>
								<div class="button button--solid button--slim button--bottom">More info</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</article>

