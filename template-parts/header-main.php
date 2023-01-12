<div class="header-block">
	<div class="navigation-container container d-flex align-items-center">
		<div class="row">
			<div class="col-6 d-flex justify-content-start align-items-center">
				<a href="" class="logo-item">
                    <?php echo get_theme_mod('logo_svg_code'); ?>
                </a>
                <a href="" class="sublogo-item">
	                <?php echo get_theme_mod('sublogo_svg_code'); ?>
                </a>
			</div>
			<div class="col-6 d-flex justify-content-end align-items-center">
                <a href="" class="hire-us-toggler"><span><?php _e('hire us'); ?></span></a>
                <div class="hamburger-menu">
                    <div class="h-point hb1"></div>
                    <div class="h-point hb2"></div>
                    <div class="h-point hb3"></div>
                </div>
			</div>
		</div>
	</div>
    <div class="header-toggled-menu">
        <div class="container">
            <div class="row">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'menu-1',
	                    'container' => 'div',
                        'container_class' => 'header-nav-menu-holder',
                    ])
                ?>
            </div>
        </div>
    </div>
</div>