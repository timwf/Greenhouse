<section  id="<?php echo $fieldgroup->md5hash; ?>" class="section--fullscreen section--fullscreen-60" style="background-image: url(<?php echo wp_get_attachment_image_src($fields->image, "full")[0]; ?>); background-repeat: no-repeat; background-size: cover;"> 
    <div class="vertical-center">
        <div class="grid">
            <div class="col--1-of-1">
                <div class="content set-center">
                    <h1><?php echo $fields->title; ?></h1>
                </div>
                <div class="content set-center">
                    <a href="<?php echo $fields->cta_url; ?>" class="col--1-of-4 button button--large button--solid button--intro-cta"><?php echo $fields->cta_label; ?></a>
                    <a href="<?php echo $fields->cta_url_alt; ?>" class="col--1-of-4 button button--large button--solid button--intro-cta"><?php echo $fields->cta_label_alt; ?></a>
                    <a href="<?php echo $fields->cta_url_alt2; ?>" class="col--1-of-4 button button--large button--solid button--intro-cta"><?php echo $fields->cta_label_alt2; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>