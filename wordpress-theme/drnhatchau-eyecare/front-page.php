<?php
/**
 * Template Name: Trang chu
 */
get_header();
?>

<section class="hero">
  <div class="container hero-inner">
    <div class="hero-text">
      <span class="eyebrow">Phòng khám chuyên khoa Mắt</span>
      <h1><?php bloginfo( 'name' ); ?></h1>
      <p class="slogan">"<?php echo esc_html( drnhatchau_get( 'contact_slogan' ) ); ?>"</p>
      <p>Khám và điều trị chuyên sâu các bệnh lý về mắt: tật khúc xạ, bệnh võng mạc, màng bồ đào, glocom, đục thủy tinh thể... cùng đội ngũ bác sĩ giàu kinh nghiệm.</p>
      <div class="hero-actions">
        <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-primary">Đặt lịch khám</a>
        <a href="<?php echo esc_url( get_post_type_archive_link( 'dich_vu' ) ); ?>" class="btn btn-outline-blue">Xem dịch vụ</a>
      </div>
      <p class="hero-hotline">Hotline tư vấn: <strong><?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></strong> - <strong><?php echo esc_html( drnhatchau_get( 'contact_phone2' ) ); ?></strong></p>
    </div>
    <div class="hero-visual">
      <img src="https://matdrnhatchau.com/wp-content/uploads/2026/07/doi-ngu-phong-kham-1.jpg" alt="Đội ngũ Phòng Khám Mắt DrNhatChau" loading="lazy">
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Giới thiệu</span>
      <h2>Đồng hành chăm sóc đôi mắt của bạn</h2>
      <p><?php bloginfo( 'name' ); ?> là địa chỉ khám và tư vấn các bệnh lý về mắt tại Hà Nội, quy tụ đội ngũ bác sĩ chuyên khoa giàu kinh nghiệm, quy trình khám chuyên nghiệp và tận tâm với từng bệnh nhân.</p>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">👁️</div>
        <h3>Đội ngũ bác sĩ chuyên môn cao</h3>
        <p>Trực tiếp thăm khám bởi TS. BSCC Nguyễn Nhất Châu và đội ngũ giàu kinh nghiệm.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🔬</div>
        <h3>Khám chuyên sâu</h3>
        <p>Chẩn đoán và tư vấn chuyên sâu các bệnh lý võng mạc, màng bồ đào, glocom, đục thủy tinh thể.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🏥</div>
        <h3>Liên kết bệnh viện uy tín</h3>
        <p>Với các trường hợp cần phẫu thuật, bác sĩ của phòng khám trực tiếp thực hiện tại bệnh viện liên kết.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🤝</div>
        <h3>Tận tâm với bệnh nhân</h3>
        <p>Đồng hành, tư vấn rõ ràng và theo dõi sát quá trình điều trị của từng bệnh nhân.</p>
      </div>
    </div>
  </div>
</section>

<section class="alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Dịch vụ</span>
      <h2>Dịch vụ nổi bật</h2>
      <p>Khám và điều trị đa dạng các bệnh lý về mắt.</p>
    </div>
    <div class="cards-grid">
      <?php
      $dich_vu_query = new WP_Query( array(
      	'post_type'      => 'dich_vu',
      	'posts_per_page' => 6,
      ) );
      if ( $dich_vu_query->have_posts() ) :
      	while ( $dich_vu_query->have_posts() ) : $dich_vu_query->the_post();
      		?>
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
      		<?php
      	endwhile;
      	wp_reset_postdata();
      else :
      	?>
      	<div class="card placeholder-card">
      		<div class="card-body">
      			<h3>Chưa có dịch vụ nào</h3>
      			<p>Vào trang quản trị → Dịch vụ → Thêm dịch vụ mới để bắt đầu thêm nội dung.</p>
      		</div>
      	</div>
      	<?php
      endif;
      ?>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Đội ngũ bác sĩ</span>
      <h2>Bác sĩ phụ trách chuyên môn</h2>
    </div>
    <?php
    $bac_si_query = new WP_Query( array(
    	'post_type'      => 'bac_si',
    	'posts_per_page' => 1,
    ) );
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

<section class="alt">
  <div class="container">
    <div class="callout">
      <strong>Lưu ý:</strong> Phòng khám hiện không thực hiện phẫu thuật tại chỗ. Đối với các trường hợp cần phẫu thuật (đục thủy tinh thể, Glocom, dịch kính - võng mạc...), bác sĩ của phòng khám sẽ trực tiếp phẫu thuật tại các bệnh viện liên kết.
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Kiến thức nhãn khoa</span>
      <h2>Bài viết mới nhất</h2>
    </div>
    <div class="cards-grid">
      <?php
      $blog_query = new WP_Query( array(
      	'post_type'      => 'post',
      	'posts_per_page' => 3,
      ) );
      if ( $blog_query->have_posts() ) :
      	while ( $blog_query->have_posts() ) : $blog_query->the_post();
      		?>
      		<div class="card">
      			<?php if ( has_post_thumbnail() ) : ?>
      				<div class="card-media"><?php the_post_thumbnail( 'medium' ); ?></div>
      			<?php endif; ?>
      			<div class="card-body">
      				<h3><?php the_title(); ?></h3>
      				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
      				<a href="<?php the_permalink(); ?>" class="card-link">Đọc thêm →</a>
      			</div>
      		</div>
      		<?php
      	endwhile;
      	wp_reset_postdata();
      else :
      	?>
      	<div class="card placeholder-card">
      		<div class="card-body">
      			<h3>Chưa có bài viết nào</h3>
      			<p>Vào trang quản trị → Bài viết → Viết bài mới để bắt đầu chia sẻ kiến thức nhãn khoa.</p>
      		</div>
      	</div>
      	<?php
      endif;
      ?>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Đặt lịch khám mắt ngay hôm nay</h2>
    <p>Liên hệ hotline hoặc để lại thông tin, phòng khám sẽ liên hệ tư vấn cho bạn.</p>
    <a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="btn btn-outline">Đặt lịch khám</a>
    <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', drnhatchau_get( 'contact_phone1' ) ) ); ?>" class="btn btn-primary" style="background:#fff;color:var(--primary);">Gọi ngay <?php echo esc_html( drnhatchau_get( 'contact_phone1' ) ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
