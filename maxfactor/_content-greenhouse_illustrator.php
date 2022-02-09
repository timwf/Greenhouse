<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>


<?php 
	$gallery_title = get_field('gallery_title');
	$gallery_images = get_field('gallery_images');
	$books_title = get_field('books_title');
	$books_images = get_field('books_images');
	$interviewcontent = get_field('interviewcontent');
	$profileImage = get_field('profile_image');
	$imagePos  = get_field('image_position');	
?>

	<section>
		<div class="grid set-center" >
    <div class="col--5-of-6">
	    <div class="content">
	    	<article id="post-<?php the_ID(); ?>">
		    	<div class="grid">
		    		<div class="col--1-of-3">
		    			<div class="content">
			    			<?php
			    				//  cover
									if ($profileImage){
										?>
											<img src="<?php echo $profileImage['url'] ?>" class="image--full-width image--circle" alt="" style="max-height: 72.33%; object-fit: cover; object-position: <?php echo $imagePos ?>">
										<?php
									}
				    			else ( has_post_thumbnail() ) {
								    printf('<img src="%s" style="style="max-height: 72.33%; object-fit: cover; object-position: <?php echo $imagePos ?>" class="image--full-width image--circle">', wp_get_attachment_image_src( get_post_thumbnail_id(), 'author-profile' )[0])
								}
							?>
						</div>
		    		</div>
		    		<div class="col--2-of-3">
		    			<div class="content">
			    			<?php
				    			// title
				    			the_title("<h2>", "</h2>");

				    			// excerpt sub-heading
				    			printf("<h3>%s</h3>", get_the_excerpt());

				    			// main description
								the_content();
							?>

						<button style="width: auto; margin-top: 20px"  class="js-print-page btn button button--solid button--slim">Print or save to PDF</button> 

		    		</div>
		    		<?php
	    				// ** author **
		    			$connected = new WP_Query( array(
						  'connected_type' => 'books_to_greenhouse_authors',
						  'connected_items' => $post,
						  'nopaging' => true,
						) );

						// Display connected pages
						if ( $connected->have_posts() ) :

		    		?>
		    		<div class="col--1-of-1">
					<div class="content set-pad-50-i">
						<hr>
					</div>
						<div class="grid">
							<div class="col--1-of-1">
								<div class="content">
									<h3><?php _e( 'Books', 'maxfactor' ) ?></h3>
								</div>
							</div>
							<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								<div class="col--1-of-4">
					    			<?php get_template_part( '_content_grid', 'book' ); ?>
					    		</div>
				    		<?php endwhile; ?>
						</div>
		    		</div>
				</div>
		    		<?php
		    			// Prevent weirdness
						wp_reset_postdata();

						endif;
					?>
				<div class="grid set-center">
			 	</div>
			</article>
	    </div>
    </div>
</div>
	</section>

<div class="illustrator-gallery grid">
	<h3><?php  echo $gallery_title ?></h3>
</div>

<?php if($gallery_images) { ?>

<div id="gallery-grid" class="customer-gallery__grid">
	<?php foreach ($gallery_images as $image):?>
		<div class="customer-gallery__grid-item" >
			<img src="<?php echo $image['image']['url']  ?>" alt="">
		</div>
	<?php endforeach; ?>
</div>

<?php } ?>

<?php if($books_images) { ?>
<div class="illustrator-books">
	<hr>
	<h3><?php  echo $books_title ?></h3>
	<div class="grid">
	<?php foreach ($books_images as $image):?>
		<div class="col--1-of-4">						
			<article id="post-4888">
				<div class="content content--illustrator-archive">
					<?php if ($image['link']){ ?>
						<a href="<?php echo $image['link']['url']  ?>">
					<?php } ?>
					
						<div class="content--featured-image image-cover 2-cover " style="background-image: url(<?php echo $image['image']['url']  ?>); background-repeat: no-repeat; background-position: center center; background-size: contain;">
						</div>
						<?php if ($image['link']){ ?>
					</a>
					<?php } ?>
				</div>
			</article>		
		</div>
	<?php endforeach; ?>
	</div>
	<hr>
</div>
<?php } ?>

<div class="illustrator-interview">
	<?php echo $interviewcontent ?>
</div>



<div class="container" style="padding: 50px; display: none" id="printableArea">	
	<div class="" style="width: 20%;">
		<?php
			//  cover
			if ($profileImage){
				?>
					<img src="<?php echo $profileImage['url'] ?>" class="image--full-width " alt="" style="max-height: 72.33%; object-fit: cover">
				<?php
			}
			else ( has_post_thumbnail() ) {
				printf('<img src="%s" class="image--full-width">', wp_get_attachment_image_src( get_post_thumbnail_id(), 'author-profile' )[0])
		}
		?>
	</div>

	<div class="" style="margin-bottom: 20px; margin-top:20px">
	<?php
			// title
			the_title("<h2>", "</h2>");
	?>

	</div>
	<?php
		// excerpt sub-heading
			printf("<h3>%s</h3>", get_the_excerpt());

			// main description
		the_content();
	?>

	<div class="" style="margin-top: 40px">
		<h3><?php  echo $gallery_title ?></h3>
	</div>

	<?php if($gallery_images) { ?>
		<div id="" class="" style="">
			<?php foreach ($gallery_images as $image):?>
				<div class="" style="width: 50%" >
					<img width="50%" src="<?php echo $image['image']['url']  ?>" alt="">
				</div>
			<?php endforeach; ?>
		</div>
		<?php } ?>
</div>

<style>
	.dpsp-share-text{
		display: none;
	}

	#dpsp-content-bottom{
		display: none;
	}
</style>
