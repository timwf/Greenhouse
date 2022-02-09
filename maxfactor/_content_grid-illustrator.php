<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>">
	<div class="content content--illustrator-archive">
		<a href="<?php echo esc_url(get_permalink()); ?>">
		<div class="content--featured-image image-cover 2-cover <?php echo has_post_thumbnail() ? '' : 'no-image' ?>" style="background-image: url(<?php if ( has_post_thumbnail() ) echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'book-cover' )[0]; ?>); background-repeat: no-repeat; background-position: center center; background-size: contain;">



		</div>
		<div class="content">
						<h3><?php the_title(); ?></h3>
					</div>
		</a>
	</div>
</article>

