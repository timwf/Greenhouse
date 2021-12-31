<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>
<div class="grid">
    <div class="col--1-of-5">
        <a href="<?php the_permalink(); ?>">
            <div class="content">
                <p><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>"></p>
            </div>
        </a>
    </div>
    <div class="col--4-of-5">
        <div class="content">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
</div>