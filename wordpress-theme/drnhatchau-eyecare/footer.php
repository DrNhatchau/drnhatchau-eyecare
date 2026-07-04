<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-col">
      <h3><?php bloginfo( 'name' ); ?></h3>
      <p><em>"<?php echo esc_html( drnhatchau_get( 'contact_slogan' ) ); ?>"</em></p>
      <p><?php echo nl2br( esc_html( drnhatchau_get( 'contact_address' ) ) ); ?></p>
      <p>Hotline:
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></a>
        -
        <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone2' ) ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_phone2' ) ); ?></a>
      </p>
      <p>Email: <a href="mailto:<?php echo esc_attr( drnhatchau_get( 'contact_email' ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_email' ) ); ?></a></p>
    </div>
    <div class="footer-col">
      <h4>Liên kết nhanh</h4>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>">Giới thiệu</a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'dich_vu' ) ); ?>">Dịch vụ</a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'bac_si' ) ); ?>">Đội ngũ bác sĩ</a></li>
        <li><a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>">Kiến thức nhãn khoa</a></li>
        <li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Liên hệ</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Giờ làm việc</h4>
      <p><?php echo nl2br( esc_html( drnhatchau_get( 'contact_hours' ) ) ); ?></p>
      <h4>Kết nối</h4>
      <ul>
        <?php if ( drnhatchau_get( 'contact_facebook' ) ) : ?>
        <li><a href="<?php echo esc_url( drnhatchau_get( 'contact_facebook' ) ); ?>" target="_blank" rel="noopener">Facebook phòng khám</a></li>
        <?php endif; ?>
        <li>Zalo: <?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
  </div>
</footer>

<div class="float-actions">
  <a class="float-btn phone" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>" title="Gọi ngay">📞</a>
  <a class="float-btn zalo" href="https://zalo.me/<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>" target="_blank" rel="noopener" title="Chat Zalo">Z</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
