
	<footer class="site-footer section--footer" id="colophon">
    	<div class="grid ">
		<div class="col--1-of-4 col--large-1-of-2 col--small-1-of-1">
			<div class="content">
				<?php dynamic_sidebar("footer1"); ?>
			</div>
		</div>
		<div class="col--1-of-4 col--large-1-of-2 col--small-1-of-1">
			<div class="content">
				<?php dynamic_sidebar("footer2"); ?>
			</div>
		</div>
		<div class="col--1-of-4 col--large-1-of-2 col--small-1-of-1">
			<div class="content">
				<?php dynamic_sidebar("footer3"); ?>
			</div>
		</div>
		<div class="col--1-of-4 col--large-1-of-2 col--small-1-of-1">
			<div class="content">
				<?php dynamic_sidebar("footer4"); ?>
			</div>
		</div>
	</div>
</footer><footer class="footer-utility">
    <div class="grid">
        </div class="col--1-of-1">
            <div class="content set-center">
                <?php wp_nav_menu( array( 'theme_location' => 'utility-menu', 'container' => '', 'menu_class' => 'nav-menu' ) ); ?>                <?php dynamic_sidebar("footercredit"); ?>
            </div>
        </div>
    </div>
</footer>	<?php wp_footer(); ?>
	
	</body>
</html>