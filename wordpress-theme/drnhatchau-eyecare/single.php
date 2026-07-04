<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1><?php the_title(); ?></h1>
    <p><?php the_date(); ?></p>
  </div>
</section>

<section>
  <div class="container">
    <div class="blog-content">
      <?php
      while ( have_posts() ) : the_post();
      	if ( has_post_thumbnail() ) : ?>
      		<div style="margin-bottom:24px; border-radius:var(--radius); overflow:hidden;"><?php the_post_thumbnail( 'large' ); ?></div>
      	<?php endif;
      	the_content();

      	if ( comments_open() || get_comments_number() ) {
      		comments_template();
      	}
      endwhile;
      ?>
      <p><a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>" class="card-link">← Xem tất cả bài viết</a></p>
    </div>
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
