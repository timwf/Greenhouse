<?php
	get_header();
?>
<main class="main">
	<?php
/**
 * Template Name: Homepagebits Template
 */
 ?>
<section>
    <div class="grid">
        <div class="col--1-of-1">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                    <div class="swiper-slide">Slide 10</div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
 </section>
<style>
    .swiper-container {
        width: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
</style>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 0,
        autoHeight: true
    });
</script>
    <section>
        <div class="grid">
            <div class="col--1-of-1">
                <div class="content set-center">
                    <h1>Greenhouse aims to nurture and grow the talent of exceptional writers!</h1>
                </div>
                <div class="content set-center">
                    <div class="col--1-of-4 button button--large button--solid">Submit your content</div>
                    <div class="col--1-of-4 button button--large">Latest books</div>
                </div>
            </div>
        </div>
    </section>
    <section class="background-colour-primary">
        <div class="grid">
            <div class="col--1-of-3">
                <div class="content content--circle">
                    <div class="circle--inner">
                        <p>Manging</p>
                        <span class="green">72</span>
                        <h4>Authors</h4>
                    </div>
                </div>
            </div>
            <div class="col--1-of-3">
                <div class="content content--circle">
                    <div class="circle--inner larger">
                        <p>Published</p>
                        <span class="green larger">233</span>
                        <h4>Authors</h4>
                    </div>
                </div>
            </div>
            <div class="col--1-of-3">
                <div class="content content--circle">
                    <div class="circle--inner">
                        <p>Resourcing</p>
                        <span class="green">39</span>
                        <h4>Authors</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
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