<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

    <section>
    <div class="grid">
        <div class="col--1-of-1">
            <div class="content set-center">
                <h1><?php echo get_the_title(); ?></h1>
                <p><i><?php echo get_the_date(); ?></i></p>
            </div>
        </div>
    </div>
</section>	<section>
		
    <div class="grid">
	    <div class="col--1-of-1">
		    <div class="content">
			<?php
			if ( 'post' === get_post_type() ) { ?>
					<div class="entry-meta">
						<?php // show posted by and date etc here ?>
					</div><!-- .entry-meta -->
			<?php }; ?>
		    </div>
	    </div>
    </div>
    <div class="grid set-center">
        <div class="col--10-of-12">
		    <div class="content">
		    	<article id="post-<?php the_ID(); ?>">
					<?php
						 if ( is_category() || is_archive() ) {
						    the_excerpt();
						} else {
						    the_content();
						}
					
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maxfactor' ),
							'after'  => '</div>',
						) );
					?>
					<?php 
					    $repeater = json_decode(get_post_meta( get_the_ID(), 'pc_blocks', true ));
					    	if (json_last_error() === JSON_ERROR_NONE && $repeater !== null) {
							    foreach ($repeater as $fieldgroup) {
							    	$fields = $fieldgroup->fields;
							    	include (locate_template( 'metablocks/' . $fieldgroup->blockType . '.php' ));
							    }
					    	}
					?>
					<h3><?php _e("Comments"); ?></h3>
				    <?php comments_template(); ?>
				</article>
		    </div>
	    </div>
	</div>	</section>
	<section>
			</section>