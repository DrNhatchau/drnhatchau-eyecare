<?php
/**
 * Template Name: Lien he
 */
get_header();

$contact_status = isset( $_GET['contact'] ) ? sanitize_text_field( wp_unslash( $_GET['contact'] ) ) : '';
$map_query      = rawurlencode( drnhatchau_get( 'contact_address' ) );
?>

<section class="page-banner">
  <div class="container">
    <h1><?php the_title(); ?></h1>
    <p>Đặt lịch khám hoặc gửi câu hỏi cho phòng khám</p>
  </div>
</section>

<section>
  <div class="container contact-grid">
    <div>
      <h2>Thông tin liên hệ</h2>
      <ul class="contact-info-list">
        <li>
          <span class="ci-icon">📍</span>
          <div>
            <strong>Địa chỉ</strong>
            <p><?php echo esc_html( drnhatchau_get( 'contact_address' ) ); ?></p>
          </div>
        </li>
        <li>
          <span class="ci-icon">📞</span>
          <div>
            <strong>Hotline</strong>
            <p>
              <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></a>
              -
              <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone2' ) ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_phone2' ) ); ?></a>
              (cũng là số Zalo)
            </p>
          </div>
        </li>
        <li>
          <span class="ci-icon">✉️</span>
          <div>
            <strong>Email</strong>
            <p><a href="mailto:<?php echo esc_attr( drnhatchau_get( 'contact_email' ) ); ?>"><?php echo esc_html( drnhatchau_get( 'contact_email' ) ); ?></a></p>
          </div>
        </li>
        <li>
          <span class="ci-icon">🕒</span>
          <div>
            <strong>Giờ làm việc</strong>
            <p><?php echo nl2br( esc_html( drnhatchau_get( 'contact_hours' ) ) ); ?></p>
          </div>
        </li>
        <?php if ( drnhatchau_get( 'contact_facebook' ) ) : ?>
        <li>
          <span class="ci-icon">📘</span>
          <div>
            <strong>Facebook</strong>
            <p><a href="<?php echo esc_url( drnhatchau_get( 'contact_facebook' ) ); ?>" target="_blank" rel="noopener">Trang Facebook phòng khám</a></p>
          </div>
        </li>
        <?php endif; ?>
      </ul>

      <iframe
        class="map-frame"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps?q=<?php echo esc_attr( $map_query ); ?>&output=embed"
        title="Bản đồ <?php bloginfo( 'name' ); ?>">
      </iframe>
      <p class="form-note" style="margin-top:10px;">
        Không hiển thị được bản đồ?
        <a href="https://www.google.com/maps?q=<?php echo esc_attr( $map_query ); ?>" target="_blank" rel="noopener">Xem trên Google Maps</a>
      </p>
    </div>

    <div>
      <h2>Gửi thông tin đặt lịch</h2>

      <?php if ( 'success' === $contact_status ) : ?>
        <div class="form-notice success">Cảm ơn bạn! Thông tin đã được gửi, phòng khám sẽ liên hệ lại sớm nhất.</div>
      <?php elseif ( 'error' === $contact_status ) : ?>
        <div class="form-notice error">Có lỗi xảy ra, vui lòng thử lại hoặc gọi trực tiếp hotline.</div>
      <?php endif; ?>

      <p class="form-note">Điền thông tin bên dưới, phòng khám sẽ liên hệ lại qua số điện thoại bạn cung cấp. Bạn cũng có thể gọi trực tiếp hotline để được hỗ trợ nhanh hơn.</p>

      <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="drnhatchau_contact">
        <?php wp_nonce_field( 'drnhatchau_contact', 'drnhatchau_contact_nonce' ); ?>

        <div class="form-row">
          <div>
            <label for="ho_ten">Họ và tên</label>
            <input type="text" id="ho_ten" name="ho_ten" required>
          </div>
          <div>
            <label for="so_dien_thoai">Số điện thoại</label>
            <input type="tel" id="so_dien_thoai" name="so_dien_thoai" required>
          </div>
        </div>
        <div>
          <label for="dich_vu">Dịch vụ quan tâm</label>
          <select id="dich_vu" name="dich_vu">
            <option>Khám mắt tổng quát</option>
            <option>Tật khúc xạ / Kiểm soát cận thị</option>
            <option>Bệnh lý Võng mạc - Màng bồ đào</option>
            <option>Glocom</option>
            <option>Đục thủy tinh thể (TTT)</option>
            <option>Laser điều trị mắt</option>
            <option>Khác</option>
          </select>
        </div>
        <div>
          <label for="noi_dung">Nội dung cần tư vấn</label>
          <textarea id="noi_dung" name="noi_dung" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi thông tin</button>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
