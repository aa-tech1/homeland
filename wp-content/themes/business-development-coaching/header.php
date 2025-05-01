<?php
/**
 * The header for our theme
 *
 * @package Business Development Coaching
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'business-development-coaching' ); ?></a>
	<?php
		$business_development_coaching_preloader_wrap = absint(get_theme_mod('business_development_coaching_enable_preloader', 0));
		if($business_development_coaching_preloader_wrap == 1){ ?>
			<div id="loader">
				<div class="loader-container">
					<div id="preloader" class="loader-2">
						<div class="dot"></div>
					</div>
				</div>
			</div>
	<?php } ?>

	<header id="masthead" class="site-header">
		<?php if( get_theme_mod( 'business_development_coaching_header_info',TRUE ) ) { ?>
			<div class="header-info-box">
				<div class="container">
					<div class="top-text">
						<?php if ( get_theme_mod('business_development_coaching_topheader_text') ) : ?><p> <?php echo esc_html( get_theme_mod('business_development_coaching_topheader_text') ); ?></p><?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php $business_development_coaching_has_header_image = has_header_image(); ?>
		<div class="main-header-wrap">
			<div class="top-box" <?php if (!empty($business_development_coaching_has_header_image)) { ?> style="background-image: url(<?php echo header_image(); ?>);" <?php } ?>>
				<div class="container">
					<div class="flex-row">
						<div class="main-info-box">
							<div class="site-branding">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<?php if( get_theme_mod('business_development_coaching_site_title_text',true)){ ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php } ?>
									<?php
								else :
									?>
									<?php if( get_theme_mod('business_development_coaching_site_title_text',true)){ ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php } ?>
									<?php
								endif; ?>
								<?php $business_development_coaching_description = get_bloginfo( 'description', 'display' );
									if ( $business_development_coaching_description || is_customize_preview() ) :
									?>
									<?php if( get_theme_mod('business_development_coaching_site_tagline_text',false)){ ?>
										<p class="site-description"><?php echo $business_development_coaching_description; ?></p>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="head-mail">
							<?php if ( get_theme_mod('business_development_coaching_middle_header_contact_email') ) : ?><p><i class="fas fa-envelope"></i><?php echo esc_html('Mail: ','business-development-coaching') ?><?php echo esc_html( get_theme_mod('business_development_coaching_middle_header_contact_email') ); ?></p><?php endif; ?>
						</div>
						<div class="head-phone">
							<?php if ( get_theme_mod('business_development_coaching_middle_header_contact_phone') ) : ?><p><i class="fas fa-phone-alt"></i><?php echo esc_html('Phone: ','business-development-coaching') ?> <?php echo esc_html( get_theme_mod('business_development_coaching_middle_header_contact_phone') ); ?></p><?php endif; ?>
						</div>
						<div class="middle-head-btn">
							<?php if ( get_theme_mod('business_development_coaching_middle_header_button_link') ||  get_theme_mod('business_development_coaching_middle_header_button_text' )) : ?><a href="<?php echo esc_url( get_theme_mod('business_development_coaching_middle_header_button_link') ); ?>"><i class="fas fa-user-circle"></i><?php echo esc_html( get_theme_mod('business_development_coaching_middle_header_button_text') ); ?></a><?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-nav-wrap">
			<div class="container <?php echo esc_attr( get_theme_mod( 'business_development_coaching_enable_sticky_header', false ) ? 'sticky-header' : '' ); ?>">
				<div class="header-nav-box">
					<div class="flex-row">
						<div class="nav-box-header-menu">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
								?>
							</nav>
						</div>
						<div class="nav-box-category">
							<div class="header-button">
								<?php if ( get_theme_mod('business_development_coaching_topheader_button_link') ||  get_theme_mod('business_development_coaching_topheader_button_text','Get Free Consultation' )) : ?>
									<a href="<?php echo esc_url( get_theme_mod('business_development_coaching_topheader_button_link') ); ?>"><i class="fas fa-download"></i><?php echo esc_html( get_theme_mod('business_development_coaching_topheader_button_text','Get Free Consultation') ); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</header>