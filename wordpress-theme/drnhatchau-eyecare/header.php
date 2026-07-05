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
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>"><svg class="topbar-icon" viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></a>
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone2' ) ) ); ?>"><svg class="topbar-icon" viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?php echo esc_html( drnhatchau_get( 'contact_phone2' ) ); ?></a>
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
