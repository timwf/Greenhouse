<section class="mx_block_email-form" id="<?php echo $fieldgroup->md5hash; ?>">
	<div class="grid">
		<div class="col--1-of-1">
			<div class="content">
				<hr>
				<sup>/ <?php echo $fields->title; ?></sup>
			</div>
		</div>
	</div>
	<div class="grid set-center">
		<div class="col--3-of-4">
		    <div class="content">
				<h2><?php echo $fields->headline; ?></h2>
		    </div>
		    <div class="col--1-of-1">
				<form name="" action="">
					<div class="grid">
						<?php
							foreach (explode("|", $fields->form_fields) as $fieldset) {
								$field = explode("~", $fieldset);
								/*
								 * 0 = type
								 * 1 = name
								 * 2 = class
								 * 3 = label
								*/
						?>
						        <div class="<?php echo $field[2]; ?> form-field">
						        	<?php include (locate_template( 'metablocks/forms/' . $field[0] . '.php' )); ?>
							    </div>
					    <?php
							}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>