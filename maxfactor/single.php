<?php
	get_header();
?>
<main class="main">
		<?php
		if ( have_posts() ) {
			// we have content to display
	?>
				<?php
			while ( have_posts() ) : the_post();
				// looks for _content-___.php (where ___ is the Post Format name)
				?>
					<?php get_template_part( '_content', get_post_format() ); ?>				<?php
			endwhile;
			// show post navigation
			the_posts_navigation();
	?>
				<?php
		} else {
			// no content available
			get_template_part( '_content', 'none' );
		}
	?>
</main>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Blog",
			"author": "<?php echo bloginfo('name'); ?>",
			"datePublished": "<?php echo get_the_date(); ?>",
			"headline": "<?php echo get_the_title(); ?>"
		}
	</script>
<?php
	get_footer();
?>
<!--[if IE 9]>
    <script>
        window.onload = new function() {
            var ie9data;
            $('.swiper-slide .content--featured-image').each(function () {
                ie9data = $(this).data('background');
				this.style.backgroundImage = 'url(' + ie9data + ')';
            });
        }
    </script>
<![endif]-->