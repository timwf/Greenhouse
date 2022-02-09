<?php
	get_header();
  /* Template Name: Awards */
  $menu = wp_get_nav_menu_object("top" );
  $title = get_field('awards_&_bestsellers_title', $menu);
  $sub_title = get_field('awards_&_bestsellers_sub_heading', $menu);
  $award = get_field('award');
?>

<main class="main">
  <section>
    <div class="grid">
        <div class="col--1-of-1">
            <div class="content set-center set-pad-bottom-50">
                <h1><?php echo $title  ?></h1>
                <p><i><?php echo $sub_title  ?></i></p>
            </div>
        </div>
    </div>
  </section>				
  <?php if($award) { ?>
    <div class="grid set-center">
    <?php foreach ($award as $awardItem):?>
        <div class="col--1-of-4">
          <article >
          <div class="content content--awards">
						<?php if($awardItem['award_link']) { ?>
							<a href="<?php echo $awardItem['award_link']['url']  ?>">
						<?php } ?>            
            <div class="content--featured-image image-cover 2-cover " style="background-image: url(<?php echo $awardItem['award_image']['url']  ?>); background-repeat: no-repeat; background-position: center center; background-size: contain;">
            </div>
            <div class="content">
              <h3 style="font-weight: 700"><?php echo $awardItem['award_title'] ?></h3>
              <p><?php echo $awardItem['award_sub_title'] ?></p>
            </div>
						<?php if($awardItem['award_link']) { ?>
							</a>
						<?php } ?>
          </div>
        </article>
        </div>
      <?php endforeach; ?>
    </div>
  <?php } ?>
</main>

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "<?php echo bloginfo('name'); ?>",
			"url": "<?php echo bloginfo('url'); ?>",
			"logo": "<?php echo(get_theme_mod("site_logo")); ?>",
			"sameAs":
				<?php
				$menu_name = 'utility-menu';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

				$links = array_column(json_decode(json_encode($menuitems), true), "url");
				echo json_encode($links, JSON_UNESCAPED_SLASHES);
				?>,
			"contactPoint": [{
				"@type": "ContactPoint",
				"telephone": "+44-20-7841-3958",
				"contactType": "customer service",
				"areaServed": "GB",
				"availableLanguage": "English"
			},{
				"@type": "ContactPoint",
				"telephone": "+1-571-758-5615",
				"contactType": "customer service",
				"areaServed": "US",
				"availableLanguage": "English"
			}]
		}, {
			"@context": "http://schema.org",
			"@type": "WebSite",
			"name": "<?php echo bloginfo('name'); ?>",
			"url": "<?php echo bloginfo('url'); ?>"
		}, {
			"@context": "http://schema.org",
			"@type": "Person",
			"name": "sarah davies",
			"sameAs": "https://twitter.com/SarahGreenhouse"
		}, {
			"@context": "http://schema.org",
			"@type": "Person",
			"name": "polly nolan",
			"sameAs": "https://twitter.com/NolanPolly"
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