<section class="mx_sector-intro_sector-group post_grid" id="<?php echo $fieldgroup->md5hash; ?>">
	<div class="grid">
		<div class="col--1-of-1">
			<div class="content">
				<hr>
				<sup><?php echo $fields->category_title; ?></sup>
			</div>
		</div>
	</div>
	<div class="grid <?php echo $fields->reverse ? "grid--reverse" : ""; ?>">
		<div class="col--1-of-1">
			<div class="content">
				<div class="grid">
					<div class="col set-pad-top-sp">
						<h3><?php echo $fields->introduction; ?></h3>
					</div>
					<div class="col--1-of-4 set-center set-pad-top-sp">
						<a class="button button--solid button--slim" href="<?php echo $fields->cta_url; ?>"><?php echo $fields->cta_label; ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col--1-of-1">
			<div class="swiper-container swiper-<?php echo $fields->post_type; ?> set-pad-50-0">
                <div class="swiper-wrapper">
					
        <?php $custom_query = new WP_Query(json_decode('{"post_type":"' . $fields->post_type . '","posts_per_page":"40","orderby":"rand","meta_key":"_thumbnail_id"}'));
        while($custom_query->have_posts()) : $custom_query->the_post(); ?>
		    <div <?php post_class("swiper-slide col--1-of-4"); ?> id="post-<?php the_ID(); ?>">
		        <div class="content">
		            <article class="grid-article" id="post-<?php the_ID(); ?>">
						<a href="<?php echo esc_url(get_permalink()); ?>">
							<div class="content--featured-image image-cover image-zoom <?php echo $fields->post_type; ?>-cover swiper-lazy" data-background="<?php if ( has_post_thumbnail() ) echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'book-cover' )[0]; ?>" style="background-repeat: no-repeat; background-position: center center; background-size: cover;">
							</div>
							<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
						</a>
						<?php if ($fields->post_type == 'greenhouse_author') { ?>
							<div class="overlay">
								<div class="content">
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
						<?php } ?>
					</article>

    			</div>
			</div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // reset the query ?>                </div>
				<div class="swiper-arrow swiper-button-prev"></div>
        		<div class="swiper-arrow swiper-button-next"></div>
			</div>
		</div>
	</div>
</section>