<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1>Kiến thức nhãn khoa</h1>
    <p>Thông tin hữu ích giúp bạn chăm sóc và bảo vệ đôi mắt</p>
  </div>
</section>

<section>
  <div class="container">
    <div class="callout">
      <strong>Lưu ý:</strong> Nội dung mang tính tham khảo, không thay thế cho việc thăm khám trực tiếp. Vui lòng liên hệ phòng khám để được bác sĩ tư vấn cụ thể cho tình trạng của bạn.
    </div>

    <div class="blog-list">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="blog-card">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="blog-thumb"><?php the_post_thumbnail( 'medium' ); ?></div>
            <?php endif; ?>
            <div class="card-body">
              <div class="blog-meta"><?php echo esc_html( get_the_date() ); ?></div>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
              <a href="<?php the_permalink(); ?>" class="card-link">Đọc thêm →</a>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="card placeholder-card">
          <div class="card-body">
            <h3>Chưa có bài viết nào</h3>
            <p>Vào trang quản trị → Bài viết → Viết bài mới để bắt đầu chia sẻ kiến thức nhãn khoa.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php the_posts_pagination(); ?>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Còn thắc mắc về tình trạng mắt?</h2>
    <p>Liên hệ phòng khám để được bác sĩ tư vấn trực tiếp.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Liên hệ ngay</a>
  </div>
</section>

<?php get_footer(); ?>
