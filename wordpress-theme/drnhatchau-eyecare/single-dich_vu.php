<?php
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section>
  <div class="container">
    <div class="blog-content">
      <?php
      while ( have_posts() ) : the_post();
      	if ( has_post_thumbnail() ) : ?>
      		<div class="card-media" style="height:auto; margin-bottom:24px; border-radius:var(--radius); overflow:hidden;"><?php the_post_thumbnail( 'large' ); ?></div>
      	<?php endif;
      	the_content();
      	if ( get_post_meta( get_the_ID(), 'can_phau_thuat', true ) ) :
      		?>
      		<div class="callout">
      			<strong>Lưu ý:</strong> Dịch vụ này được thực hiện tại bệnh viện liên kết, do bác sĩ của phòng khám trực tiếp thực hiện.
      		</div>
      		<?php
      	endif;
      endwhile;
      ?>
      <p><a href="<?php echo esc_url( get_post_type_archive_link( 'dich_vu' ) ); ?>" class="card-link">← Xem tất cả dịch vụ</a></p>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Đặt lịch khám dịch vụ này</h2>
    <p>Liên hệ hotline để được tư vấn chi tiết.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Đặt lịch khám</a>
  </div>
</section>

<?php get_footer(); ?>
