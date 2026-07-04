<?php
/**
 * Template Name: Gioi thieu
 */
get_header();
?>

<section class="page-banner">
  <div class="container">
    <h1><?php the_title(); ?></h1>
    <p><?php bloginfo( 'name' ); ?> - <?php echo esc_html( drnhatchau_get( 'contact_slogan' ) ); ?></p>
  </div>
</section>

<section>
  <div class="container">
    <?php
    while ( have_posts() ) : the_post();
    	if ( trim( get_the_content() ) ) :
    		the_content();
    	else :
    		?>
    		<p><?php bloginfo( 'name' ); ?> tọa lạc tại <?php echo esc_html( drnhatchau_get( 'contact_address' ) ); ?>, là địa chỉ khám và tư vấn các bệnh lý về mắt do TS. BSCC Nguyễn Nhất Châu trực tiếp phụ trách chuyên môn.</p>
    		<p>Phòng khám cung cấp dịch vụ khám mắt tổng quát, khám chuyên sâu các bệnh lý khúc xạ, võng mạc, màng bồ đào, glocom và đục thủy tinh thể. Với những trường hợp cần can thiệp phẫu thuật, phòng khám phối hợp với các bệnh viện liên kết, trong đó ca phẫu thuật do chính bác sĩ của phòng khám trực tiếp thực hiện.</p>
    		<?php
    	endif;
    endwhile;
    ?>
    <div class="callout">
      <strong>Lưu ý:</strong> Phòng khám không thực hiện phẫu thuật tại chỗ. Các ca phẫu thuật (đục thủy tinh thể, Glocom, dịch kính - võng mạc...) được thực hiện tại bệnh viện liên kết, do bác sĩ của phòng khám trực tiếp phẫu thuật.
    </div>
  </div>
</section>

<section class="alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Định hướng</span>
      <h2>Sứ mệnh - Tầm nhìn - Giá trị cốt lõi</h2>
    </div>
    <div class="vmv-grid">
      <div class="vmv-card">
        <h3>Tầm nhìn</h3>
        <p>Trở thành địa chỉ tin cậy trong chăm sóc và điều trị các bệnh lý về mắt, mang lại sự an tâm cho bệnh nhân và gia đình.</p>
      </div>
      <div class="vmv-card">
        <h3>Sứ mệnh</h3>
        <p>Mang đến dịch vụ khám, tư vấn và đồng hành điều trị mắt tận tâm, minh bạch và lấy bệnh nhân làm trung tâm.</p>
      </div>
      <div class="vmv-card">
        <h3>Giá trị cốt lõi</h3>
        <p>Tận tâm - Chính xác - Đồng hành cùng bệnh nhân trong suốt quá trình thăm khám và điều trị.</p>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Bác sĩ phụ trách</span>
      <h2>Đội ngũ chuyên môn</h2>
    </div>
    <?php
    $bac_si_query = new WP_Query( array( 'post_type' => 'bac_si', 'posts_per_page' => 1 ) );
    if ( $bac_si_query->have_posts() ) :
    	while ( $bac_si_query->have_posts() ) : $bac_si_query->the_post();
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
    				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
    				<a href="<?php the_permalink(); ?>" class="card-link">Xem hồ sơ đầy đủ →</a>
    			</div>
    		</div>
    		<?php
    	endwhile;
    	wp_reset_postdata();
    else :
    	?>
    	<div class="doctor-card">
    		<div class="doctor-photo img-placeholder">Ảnh bác sĩ<br>(sẽ cập nhật)</div>
    		<div class="doctor-info">
    			<h3>TS. BSCC Nguyễn Nhất Châu</h3>
    			<span class="title">Bác sĩ chuyên khoa Mắt</span>
    			<p>Vào trang quản trị → Bác sĩ → Thêm bác sĩ mới để bổ sung thông tin đầy đủ.</p>
    		</div>
    	</div>
    	<?php
    endif;
    ?>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Bạn cần tư vấn về tình trạng mắt?</h2>
    <p>Liên hệ với phòng khám để được đặt lịch khám cùng bác sĩ.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Liên hệ ngay</a>
  </div>
</section>

<?php get_footer(); ?>
