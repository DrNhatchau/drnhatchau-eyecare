<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="topbar">
    <div class="container topbar-inner">
      <div class="topbar-contact">
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>">📞 <?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></a>
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone2' ) ) ); ?>">📞 <?php echo esc_html( drnhatchau_get( 'contact_phone2' ) ); ?></a>
        <a href="mailto:<?php echo esc_attr( drnhatchau_get( 'contact_email' ) ); ?>">✉️ <?php echo esc_html( drnhatchau_get( 'contact_email' ) ); ?></a>
      </div>
      <?php if ( drnhatchau_get( 'contact_facebook' ) ) : ?>
      <div class="topbar-social">
        <a href="<?php echo esc_url( drnhatchau_get( 'contact_facebook' ) ); ?>" target="_blank" rel="noopener">Facebook</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <nav class="navbar container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
      <?php if ( has_custom_logo() ) : ?>
        <span class="brand-logo"><?php the_custom_logo(); ?></span>
      <?php else : ?>
        <span class="brand-logo"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-placeholder.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>"></span>
      <?php endif; ?>
      <span class="brand-text">PHÒNG KHÁM MẮT<br><strong>DRNHATCHAU</strong></span>
    </a>
    <button class="nav-toggle" aria-label="Mở menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
    <?php
    if ( has_nav_menu( 'primary' ) ) {
    	wp_nav_menu( array(
    		'theme_location' => 'primary',
    		'container'      => false,
    		'menu_class'     => 'nav-menu',
    	) );
    } else {
    	drnhatchau_fallback_menu();
    }
    ?>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-primary nav-cta">Đặt lịch khám</a>
  </nav>
</header>
