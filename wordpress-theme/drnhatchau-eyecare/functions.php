<?php
/**
 * DrNhatChau Eye Care theme functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DRNHATCHAU_VERSION', '1.0.0' );

/* ------------------------------------------------------------------ */
/* Theme setup                                                        */
/* ------------------------------------------------------------------ */
function drnhatchau_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 80,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Menu chính', 'drnhatchau' ),
	) );
}
add_action( 'after_setup_theme', 'drnhatchau_theme_setup' );

/* ------------------------------------------------------------------ */
/* Assets                                                              */
/* ------------------------------------------------------------------ */
function drnhatchau_enqueue_assets() {
	wp_enqueue_style( 'drnhatchau-fonts', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap', array(), null );
	wp_enqueue_style( 'drnhatchau-style', get_stylesheet_uri(), array(), DRNHATCHAU_VERSION );
	wp_enqueue_script( 'drnhatchau-main', get_template_directory_uri() . '/js/main.js', array(), DRNHATCHAU_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'drnhatchau_enqueue_assets' );

/* ------------------------------------------------------------------ */
/* Custom Post Type: Bac si (Doctors)                                 */
/* ------------------------------------------------------------------ */
function drnhatchau_register_bac_si_cpt() {
	register_post_type( 'bac_si', array(
		'labels' => array(
			'name'               => __( 'Bác sĩ', 'drnhatchau' ),
			'singular_name'      => __( 'Bác sĩ', 'drnhatchau' ),
			'add_new_item'       => __( 'Thêm bác sĩ mới', 'drnhatchau' ),
			'edit_item'          => __( 'Sửa thông tin bác sĩ', 'drnhatchau' ),
			'all_items'          => __( 'Tất cả bác sĩ', 'drnhatchau' ),
			'menu_name'          => __( 'Bác sĩ', 'drnhatchau' ),
		),
		'public'       => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-groups',
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'  => 'bac-si',
		'rewrite'      => array( 'slug' => 'bac-si' ),
		'show_in_menu' => true,
	) );

	register_post_meta( 'bac_si', 'chuc_danh', array(
		'type'         => 'string',
		'single'       => true,
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'drnhatchau_register_bac_si_cpt' );

/* ------------------------------------------------------------------ */
/* Custom Post Type: Dich vu (Services)                                */
/* ------------------------------------------------------------------ */
function drnhatchau_register_dich_vu_cpt() {
	register_post_type( 'dich_vu', array(
		'labels' => array(
			'name'               => __( 'Dịch vụ', 'drnhatchau' ),
			'singular_name'      => __( 'Dịch vụ', 'drnhatchau' ),
			'add_new_item'       => __( 'Thêm dịch vụ mới', 'drnhatchau' ),
			'edit_item'          => __( 'Sửa dịch vụ', 'drnhatchau' ),
			'all_items'          => __( 'Tất cả dịch vụ', 'drnhatchau' ),
			'menu_name'          => __( 'Dịch vụ', 'drnhatchau' ),
		),
		'public'       => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-heart',
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'  => 'dich-vu',
		'rewrite'      => array( 'slug' => 'dich-vu' ),
		'show_in_menu' => true,
	) );

	register_post_meta( 'dich_vu', 'can_phau_thuat', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'drnhatchau_register_dich_vu_cpt' );

/* ------------------------------------------------------------------ */
/* Customizer: thong tin lien he                                      */
/* ------------------------------------------------------------------ */
function drnhatchau_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'drnhatchau_contact', array(
		'title'    => __( 'Thông tin liên hệ phòng khám', 'drnhatchau' ),
		'priority' => 30,
	) );

	$fields = array(
		'contact_phone1'   => '0936 365 576',
		'contact_phone2'   => '0901 138 699',
		'contact_email'    => 'pkmatbsnhatchau@gmail.com',
		'contact_address'  => '9NO2 Nguyễn Cảnh Dị, khu đô thị mới Đại Kim mở rộng, phường Định Công, Hà Nội',
		'contact_hours'    => 'Đang cập nhật - vui lòng gọi hotline để biết chi tiết.',
		'contact_facebook' => '',
		'contact_slogan'   => 'Tất cả vì đôi mắt của bạn',
	);

	foreach ( $fields as $id => $default ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $default,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'section' => 'drnhatchau_contact',
			'label'   => ucfirst( str_replace( array( 'contact_', '_' ), array( '', ' ' ), $id ) ),
			'type'    => ( 'contact_hours' === $id ) ? 'textarea' : 'text',
		) );
	}
}
add_action( 'customize_register', 'drnhatchau_customize_register' );

/**
 * Helper: get contact info configured via Customizer.
 */
function drnhatchau_get( $key ) {
	$defaults = array(
		'contact_phone1'   => '0936 365 576',
		'contact_phone2'   => '0901 138 699',
		'contact_email'    => 'pkmatbsnhatchau@gmail.com',
		'contact_address'  => '9NO2 Nguyễn Cảnh Dị, khu đô thị mới Đại Kim mở rộng, phường Định Công, Hà Nội',
		'contact_hours'    => 'Đang cập nhật - vui lòng gọi hotline để biết chi tiết.',
		'contact_facebook' => '',
		'contact_slogan'   => 'Tất cả vì đôi mắt của bạn',
	);
	return get_theme_mod( $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

/* ------------------------------------------------------------------ */
/* Contact form handler (khong can plugin)                            */
/* ------------------------------------------------------------------ */
function drnhatchau_handle_contact_form() {
	if ( ! isset( $_POST['drnhatchau_contact_nonce'] ) || ! wp_verify_nonce( $_POST['drnhatchau_contact_nonce'], 'drnhatchau_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
		exit;
	}

	$name    = isset( $_POST['ho_ten'] ) ? sanitize_text_field( wp_unslash( $_POST['ho_ten'] ) ) : '';
	$phone   = isset( $_POST['so_dien_thoai'] ) ? sanitize_text_field( wp_unslash( $_POST['so_dien_thoai'] ) ) : '';
	$service = isset( $_POST['dich_vu'] ) ? sanitize_text_field( wp_unslash( $_POST['dich_vu'] ) ) : '';
	$message = isset( $_POST['noi_dung'] ) ? sanitize_textarea_field( wp_unslash( $_POST['noi_dung'] ) ) : '';

	if ( empty( $name ) || empty( $phone ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
		exit;
	}

	$to      = drnhatchau_get( 'contact_email' );
	$subject = 'Đặt lịch khám từ website - ' . $name;
	$body    = "Họ tên: {$name}\nSố điện thoại: {$phone}\nDịch vụ quan tâm: {$service}\nNội dung:\n{$message}";

	$sent = wp_mail( $to, $subject, $body );

	wp_safe_redirect( add_query_arg( 'contact', $sent ? 'success' : 'error', wp_get_referer() ) );
	exit;
}
add_action( 'admin_post_nopriv_drnhatchau_contact', 'drnhatchau_handle_contact_form' );
add_action( 'admin_post_drnhatchau_contact', 'drnhatchau_handle_contact_form' );

/* ------------------------------------------------------------------ */
/* Menu mac dinh khi chua thiet lap Menu chinh trong Appearance        */
/* ------------------------------------------------------------------ */
function drnhatchau_fallback_menu() {
	$dich_vu_link = get_post_type_archive_link( 'dich_vu' );
	$bac_si_link  = get_post_type_archive_link( 'bac_si' );
	$kien_thuc    = get_page_by_path( 'kien-thuc' );

	$links = array(
		home_url( '/' )               => __( 'Trang chủ', 'drnhatchau' ),
		home_url( '/gioi-thieu/' )     => __( 'Giới thiệu', 'drnhatchau' ),
		$dich_vu_link ? $dich_vu_link : home_url( '/dich-vu/' ) => __( 'Dịch vụ', 'drnhatchau' ),
		$bac_si_link ? $bac_si_link : home_url( '/bac-si/' )    => __( 'Đội ngũ bác sĩ', 'drnhatchau' ),
		$kien_thuc ? get_permalink( $kien_thuc ) : home_url( '/kien-thuc/' ) => __( 'Kiến thức nhãn khoa', 'drnhatchau' ),
		home_url( '/lien-he/' )        => __( 'Liên hệ', 'drnhatchau' ),
	);

	echo '<ul class="nav-menu">';
	foreach ( $links as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}
