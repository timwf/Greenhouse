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
					<div class="content--featured-image image-cover greenhouse_author-cover" style="background-image: url(<?php if ( has_post_thumbnail() ) echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'author-profile' )[0]; ?>); background-repeat: no-repeat; background-position: center center; background-size: cover;">
						<div class="overlay">
							<div class="content">
								<h3><?php the_title(); ?></h3>
							</div>
						</div>
					</div>
				</a>
			</div>
		</article>

	