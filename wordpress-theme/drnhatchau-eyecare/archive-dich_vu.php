<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1>Dịch vụ</h1>
    <p>Khám và điều trị chuyên sâu các bệnh lý về mắt</p>
  </div>
</section>

<section>
  <div class="container">
    <div class="callout">
      <strong>Lưu ý:</strong> Phòng khám không thực hiện phẫu thuật tại chỗ. Với các dịch vụ có đánh dấu phẫu thuật, bác sĩ của phòng khám sẽ trực tiếp thực hiện tại các bệnh viện liên kết.
    </div>

    <div class="cards-grid">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="card">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="card-media"><?php the_post_thumbnail( 'medium' ); ?></div>
            <?php endif; ?>
            <div class="card-body">
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
              <a href="<?php the_permalink(); ?>" class="card-link">Xem chi tiết →</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="card placeholder-card">
          <div class="card-body">
            <h3>Chưa có dịch vụ nào</h3>
            <p>Vào trang quản trị → Dịch vụ → Thêm dịch vụ mới để bắt đầu thêm nội dung.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php the_posts_pagination(); ?>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Cần tư vấn dịch vụ phù hợp?</h2>
    <p>Liên hệ hotline để được tư vấn và đặt lịch khám cùng bác sĩ.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Đặt lịch khám</a>
  </div>
</section>

<?php get_footer(); ?>
