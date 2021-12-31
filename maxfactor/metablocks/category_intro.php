<section class="mx_sector-intro_sector-group post_grid" id="<?php echo $fieldgroup->md5hash; ?>">
	<div class="grid">
		<div class="col--1-of-1">
			<div class="content">
				<hr>
				<sup>/ <?php echo $fields->category_title; ?></sup>
			</div>
		</div>
	</div>
	<div class="grid grid--match-heights <?php echo $fields->reverse ? "grid--reverse" : ""; ?>">
		<div class="col--1-of-2">
			<div class="content">
				<h2><?php echo $fields->headline; ?></h2>
				<p><?php echo $fields->introduction; ?></p>
				<a class="button button--bottom" href="<?php echo $fields->cta_url; ?>"><?php echo $fields->cta_label; ?></a>
			</div>
		</div>
		<div class="col--1-of-2">
			<section>
	<div class="grid">
	    
        <?php $custom_query = new WP_Query(json_decode('{"cat":"' . $fields->category_id . '","posts_per_page":"2","meta_key":"additional_settings-as_priority","orderby":"meta_value_num","order":"DESC"}'));
        while($custom_query->have_posts()) : $custom_query->the_post(); ?>
		    <div <?php post_class("col--1-of-2"); ?> id="post-<?php the_ID(); ?>">
				<?php 
					get_template_part( '_content_grid',  );
				?>
			</div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // reset the query ?>
        
	</div>
</section>
		</div>
	</div>
</section>