<?php
/**
 * Template part for displaying pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

    	<section>
	    <div class="grid set-center">
        <div class="col--2-of-3">
		    	<article id="post-<?php the_ID(); ?>">
					<div class="content">
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
					</div>
				</article>
	    </div>
	</div>	</section>
	<section>
	<?php 
    $repeater = json_decode(get_post_meta( get_the_ID(), 'pc_blocks', true ), true);
    	if (json_last_error() === JSON_ERROR_NONE && $repeater !== null) {
		    foreach ($repeater as $fieldgroup) {
		    	$fieldgroup_fixed = array_map(function($item) {
		    		if (is_array($item)) {
		    			return array_map(function ($item) {
		    				return stripslashes($item);
		    			}, $item);
		    		} else {
		    			return stripslashes($item);
		    		}
	    		}, $fieldgroup);
	    		$fieldgroup_fixed = json_decode(json_encode($fieldgroup_fixed), false);
	    		$fields = $fieldgroup_fixed->fields;
		    	include (locate_template( 'metablocks/' . $fieldgroup_fixed->blockType . '.php' ));
		    }
    	}
?>	</section>