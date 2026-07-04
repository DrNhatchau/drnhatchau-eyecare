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
    <?php
    while ( have_posts() ) : the_post();
    	$chuc_danh = get_post_meta( get_the_ID(), 'chuc_danh', true );
    	?>
    	<div class="doctor-card">
    		<div class="doctor-photo img-placeholder">
    			<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' ); else : ?>
    				Ảnh bác sĩ<br>(sẽ cập nhật)
    			<?php endif; ?>
    		</div>
    		<div class="doctor-info">
    			<h3><?php the_title(); ?></h3>
    			<?php if ( $chuc_danh ) : ?><span class="title"><?php echo esc_html( $chuc_danh ); ?></span><?php endif; ?>
    			<?php the_content(); ?>
    		</div>
    	</div>
    	<?php
    endwhile;
    ?>
    <p style="margin-top:24px;"><a href="<?php echo esc_url( get_post_type_archive_link( 'bac_si' ) ); ?>" class="card-link">← Xem tất cả bác sĩ</a></p>
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
