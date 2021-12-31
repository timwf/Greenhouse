<section class="mx-logo_reel-logos" id="<?php echo $fieldgroup->md5hash; ?>">
	<div class="grid">
		<div class="col--1-of-1">
			<div class="content">
				<hr>
				<sup>/ <?php echo $fields->title; ?></sup>
			</div>
		</div>
		<div class="col--1-of-1">
			<div class="content">
				<h3><?php echo $fields->headline; ?></h3>
			</div>
		</div>
	</div>
	<div class="grid grid--match-heights">
		<?php
			foreach (explode(",", $fields->logos) as $logo) {
		?>
			<div class="col--1-of-4">
				<div class="content">
					<?php echo wp_get_attachment_image($logo, "medium"); ?>
				</div>
			</div>
		<?php
			}
		?>
	</div>
</section>