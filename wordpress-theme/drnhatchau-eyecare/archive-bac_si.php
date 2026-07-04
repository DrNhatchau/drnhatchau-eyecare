<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1>Đội ngũ bác sĩ</h1>
    <p>Chuyên môn cao - Tận tâm với bệnh nhân</p>
  </div>
</section>

<section>
  <div class="container" style="display:grid; gap:30px;">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php $chuc_danh = get_post_meta( get_the_ID(), 'chuc_danh', true ); ?>
        <div class="doctor-card">
          <div class="doctor-photo img-placeholder">
            <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' ); else : ?>
              Ảnh bác sĩ<br>(sẽ cập nhật)
            <?php endif; ?>
          </div>
          <div class="doctor-info">
            <h3><?php the_title(); ?></h3>
            <?php if ( $chuc_danh ) : ?><span class="title"><?php echo esc_html( $chuc_danh ); ?></span><?php endif; ?>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40 ) ); ?></p>
            <a href="<?php the_permalink(); ?>" class="card-link">Xem hồ sơ đầy đủ →</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="card placeholder-card" style="min-height:160px;">
        <div class="card-body">
          <h3>Chưa có bác sĩ nào</h3>
          <p>Vào trang quản trị → Bác sĩ → Thêm bác sĩ mới để bắt đầu thêm nội dung.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Đặt lịch khám cùng bác sĩ</h2>
    <p>Liên hệ hotline để được tư vấn và sắp xếp lịch khám phù hợp.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Đặt lịch khám</a>
  </div>
</section>

<?php get_footer(); ?>
